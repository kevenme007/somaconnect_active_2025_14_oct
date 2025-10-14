@extends('layouts.main3_frontend')

@section('title')
@endsection

@section('content')

    <!-- pastpapers Section start  -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Reference Books</h2>
                </div>
                {{-- <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a> --}}
            </div>
            <div class="swiper book-slider">
                <div class="swiper-wrapper">
                    @foreach ($referenceBooks as $tb)
                        <div class="swiper-slide">
                            <div class="shop-box-items style-2">
                                <div class="book-thumb center">
                                    <a href="{{route('notes.show', encrypt($tb->id))}}">
                                        <img src="{{ asset('/storage/'.$tb->image_path) }}" alt="{{ $tb->title }}"
                                            style="width: 100%; height: auto;">
                                    </a>

                                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li>
                                            <a href="{{route('notes.show', encrypt($tb->id))}}"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-content">
                                    <h5>{{ $tb->subject->name ?? 'No Subject Name' }}</h5>
                                    <h3><a href="{{route('notes.show', encrypt($tb->id))}}">{{ $tb->title }}</a></h3>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="content">{{ $tb->author }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
