<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $userMessage],
                ],
            ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Sorry, something went wrong talking to the AI service.'
            ], 500);
        }

        $data = $response->json();
        $reply = $data['choices'][0]['message']['content'] ?? 'Sorry, I could not generate a response.';

        return response()->json([
            'reply' => $reply,
        ]);
    }
}