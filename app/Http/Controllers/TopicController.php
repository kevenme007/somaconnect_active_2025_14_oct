<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Subject $subject)
    {
        // $topics = $subject->topics;
        $topics = $subject->topics()->withCount('contents')->get();
        return view('topics.index', compact('topics', 'subject'));
    }

    public function create(Subject $subject)
    {
        // $subjects = Subject::all();
        return view('topics.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // $subject->topics()->create($request->only('name', 'description'));
        Topic::create([
            'subject_id'  => $subject->id,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('subjects.topics.index', $subject)->with('success', 'Topic added successfully.');
    }

    public function edit(Subject $subject, Topic $topic)
    {
        return view('topics.edit', compact('subject', 'topic'));
    }

    public function update(Request $request, Subject $subject, Topic $topic)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $topic->update($request->only('name', 'description'));
        //    $topic->update([
        // 'subject_id'  => $request->subject_id,
        // 'name'        => $request->name,
        // 'description' => $request->description,
        // ]);

        return redirect()->route('subject.topics.index', $subject)->with('success', 'Topic updated successfully.');
    }

    public function destroy(Subject $subject, Topic $topic)
    {
        $topic->delete();
        return redirect()->route('subjects.topics.index', $subject)->with('success', 'Topic deleted successfully.');
    }
}
