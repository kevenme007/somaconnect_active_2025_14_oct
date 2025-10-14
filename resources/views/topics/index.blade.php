@extends('layouts.root')
@section('title', 'Topics for ' . $subject->name)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Topics - {{ $subject->name }}</h1>
        <a href="{{ route('subjects.topics.create', $subject) }}" class="btn btn-primary float-end">
            + Add New Topic
        </a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Topics</h5>

                @if ($topics->count())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Contents</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $index => $topic)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>{{ $topic->contents->count() }}</td>
                                    <td>
                                        <a href="{{ route('subjects.topics.edit', [$topic->subject->id, $topic->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('subjects.topics.destroy', [$topic->subject->id, $topic->id]) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('subjects.topics.contents.index', [$topic->subject->id, $topic->id]) }}" class="btn btn-sm btn-info">
                                            View Contents
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No topics found for this subject.</p>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
