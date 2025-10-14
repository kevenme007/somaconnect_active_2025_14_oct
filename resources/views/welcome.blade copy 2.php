@extends('layouts.main_frontend')

@section('title')
@endsection

@section('content')
   <section class="feature-section section-padding fix pt-0">
    <div class="container">
        <div class="feature-wrapper">
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s">
                <div class="icon">
                    <i class="icon-icon-1"></i>
                </div>
                <div class="content">
                    <h3>Instant Access</h3>
                    <p>Learn anytime, anywhere</p>
                </div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s">
                <div class="icon">
                    <i class="icon-icon-2"></i>
                </div>
                <div class="content">
                    <h3>Secure Platform</h3>
                    <p>Your data is always safe</p>
                </div>
            </div>
            <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s">
                <div class="icon">
                    <i class="icon-icon-3"></i>
                </div>
                <div class="content">
                    <h3>24/7 Support</h3>
                    <p>Help whenever you need it</p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- TextBooks Section start  -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Text Books</h2>
                </div>
                <a href="/materials" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="swiper book-slider">
                <p>Available Text Books: {{ isset($textBooks) ? $textBooks->count() : 'NOT SET' }}</p>

                <div class="swiper-wrapper">
                    @foreach ($textBooks ?? [] as $tb)
                        <div class="swiper-slide">
                            <div class="shop-box-items style-2">
                                <div class="book-thumb center">
                                    <a href="{{ route(name: 'notes.show', parameters: encrypt($tb->id)) }}">
                                        {{-- <img src="assets/img/book/english.jpg" alt="img"></a> --}}
                                        {{-- <a href="shop-details"> --}}
                                        <img src="{{ asset('storage/' . $tb->image_path) }}" alt="{{ $tb->title }}"
                                            style="width: 100%; height: auto;">
                                    </a>

                                    {{-- <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li>
                                            <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                                <div class="shop-content">
                                    <h5>{{ $tb->subject->name ?? 'No Subject Name' }}</h5>
                                    <h3><a href="{{ route('notes.show', encrypt($tb->id)) }}">{{ $tb->title }}</a></h3>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="content">{{ $tb->author }}</span>
                                            <span class="content">Form {{ $tb->grade_level }}</span>

                                        </li>
                                        {{-- <li class="authot-list">
                                            <span class="content">Form {{ $tb->grade_level }}</span>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Reference Books Section start  -->
    <section class="book-catagories-section fix section-padding">
        <div class="container">
            <div class="book-catagories-wrapper">
                <div class="section-title text-center">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Reference Book</h2>
                </div>
                <div class="array-button">
                    <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                    <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                </div>
                <div class="swiper book-catagories-slider">
                    <div class="swiper-wrapper">
                        @foreach ($referenceResources as $rb)FnB123
                            <div class="swiper-slide">
                                <div class="book-catagories-items">
                                    <div class="book-thumb">
                                        <img src="assets/img/book-categori/001.png" alt="img">
                                        <div class="circle-shape">
                                            <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                        </div>
                                    </div>
                                    <div class="number"> 01 </div>
                                    <h3><a href="shop-details.html">Romance Books (80)</a></h3>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals Books Section Start -->
    <section class="featured-books-section pt-100 pb-145 fix section-bg">
        <div class="container">
            <div class="section-title-area justify-content-center">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>New Arrivals Books</h2>
                </div>
            </div>

            <div class="swiper featured-books-slider">
                <p>Available New Learning Materials:
                    {{ isset($newArrivalResources) ? $newArrivalResources->count() : 'NOT SET' }}</p>
                <div class="swiper-wrapper">
                    @foreach ($newArrivalResources as $tb)
                        <div class="swiper-slide">
                            <div class="shop-box-items style-4 wow fadeInUp" data-wow-delay=".2s">
                                <div class="shop-content">
                                    <ul class="book-category">
                                        <li class="book-category-badge">{{ $tb->subject->name }}</li>
                                    </ul>
                                    <h3><a href="{{ route('notes.show', encrypt($tb->id)) }}">{{ $tb->title }}</a></h3>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="content">{{ $tb->author }}</span>
                                        </li>
                                    </ul>
                                    <div class="book-availablity">
                                        <div class="details">
                                            @if ($textBooks->count() <= 1)
                                                <p>{{ $textBooks->count() }} Book available</p>
                                            @else
                                                <p>{{ $textBooks->count() }} Books available</p>
                                            @endif
                                        </div>
                                        <div class="shop-btn">
                                            <a href="{{ route('notes.show', encrypt($tb->id)) }}">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Most Read Section start  -->
    <section class="top-ratting-book-section fix section-padding section-bg">
        <div class="container">
            <div class="top-ratting-book-wrapper">
                <div class="section-title-area">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Most Read Learning Materials</h2>
                    </div>
                    <a href="{{ route('resources.most_read') }}" class="theme-btn transparent-btn wow fadeInUp"
                        data-wow-delay=".5s">View More <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="row">
                    <p>Available Most Read Learning Materials:
                        {{ isset($mostReadResources) ? $mostReadResources->count() : 'NOT SET' }}</p>

                    @foreach ($mostReadResources as $mostReadResource)
                        <div class="col-xl-4 wow fadeInUp" data-wow-delay=".3s">
                            <div class="top-ratting-box-items">
                                <div class="book-thumb">
                                    <a href="{{ route('notes.show', encrypt($mostReadResource->id)) }}">
                                        <img src="{{ asset('storage/' . $mostReadResource->image_path) }}"
                                            alt="{{ $mostReadResource->title }}">
                                    </a>
                                </div>
                                <div class="book-content">
                                    <div class="title-header">
                                        <div>
                                            <h5>{{ $mostReadResource->subject->name ?? 'No Subject Name' }}</h5>
                                            <h3>
                                                <a
                                                    href="{{ route('notes.show', encrypt($mostReadResource->id)) }}">{{ $mostReadResource->title }}</a>
                                            </h3>
                                        </div>
                                        <ul class="shop-icon d-flex justify-content-center align-items-center">
                                            <li>
                                                <a href="{{ route('notes.show', encrypt($mostReadResource->id)) }}"><i
                                                        class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="content mt-10">Form {{ $mostReadResource->grade_level }}</span>
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
