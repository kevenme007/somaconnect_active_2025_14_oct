@extends('layouts.root')
@section('title', 'Create Topic')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Create Topic {{ $subject->name }}</h1>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('subjects.topics.store', $subject->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Topic Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Save Topic</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
