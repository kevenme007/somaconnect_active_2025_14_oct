@extends('layouts.root')

@section('title', $thread->title)

@section('content')
<main id="main" class="main">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">{{ $thread->title }}</h3>
                <div class="text-black small">
                    By {{ $thread->user->name }}
                    @if($thread->school)
                        · {{ $thread->school->name }}
                    @endif
                    · {{ $thread->created_at->format('d M Y, H:i') }}
                </div>
            </div>
            <div class="card-body">
                <p>{{ $thread->body }}</p>
            </div>
        </div>

        <h5 class="mt-4">Replies</h5>
        <div class="list-group">
            @forelse($thread->posts as $post)
                <div class="list-group-item">
                    <div class="text-muted small">
                        {{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}
                    </div>
                    <p>{{ $post->content }}</p>
                </div>
            @empty
                <div class="alert alert-secondary">No replies yet.</div>
            @endforelse
        </div>

        @auth
        <div class="card mt-3">
            <div class="card-body">
                <h5>Add Reply</h5>
                <form method="POST" action="{{ route('forum.posts.store', $thread) }}">
                    @csrf
                    <div class="mb-2">
                        <textarea class="form-control" name="content" rows="3" placeholder="Write your reply..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Reply</button>
                </form>
            </div>
        </div>
        @endauth

        <div class="mt-3">
            <a href="{{ route('forum.threads.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Forum
            </a>
        </div>
    </div>
</main>
@endsection
