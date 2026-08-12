@extends('layouts.root')

@section('title', 'New Topic')

@section('content')
<main id="main" class="main">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header text-black">
                <h4 class="mb-0">Create New Topic</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('forum.threads.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Content</label>
                        <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                    </div>
                    @if(auth()->user()->role === 'admin')
                    <div class="mb-3">
                        <label for="school_id" class="form-label">School (optional)</label>
                        <select class="form-select" id="school_id" name="school_id">
                            <option value="">Public (all schools)</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                        <input type="hidden" name="school_id" value="{{ auth()->user()->profile->school_id ?? null }}">
                    @endif
                    <button type="submit" class="btn btn-primary">Create Topic</button>
                    <a href="{{ route('forum.threads.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
