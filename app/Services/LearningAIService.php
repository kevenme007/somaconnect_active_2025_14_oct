<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LearningAIService
{
    protected $openRouterKey;

    public function __construct()
    {
        $this->openRouterKey = env('OPENROUTER_API_KEY');
    }

    /**
     * Generate personalised weak areas & recommendations
     */
    public function analysePerformance($user, $performanceData)
    {
        if (!$this->openRouterKey) {
            return $this->fallbackAnalysis($performanceData);
        }

        $prompt = $this->buildAnalysisPrompt($user, $performanceData);

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$this->openRouterKey}",
                'Content-Type' => 'application/json',
                'HTTP-Referer' => url('/'),
            ])->timeout(30)->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openrouter/auto',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an academic AI that analyses student past paper results. Return a JSON object with: weak_topics (array), strong_topics (array), recommended_actions (array), next_papers (array of paper IDs/reasons). Keep it concise and actionable.'
                    ],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'temperature' => 0.3,
                'max_tokens' => 800,
            ]);

            if ($response->successful()) {
                $content = $response->json()['choices'][0]['message']['content'] ?? '';
                // Extract JSON (AI may wrap in ```json)
                preg_match('/\{.*\}/s', $content, $matches);
                $analysis = json_decode($matches[0] ?? '{}', true);
                return $analysis ?: $this->fallbackAnalysis($performanceData);
            }
        } catch (\Exception $e) {
            Log::error("Learning AI analysis failed: " . $e->getMessage());
        }

        return $this->fallbackAnalysis($performanceData);
    }

    private function buildAnalysisPrompt($user, $data)
    {
        return "Student: {$user->name}
        Subjects attempted: " . implode(', ', $data['subjects']) . "
        Recent paper scores: " . json_encode($data['recent_scores']) . "
        Topics with most mistakes: " . implode(', ', $data['weak_topics']) . "
        Topics with high accuracy: " . implode(', ', $data['strong_topics']) . "

        Based on this, provide:
        1. weak_topics (list of topics needing focus)
        2. strong_topics (already good)
        3. recommended_actions (specific study tips)
        4. next_papers (suggest specific past paper IDs from our library that target the weak areas)";
    }

    private function fallbackAnalysis($data)
    {
        return [
            'weak_topics' => $data['weak_topics'] ?? ['General'],
            'strong_topics' => $data['strong_topics'] ?? [],
            'recommended_actions' => [
                'Review your incorrect answers',
                'Practice similar questions',
                'Use the Pomodoro technique for focused study'
            ],
            'next_papers' => []
        ];
    }
}
