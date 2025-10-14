@extends('layouts.root')
@section('title', 'Contents for ' . $topic->name)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Contents - {{ $topic->name }}</h1>
        <a href="{{ route('contents.create') }}" class="btn btn-primary float-end">
            + Add New Content
        </a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Contents</h5>

                @if ($contents->count())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Uploader</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $index => $content)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->user->name }}</td>
                                    <td>{{ $content->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('contents.edit', $content) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No contents found for this topic.</p>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
