@extends('layouts.root')
@section('title', 'Most Read Resources')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Most Read Resources</h1>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Top 10 Most Read Resources</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $index => $resource)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $resource->title }}</td>
                                <td>{{ ucfirst($resource->type) }}</td>
                                <td>{{ $resource->document_reads_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
