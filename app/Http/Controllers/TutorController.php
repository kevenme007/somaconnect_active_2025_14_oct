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
    public function index()
    {
        // $questions = auth()->user()->tutorQuestions()->latest()->get();
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

    // Save the question
    $question = TutorQuestion::create([
        'user_id'  => auth()->id(),
        'question' => $request->question,
    ]);

    // Get updated history for the user
    $questions = TutorQuestion::where('user_id', auth()->id())
                ->latest()
                ->take(10)
                ->get();

    // Render partial Blade to return only the history
    $html = view('partials.tutor_history', compact('questions'))->render();

    return response()->json([
        'success' => true,
        'html'    => $html, // Return the updated chat HTML
    ]);
}





    public function ask(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        $user = auth()->user();

        $tutorQuestion = TutorQuestion::create([
            'user_id' => $user->id,
            'question' => $request->question,
            'answer' => null,
        ]);

        $answer = $this->getAnswerFromAI($request->question);

        $tutorQuestion->update(['answer' => $answer]);

        return redirect()->route('tutor.index');
    }



    private function getAnswerFromAI(string $question): string
    {
        $apiKey = env('OPENROUTER_API_KEY', 'public');

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
            'HTTP-Referer' => 'http://localhost', // Replace with your actual domain or localhost
            'X-Title' => 'SomaConnect AI Tutor'
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'meta-llama/llama-3.3-8b-instruct:free',
            'messages' => [
                ['role' => 'system', 'content' => 'You are an academic tutor that helps students with clear and useful answers.'],
                ['role' => 'user', 'content' => $question],
            ],
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['choices'][0]['message']['content'] ?? "Sorry, no answer was generated.";
        }

        Log::error('OpenRouter error', [
            'status' => $response->status(),
            'body' => $response->body()
        ]);

        return "Failed to get response from AI.";
    }
}
