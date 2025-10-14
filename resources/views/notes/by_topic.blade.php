@extends('layouts.root')

@section('title', 'Notes by Topic')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Notes by Topic</h1>
    </div>

    <section class="section">
        @foreach($topics as $topic)
            <div class="card mb-4">
                <div class="card-header">
                    <h4>{{ $topic->name }}</h4>
                </div>
                <div class="card-body">
                    @forelse($topic->resources as $resource)
                        <h5>📘 {{ $resource->title }}</h5>
                        <ul class="list-group mb-3">
                            @forelse($resource->notes as $note)
                                <li class="list-group-item">
                                    <strong>Page {{ $note->page_number ?? 'N/A' }}:</strong>
                                    {{ $note->content }} <br>
                                    <small class="text-muted">By {{ $note->user->name ?? 'Unknown' }}</small>
                                </li>
                            @empty
                                <li class="list-group-item text-muted">No notes available for this resource.</li>
                            @endforelse
                        </ul>
                    @empty
                        <p class="text-muted">No resources found under this topic.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </section>
</main>
@endsection
