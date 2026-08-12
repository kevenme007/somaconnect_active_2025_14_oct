@extends('layouts.root') <!-- adjust to your layout -->

@section('title', 'Conversation')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Conversation</h4>
        </div>
        <div class="card-body" style="max-height: 500px; overflow-y: auto;">
            @if($messages->count() > 0)
                @foreach($messages as $message)
                    @php
                        $isSender = $message->sender_id === auth()->id();
                        $avatarUrl = $message->sender->profile && $message->sender->profile->avatar
                            ? Storage::url($message->sender->profile->avatar)
                            : asset('assets/img/avatar.jpg');
                    @endphp

                    <div class="d-flex mb-2 {{ $isSender ? 'justify-content-end' : 'justify-content-start' }} align-items-end">

                        @if (! $isSender)
                            <img src="{{ $avatarUrl }}" alt="Avatar" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                        @endif

                        <div class="p-2 rounded" style="max-width: 70%; background-color: {{ $isSender ? '#d1e7dd' : '#f8f9fa' }}; border: 1px solid #ccc;">
                            <strong class="d-block" style="font-size: 14px; color: #495057;">
                                {{ $isSender ? 'You' : $message->sender->name }}
                            </strong>
                            <p class="mb-1" style="font-size: 15px;">{{ $message->body ?? $message->message }}</p>
                            <small class="text-muted">
                                {{ $message->created_at->format('H:i') }}
                                @if ($isSender)
                                    @if ($message->seen_at)
                                        <span style="color: green;">✔✔</span>
                                    @else
                                        <span style="color: gray;">✔</span>
                                    @endif
                                @endif
                            </small>
                        </div>

                        @if ($isSender)
                            <img src="{{ auth()->user()->profile && auth()->user()->profile->avatar
                                        ? Storage::url(auth()->user()->profile->avatar)
                                        : asset('assets/img/avatar.jpg') }}"
                                alt="Avatar" class="rounded-circle ms-2" style="width: 35px; height: 35px; object-fit: cover;">
                        @endif
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">No messages in this conversation.</div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('dashboard.student') }}" class="btn btn-secondary">Back to Dashboard</a>
            <!-- Optionally add a reply form here -->
        </div>
    </div>
</div>
@endsection
