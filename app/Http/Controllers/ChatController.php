<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // public function index()
    // {
    //     $users = User::where('id', '!=', auth()->id())->get();
    //     return view('chat.index', compact('users'));
    // }

    public function index(Request $request)
    {
        $user = auth()->user();
        $schoolId = $user->profile->school_id ?? null;

        $query = User::where('id', '!=', $user->id)
            ->when($user->role !== 'admin' && $schoolId, function ($q) use ($schoolId) {
                // Show users from the same school
                $q->whereHas('profile', function ($sub) use ($schoolId) {
                    $sub->where('school_id', $schoolId);
                });
            });

        // Search by name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->get();

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

        $conversation = Conversation::find($conversationId);
        $receiverId = ($conversation->user_one_id == auth()->id())
            ? $conversation->user_two_id
            : $conversation->user_one_id;

        Message::create([
            'conversation_id' => $conversationId,
            'sender_id'       => auth()->id(),
            'receiver_id'     => $receiverId,
            'message'         => $request->message,
        ]);

        // $message = Message::create([
        //     'conversation_id' => $conversationId,
        //     'sender_id' => auth()->id(),
        //     'message' => $request->message
        // ]);

        return back();
    }

    //     public function showConversation($conversationId)
    // {
    //     $messages = Message::where('conversation_id', $conversationId)->get();
    //     return view('chat.conversation', compact('messages'));
    // }

    public function showConversation($conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);

        // Determine the other user
        $otherUserId = ($conversation->user_one_id == auth()->id())
            ? $conversation->user_two_id
            : $conversation->user_one_id;

        return redirect()->route('chat.show', $otherUserId);
    }
}
