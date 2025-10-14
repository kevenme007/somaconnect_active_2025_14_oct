@extends('layouts.root')
@section('title', 'Edit Content - ' . $content->title)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Content - {{ $content->title }}</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Content</h5>

                <form action="{{ route('contents.update', $content->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Select Subject -->
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $subject->id == $content->topic->subject_id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Topic -->
                    <div class="mb-3">
                        <label for="topic_id" class="form-label">Topic</label>
                        <select name="topic_id" id="topic_id" class="form-select" required>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ $topic->id == $content->topic_id ? 'selected' : '' }}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Content Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Content Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $content->title }}" required>
                    </div>

                    <!-- Content Body -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Content Body</label>
                        <textarea name="body" id="body" rows="5" class="form-control" required>{{ $content->body }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Content</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
