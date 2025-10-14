@extends('layouts.root')

@section('title', 'Start Chat')

@section('content')
<main id="main" class="main">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Start a Conversation</h2>
            <a href="/" class="btn btn-outline-primary">
                <i class="bi bi-house-door"></i> Home
            </a>
        </div>

        <div class="row">
            @forelse($users as $user)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <img src="{{ $user->profile && $user->profile->avatar ? Storage::url($user->profile->avatar) : asset('assets/img/avatar.jpg') }}"
                            alt="Avatar" class="rounded-circle mb-2"
                            style="width: 80px; height: 80px; object-fit: cover;">

                        <h5 class="card-title mt-2">{{ $user->name }}</h5>
                        <p class="card-text text-muted">{{ ucfirst($user->role) }}</p>

                        <a href="{{ route('chat.show', $user->id) }}" class="btn btn-primary w-100">
                            <i class="bi bi-chat-dots"></i> Chat Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No users available to chat with.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</main>
@endsection