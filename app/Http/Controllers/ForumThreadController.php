<?php

namespace App\Http\Controllers;

use App\Models\ForumThread;
use App\Models\School;
use Illuminate\Http\Request;

class ForumThreadController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();

    //     $threads = ForumThread::with(['user', 'school'])
    //         ->when($user->role !== 'admin', function ($query) use ($user) {
    //             $schoolId = $user->profile->school_id ?? null;
    //             if ($schoolId) {
    //                 $query->where('school_id', $schoolId)
    //                     ->orWhereNull('school_id');
    //             }
    //         })
    //         ->latest()
    //         ->paginate(20);

    //     return view('forum.index', compact('threads'));
    // }


    // public function index(Request $request)
    // {
    //     $user = auth()->user();
    //     $query = ForumThread::with(['user', 'school']);

    //     if ($user->role !== 'admin') {
    //         $schoolId = $user->profile->school_id ?? null;
    //         if ($schoolId) {
    //             $query->where(function ($q) use ($schoolId) {
    //                 $q->where('school_id', $schoolId)->orWhereNull('school_id');
    //             });
    //         }
    //     }

    //     if ($request->filled('search')) {
    //         $query->where('title', 'like', '%' . $request->search . '%');
    //     }

    //     if ($request->filled('school_filter') && $user->role === 'admin') {
    //         $query->where('school_id', $request->school_filter);
    //     }

    //     $threads = $query->latest()->paginate(12);

    //     $schools = School::all();

    //     return view('forum.index', compact('threads', 'schools'));
    // }

    public function index()
    {
        $user = auth()->user();

        $threads = ForumThread::with(['user', 'school'])
            ->withCount('posts') 
            ->when($user->role !== 'admin', function ($query) use ($user) {
                $schoolId = $user->profile->school_id ?? null;
                if ($schoolId) {
                    $query->where('school_id', $schoolId)
                        ->orWhereNull('school_id');
                }
            })
            ->latest()
            ->paginate(20);

        return view('forum.index', compact('threads'));
    }
    public function create()
    {
        // Only teachers and admins can create
        if (!in_array(auth()->user()->role, ['admin', 'teacher'])) {
            abort(403, 'Only teachers and admins can create topics.');
        }

        $schools = School::all(); // for admin to choose; for teachers, show their own school(s)
        return view('forum.create', compact('schools'));
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'teacher'])) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'school_id' => 'nullable|exists:schools,id',
        ]);

        ForumThread::create([
            'user_id'   => auth()->id(),
            'school_id' => $request->school_id,
            'title'     => $request->title,
            'body'      => $request->body,
        ]);

        return redirect()->route('forum.threads.index')->with('success', 'Thread created.');
    }

    public function show(ForumThread $thread)
    {
        $thread->load(['user', 'school', 'posts.user']);
        return view('forum.show', compact('thread'));
    }
}
