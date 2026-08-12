<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\ForumThread;
use Illuminate\Http\Request;

class ForumPostController extends Controller
{
    public function store(Request $request, ForumThread $thread)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        ForumPost::create([
            'thread_id' => $thread->id,
            'user_id'   => auth()->id(),
            'content'   => $request->content,
        ]);

        return redirect()->route('forum.threads.show', $thread)->with('success', 'Reply added.');
    }
}
