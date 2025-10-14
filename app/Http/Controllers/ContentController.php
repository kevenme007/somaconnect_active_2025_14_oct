<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Topic $topic)
    {
        $contents = $topic->contents()->with('uploader')->get();
            // $contents = $topic->contents()->with('user')->get();
        return view('contents.index', compact('contents', 'topic'));
    }

    public function create(Topic $topic)
    {
        return view('contents.create', compact('topic'));
    }

    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required|in:note,video,quiz',
            'video_url' => 'nullable|url',
        ]);

        $topic->contents()->create([
            'user_id' => auth()->id(), // Track uploader
            'title' => $request->title,
            'body' => $request->body,
            'type' => $request->type,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('topics.show', $topic)->with('success', 'Content added successfully.');
    }

    public function edit(Topic $topic, Content $content)
    {
        return view('contents.edit', compact('topic', 'content'));
    }

    public function update(Request $request, Topic $topic, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required|in:note,video,quiz',
            'video_url' => 'nullable|url',
        ]);

        $content->update($request->only('title', 'body', 'type', 'video_url'));

        return redirect()->route('topics.show', $topic)->with('success', 'Content updated successfully.');
    }

    public function destroy(Topic $topic, Content $content)
    {
        $content->delete();
        return redirect()->route('topics.show', $topic)->with('success', 'Content deleted successfully.');
    }}
