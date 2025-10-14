<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumThreadController extends Controller
{
     public function index()
    {
        $threads = ForumThread::with('category', 'user')->paginate(20);
        return view('forums.index', compact('threads'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('forums.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        ForumThread::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forums.index')->with('success', 'Thread created.');
    }

    public function show(ForumThread $forumThread)
    {
        $forumThread->load('posts.user');
        return view('forums.show', compact('forumThread'));
    }

    public function destroy(ForumThread $forumThread)
    {
        $this->authorize('delete', $forumThread);
        $forumThread->delete();

        return redirect()->route('forums.index')->with('success', 'Thread deleted.');
    }
}
