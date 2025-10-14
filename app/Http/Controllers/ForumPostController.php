<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\ForumThread;
use Illuminate\Http\Request;

class ForumPostController extends Controller
{
    public function store(Request $request, ForumThread $forumThread)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        ForumPost::create([
            'thread_id' => $forumThread->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('forums.show', $forumThread)->with('success', 'Reply posted.');
    }

    public function destroy(ForumPost $forumPost)
    {
        $this->authorize('delete', $forumPost);
        $forumPost->delete();

        return back()->with('success', 'Post deleted.');
    }
}
