@extends('layouts.root')

@section('title')
    Student Dashboard
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Stats Cards Row -->
            <div class="col-12">
                <div class="row">

                    <!-- Past Papers Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Past Papers</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-pdf"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $pastPapers->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reference Books Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Reference Books</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $referenceBooks->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Notes</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $notes->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Unread Messages Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Unread Messages</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $unreadMessages }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Stats Cards -->

            <!-- Recent Resources Table -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recently Accessed Resources</h5>

                        @if($recentResources->count() > 0)
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Type</th>
                                        {{-- <th scope="col">Accessed On</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentResources as $interaction)
                                        @php
                                            $resource = $interaction->resource;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $resource->title ?? 'Deleted Resource' }}</td>
                                            <td>
                                                @if($resource)
                                                    @if($resource->resource_type == 'PastPaper')
                                                        <span class="badge bg-success">Past Paper</span>
                                                    @elseif($resource->resource_type == 'ReferenceBook')
                                                        <span class="badge bg-info">Reference Book</span>
                                                    @else
                                                        <span class="badge bg-warning">{{ $resource->resource_type ?? 'Other' }}</span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-secondary">N/A</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                {{ $interaction->created_at ? $interaction->created_at->format('d M Y, h:i A') : 'N/A' }}
                                            </td> --}}
                                            <td>
                                                @if($resource)
                                                    <a href="{{ route('notes.show', encrypt($resource->id)) }}" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-eye"></i> View
                                                    </a>
                                                @else
                                                    <span class="text-muted">Unavailable</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info text-center">
                                You haven't accessed any resources yet. Start exploring our <a href="{{ route('materials') }}">Materials</a> section!
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- End Recent Resources -->

            <!-- Recent Messages -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Messages</h5>

                        @if($recentMessages->count() > 0)
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Sent On</th>
                                        <th scope="col">Action</th> <!-- NEW -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentMessages as $message)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ Str::limit($message->message, 60) }}</td>
                                            <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                                            <td>
                                                {{-- <a href="{{ route('chat.conversation', $message->conversation_id) }}"
                                                   class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i> Read
                                                </a> --}}
                                                <a href="{{ route('chat.conversation', $message->conversation_id) }}" class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i> Read
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info text-center">
                                You haven't sent any messages yet.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection
