@extends('layouts.root')

@section('title', 'Forum')

@section('content')
<main id="main" class="main">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <h2 class="fw-bold">Forum Topics</h2>
            <div>
                @if(in_array(auth()->user()->role, ['admin', 'teacher']))
                    <a href="{{ route('forum.threads.create') }}" class="btn btn-primary me-2">
                        <i class="bi bi-plus-circle"></i> New Topic
                    </a>
                @endif
                <a href="/" class="btn btn-outline-primary">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <form method="GET" action="{{ route('forum.threads.index') }}" class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search topics..." value="{{ request('search') }}">
                    </div>
                    @if(auth()->user()->role === 'admin')
                    <div class="col-md-3">
                        <select name="school_filter" class="form-select">
                            <option value="">All Schools</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}" @selected(request('school_filter') == $school->id)>{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('forum.threads.index') }}" class="btn btn-secondary w-100"><i class="bi bi-x-circle"></i> Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Threads Grid -->
        <div class="row g-3">
            @forelse($threads as $thread)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('forum.threads.show', $thread) }}" class="text-decoration-none">
                                    {{ Str::limit($thread->title, 40) }}
                                </a>
                            </h5>
                            <div class="text-muted small">
                                By {{ $thread->user->name }}
                                @if($thread->school)
                                    · {{ $thread->school->name }}
                                @endif
                            </div>
                            <div class="mt-2 text-muted small">
                                <i class="bi bi-clock"></i> {{ $thread->created_at->diffForHumans() }}
                            </div>
                            <div class="mt-1 text-muted small">
                                <i class="bi bi-chat"></i> {{ $thread->posts_count ?? 0 }} replies
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('forum.threads.show', $thread) }}" class="btn btn-sm btn-outline-primary w-100">
                                View Topic
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">No topics found. Be the first to start a discussion!</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $threads->links() }}
        </div>
    </div>
</main>
@endsection
