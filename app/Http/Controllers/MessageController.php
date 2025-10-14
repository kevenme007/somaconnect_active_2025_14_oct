<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $conversations = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->with('sender', 'receiver')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('messages.index', compact('conversations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent.');
    }

    public function markRead(Message $message)
    {
        if ($message->receiver_id == auth()->id()) {
            $message->update(['read' => true]);
        }

        return response()->json(['success' => true]);
    }
}
