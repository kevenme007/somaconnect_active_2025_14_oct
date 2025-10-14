<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('chat.index', compact('users'));
    }


    public function show($userId)
    {
        $authId = auth()->id();
        $user = auth()->user(); // or fetch any user you want


        $conversation = Conversation::where(function ($q) use ($authId, $userId) {
            $q->where('user_one_id', $authId)->where('user_two_id', $userId);
        })->orWhere(function ($q) use ($authId, $userId) {
            $q->where('user_one_id', $userId)->where('user_two_id', $authId);
        })->first();

        // Mark all unread messages from the other user as seen
        if ($conversation) {
            $conversation->messages()
                ->whereNull('seen_at')
                ->where('sender_id', '!=', auth()->id())
                ->update(['seen_at' => now()]);
        }


        if (!$conversation) {
            $conversation = Conversation::create([
                'user_one_id' => $authId,
                'user_two_id' => $userId
            ]);
        }

        // Mark all received messages as seen
        Message::where('conversation_id', $conversation->id)
            ->where('sender_id', '!=', $authId)
            ->whereNull('seen_at')
            ->update(['seen_at' => now()]);

        $messages = $conversation->messages()->with('sender')->latest()->take(50)->get()->reverse();

        if (request()->ajax()) {
                $recipient = User::find($userId);
            return view('chat._messages', compact('messages', 'recipient'))->render();
        }

        return view('chat.show', compact('conversation', 'messages', 'user'));
    }

    public function typing(Conversation $conversation)
    {
        $conversation->typing_user_id = auth()->id();
        $conversation->save();

        return response()->json(['status' => 'ok']);
    }



    public function send(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = Message::create([
            'conversation_id' => $conversationId,
            'sender_id' => auth()->id(),
            'message' => $request->message
        ]);

        return back();
    }
}
