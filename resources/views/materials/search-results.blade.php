@extends('layouts.main_frontend')

@section('title', 'Search Results')

@section('content')
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h4>Search Results for "{{ $query }}"</h4>
                </div>
            </div>

            @if ($results->count())
                <div class="row">
                    @foreach ($results as $tb)
                        <div class="col-md-3">
                            <div class="shop-box-items style-2">
                                <div class="book-thumb center">
                                    <a href="{{ route('notes.show', $tb->id) }}">
                                        <img src="{{ asset('/storage/' . $tb->image_path) }}" alt="{{ $tb->title }}" style="width: 100%; height: auto;">
                                    </a>
                                </div>
                                <div class="shop-content">
                                    <h5>{{ $tb->subject->name ?? 'No Subject Name' }}</h5>
                                    <h3><a href="{{ route('notes.show', $tb->id) }}">{{ $tb->title }}</a></h3>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="content">{{ $tb->author }}</span>
                                            <span class="content">Form {{ $tb->grade_level }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No study materials found.</p>
            @endif
        </div>
    </section>
@endsection
