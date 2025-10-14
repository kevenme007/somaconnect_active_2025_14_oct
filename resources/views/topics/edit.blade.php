@extends('layouts.root')
@section('title', 'Edit Topic - ' . $topic->name)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Topic - {{ $topic->name }}</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Topic</h5>

                <form action="{{ route('subjects.topics.update', [$subject, $topic]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $subject->id == $topic->subject_id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Topic Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $topic->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ $topic->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Topic</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
