<?php

namespace App\Http\Controllers;

use OpenAI;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TutorQuestion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class TutorController extends Controller
{

    private $modelPriorities = [
        'primary' => [
            'name' => 'google/gemini-2.0-flash-exp:free',
            'provider' => 'Google Gemini 2.0 Flash',
            'speed' => 'fast',
            'quality' => 'good'
        ],
        'secondary' => [
            'name' => 'deepseek/deepseek-chat-v3-0324:free',
            'provider' => 'DeepSeek Chat V3',
            'speed' => 'fast',
            'quality' => 'very good'
        ],
        'tertiary' => [
            'name' => 'qwen/qwen2.5-72b-instruct:free',
            'provider' => 'Qwen 2.5 72B',
            'speed' => 'medium',
            'quality' => 'excellent'
        ],
        'quaternary' => [
            'name' => 'microsoft/phi-3.5-mini-128k-instruct:free',
            'provider' => 'Phi-3.5 Mini',
            'speed' => 'very fast',
            'quality' => 'good'
        ],
        'backup' => [
            'name' => 'meta-llama/llama-3.1-8b-instruct:free',
            'provider' => 'Llama 3.1 8B',
            'speed' => 'fast',
            'quality' => 'good'
        ],
    ];

    public function index()
    {
        $questions = TutorQuestion::where('user_id', auth()->id())->oldest()->get();
        return view('tutor.index', compact('questions'));
    }

    public function modal()
    {
        $questions = TutorQuestion::where('user_id', auth()->id())->oldest()->get();
        return view('partials.chat_modal', compact('questions'));
    }

    public function askModal(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        try {
            // Save the question
            $question = TutorQuestion::create([
                'user_id'  => auth()->id(),
                'question' => $request->question,
            ]);

            // Get answer from AI with multi-model fallback
            $result = $this->getAnswerFromMultiAI($request->question);

            // Update the question with answer and model used
            $question->update([
                'answer' => $result['answer'],
                'model_used' => $result['model_used'] ?? 'fallback'
            ]);

            // Get updated history for the user
            $questions = TutorQuestion::where('user_id', auth()->id())
                ->oldest()
                ->get();

            // Render partial Blade to return only the history
            $html = view('partials.tutor_history', compact('questions'))->render();

            return response()->json([
                'success' => true,
                'html'    => $html,
                'model_used' => $result['model_used'] ?? 'fallback'
            ]);
        } catch (\Exception $e) {
            Log::error('Tutor modal error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Failed to process your question. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function ask(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        try {
            $user = auth()->user();

            $tutorQuestion = TutorQuestion::create([
                'user_id' => $user->id,
                'question' => $request->question,
                'answer' => null,
            ]);

            // Get answer with model tracking
            $result = $this->getAnswerFromMultiAI($request->question);

            // Store both answer and which model was used
            $tutorQuestion->update([
                'answer' => $result['answer'],
                'model_used' => $result['model_used'] ?? 'fallback'
            ]);

            return redirect()->route('tutor.index')->with('success', 'Question answered successfully!');
        } catch (\Exception $e) {
            Log::error('Tutor ask error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to get answer. Please try again.');
        }
    }

    private function getAnswerFromMultiAI(string $question): array
    {
        $apiKey = env('OPENROUTER_API_KEY');

        if (!$apiKey) {
            Log::warning('OpenRouter API key not set, using fallback responses');
            return [
                'answer' => $this->getEnhancedFallbackResponse($question),
                'model_used' => 'offline-fallback'
            ];
        }

        try {
            // Use OpenRouter's auto model selection - this will try multiple models automatically
            Log::info("Attempting OpenRouter auto model selection");

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
                'HTTP-Referer' => url('/'),
                'X-Title' => 'SomaConnect AI Tutor'
            ])->timeout(30)->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openrouter/auto', // This tells OpenRouter to pick the best available model
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are Maktaba Connect, a helpful academic tutor for SomaConnect educational platform. Keep responses concise, friendly, and educational (max 200 words).'
                    ],
                    ['role' => 'user', 'content' => $question],
                ],
                'temperature' => 0.7,
                'max_tokens' => 500,
                'route' => 'fallback' // This enables automatic fallback if primary model fails
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['choices'][0]['message']['content'])) {
                    // Try to determine which model was actually used
                    $modelUsed = $data['model'] ?? 'openrouter/auto';

                    Log::info("Successfully used model: {$modelUsed}");

                    return [
                        'answer' => $data['choices'][0]['message']['content'],
                        'model_used' => $modelUsed
                    ];
                }
            }

            $statusCode = $response->status();
            $errorBody = $response->body();

            Log::error("OpenRouter API failed with status: {$statusCode}", [
                'response' => $errorBody
            ]);
        } catch (\Exception $e) {
            Log::error("Exception in OpenRouter API call: " . $e->getMessage());
        }

        return [
            'answer' => $this->getEnhancedFallbackResponse($question),
            'model_used' => 'offline-fallback'
        ];
    }

    // private function getAnswerFromMultiAI(string $question): array
    // {
    //     $apiKey = env('OPENROUTER_API_KEY');

    //     if (!$apiKey) {
    //         Log::warning('OpenRouter API key not set, using fallback responses');
    //         return [
    //             'answer' => $this->getEnhancedFallbackResponse($question),
    //             'model_used' => 'offline-fallback'
    //         ];
    //     }

    //     $errors = [];
    //     $attemptedModels = [];

    //     foreach ($this->modelPriorities as $priority => $model) {
    //         $attemptedModels[] = $model['provider'];

    //         try {
    //             Log::info("Attempting model: {$model['name']}");

    //             $response = Http::withHeaders([
    //                 'Authorization' => "Bearer {$apiKey}",
    //                 'Content-Type' => 'application/json',
    //                 'HTTP-Referer' => url('/'),
    //                 'X-Title' => 'SomaConnect AI Tutor'
    //             ])->timeout(30)->post('https://openrouter.ai/api/v1/chat/completions', [
    //                 'model' => $model['name'],
    //                 'messages' => [
    //                     [
    //                         'role' => 'system',
    //                         'content' => 'You are Maktaba Connect, a helpful academic tutor for SomaConnect educational platform. Keep responses concise, friendly, and educational (max 200 words).'
    //                     ],
    //                     ['role' => 'user', 'content' => $question],
    //                 ],
    //                 'temperature' => 0.7,
    //                 'max_tokens' => 500,
    //             ]);

    //             if ($response->successful()) {
    //                 $data = $response->json();

    //                 if (isset($data['choices'][0]['message']['content'])) {
    //                     Log::info("Successfully used {$priority} model: {$model['provider']}");

    //                     return [
    //                         'answer' => $data['choices'][0]['message']['content'],
    //                         'model_used' => $model['provider']
    //                     ];
    //                 }
    //             }

    //             $statusCode = $response->status();
    //             $errorBody = $response->body();

    //             Log::warning("Model {$model['provider']} failed with status: {$statusCode}", [
    //                 'response' => $errorBody
    //             ]);

    //             $errors[] = [
    //                 'model' => $model['name'],
    //                 'provider' => $model['provider'],
    //                 'status' => $statusCode,
    //                 'error' => $errorBody
    //             ];
    //         } catch (\Exception $e) {
    //             Log::warning("Exception with model {$model['provider']}: " . $e->getMessage());

    //             $errors[] = [
    //                 'model' => $model['name'],
    //                 'provider' => $model['provider'],
    //                 'error' => $e->getMessage()
    //             ];
    //             continue;
    //         }
    //     }

    //     Log::error('All AI models failed', [
    //         'errors' => $errors,
    //         'attempted_models' => $attemptedModels
    //     ]);

    //     return [
    //         'answer' => $this->getEnhancedFallbackResponse($question),
    //         'model_used' => 'offline-fallback'
    //     ];
    // }

    private function getEnhancedFallbackResponse(string $question): string
    {
        $question = strtolower($question);

        // Check for greetings
        if (preg_match('/\b(hello|hi|hey|greetings|good morning|good afternoon|good evening)\b/', $question)) {
            return "👋 **Hello!**\n\nI'm Maktaba Connect, your AI learning assistant. I'm currently in offline mode, but I can still help with general questions!\n\nYou can ask me about:\n• Study tips and techniques\n• Subject explanations (Math, Science, Languages)\n• Exam preparation strategies\n• Learning resources\n\nWhat would you like to know?";
        }

        // Check for math-related questions
        if (preg_match('/\b(math|mathematics|algebra|geometry|calculus|equation|formula|arithmetic|quadratic|trigonometry)\b/', $question)) {
            return "📐 **Mathematics Help**\n\nHere are some effective ways to improve your math skills:\n\n• **Practice regularly** with past papers and exercises\n• **Understand concepts** rather than memorizing formulas\n• **Start with basics** before advancing to complex topics\n• **Use online resources** like Khan Academy, Wolfram Alpha\n• **Join study groups** to discuss and solve problems together\n\nWhat specific math topic are you working on?";
        }

        // Check for science-related questions
        if (preg_match('/\b(science|physics|chemistry|biology|experiment|lab|atom|molecule|cell|energy|force|reaction)\b/', $question)) {
            return "🔬 **Science Study Tips**\n\nFor science subjects, try these approaches:\n\n• **Visualize concepts** using diagrams and flowcharts\n• **Connect theory** with real-world examples\n• **Perform practical experiments** when possible\n• **Use mnemonics** to remember formulas and processes\n• **Review regularly** and test yourself with past papers\n\nWhich science subject are you studying?";
        }

        // Check for study-related questions
        if (preg_match('/\b(study|learn|understanding|memorize|remember|focus|concentration|study tips|study techniques)\b/', $question)) {
            return "📖 **Effective Study Techniques**\n\nHere are proven methods to enhance your learning:\n\n• **Pomodoro Technique** - 25 min study, 5 min break\n• **Active Recall** - test yourself without looking at notes\n• **Spaced Repetition** - review at increasing intervals\n• **Mind Mapping** - visualize connections between ideas\n• **Teach Others** - explaining reinforces understanding\n\nWhat subject are you studying? I can provide specific tips!";
        }

        // Check for exam/past paper questions
        if (preg_match('/\b(past paper|exam|test|quiz|assessment|revision|practice paper)\b/', $question)) {
            return "📝 **Exam Preparation Guide**\n\nGet ready for exams with these strategies:\n\n• **Start early** and create a study schedule\n• **Use past papers** - time yourself and review mistakes\n• **Practice active recall** - test yourself, don't just read\n• **Form study groups** for discussion and teaching\n• **Take breaks** - use the Pomodoro technique\n\nCheck out our Past Papers section for practice materials!";
        }

        // Check for language-related questions
        if (preg_match('/\b(english|kiswahili|language|grammar|vocabulary|reading|writing|essay)\b/', $question)) {
            return "📚 **Language Learning Tips**\n\nTo improve your language skills:\n\n• **Read widely** - books, articles, news in that language\n• **Practice writing** daily - journals, essays, summaries\n• **Speak regularly** with others or practice aloud\n• **Learn new words** in context, not just lists\n• **Watch content** in the language with subtitles\n\nNeed help with a specific language topic?";
        }

        // Check for history questions
        if (preg_match('/\b(history|historical|century|war|revolution|civilization|ancient|colonial)\b/', $question)) {
            return "📜 **History Study Guide**\n\nEffective history study methods:\n\n• **Create timelines** to visualize events chronologically\n• **Understand causes and effects**, not just dates\n• **Make mind maps** connecting related events\n• **Discuss and debate** historical perspectives\n• **Watch documentaries** for engaging context\n\nWhat historical period or event are you studying?";
        }

        // Check for geography questions
        if (preg_match('/\b(geography|map|country|capital|population|climate|environment|continent|region)\b/', $question)) {
            return "🌍 **Geography Learning Tips**\n\nMaster geography with these techniques:\n\n• **Use maps and atlases** regularly\n• **Create flashcards** for countries, capitals, features\n• **Study in context** - connect geography to history\n• **Watch travel and nature documentaries**\n• **Use online tools** like Google Earth for exploration\n\nWhat aspect of geography interests you?";
        }

        // Check for resource-related questions
        if (preg_match('/\b(book|reference|material|resource|textbook|guide|tutorial|notes)\b/', $question)) {
            return "📚 **Learning Resources at SomaConnect**\n\nYou can access these materials on our platform:\n\n• **Reference Books** - comprehensive subject guides\n• **Past Papers** - exam preparation materials\n• **Tutorials** - step-by-step learning guides\n• **Subject Materials** - organized by form and topic\n\nBrowse our Materials section to find what you need!";
        }

        // Default response for other questions
        return "🤖 **I'm here to help!**\n\nThank you for your question. I'm currently operating in offline mode, but I can still assist with general topics.\n\nYou can ask me about:\n\n• **Subject help**: mathematics, science, languages, history, geography\n• **Study techniques**: how to learn effectively, memory tips\n• **Exam preparation**: past papers, revision strategies\n• **Resources**: books, tutorials, learning materials\n\nPlease ask a more specific question, and I'll do my best to help!\n\n*Note: The AI models are temporarily unavailable. Please try again in a few moments.*";
    }

    // Keep the old getFallbackResponse for backward compatibility
    private function getFallbackResponse(string $question): string
    {
        return $this->getEnhancedFallbackResponse($question);
    }
}
