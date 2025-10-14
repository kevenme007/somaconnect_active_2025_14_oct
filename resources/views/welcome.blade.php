@extends('layouts.main3_frontend')

@section('title')
@endsection

@section('content')
    <!-- ======slider-area-start============================================ -->
    <div class="slider-area slider-2 over-hidden">
        <div class="slider-wrapper">
            <div class="row">
                <!-- Main Slider Section -->
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 pr-10">
                    <div class="slider-active">
                        <!-- Slide 1 -->
                        <div class="single-slider slider-height-2 d-flex align-items-center"
                            data-background="/assets3/images/slider/slider1-home1.jpg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12 d-flex align-items-center">
                                        <div class="slider-content">
                                            <span data-animation="fadeInDown" data-delay=".7s"
                                                class="position-relative text-white fs-16 pl-60">Featured Learning
                                                Resources</span>
                                            <h1 data-animation="fadeInDown" data-delay="1s" class="pt-70 pb-10 text-white">
                                                Study Smart
                                            </h1>
                                            <p data-animation="fadeInDown" data-delay="1.3s" class="text-white fs-16">
                                                Access curated study materials, past papers, tutorials, and reference books
                                                to enhance your learning journey with SomaConnect.
                                            </p>
                                            <a data-animation="fadeInDown" data-delay="1.7s" href="/materials"
                                                class="btn mt-90" style="background-color: #e6e92cff; color: #fff;">
                                                Start Learning
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="single-slider slider-height-2 d-flex align-items-center"
                            data-background="/assets3/images/slider/slider2-home2.jpg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 d-flex align-items-center">
                                        <div class="slider-content pl-35">
                                            <span data-animation="fadeInLeft" data-delay=".7s"
                                                class="position-relative text-white fs-16 pl-60">Learn Anytime,
                                                Anywhere</span>
                                            <h1 data-animation="fadeInLeft" data-delay="1s" class="pt-70 pb-10 text-white">
                                                Your Digital Library
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="1.3s" class="text-white fs-16">
                                                Study on the go with access to resources, discussion forums, and progress
                                                tracking all in one platform.
                                            </p>
                                            <a data-animation="fadeInLeft" data-delay="1.7s" href="/materials"
                                                class="btn mt-90" style="background-color: #e6e92cff; color: #fff;">
                                                Explore Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="single-slider slider-height-2 d-flex align-items-center"
                            data-background="/assets3/images/slider/slider3-home3.jpg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 d-flex align-items-center">
                                        <div class="slider-content pl-35">
                                            <span data-animation="fadeInLeft" data-delay=".7s"
                                                class="position-relative text-white fs-16 pl-60">Grow Your
                                                Knowledge</span>
                                            <h1 data-animation="fadeInLeft" data-delay="1s" class="pt-70 pb-10 text-white">
                                                Interactive Learning
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="1.3s" class="text-white fs-16">
                                                Collaborate with teachers and students through forums, discussions, and
                                                progress tracking tools.
                                            </p>
                                            <a data-animation="fadeInLeft" data-delay="1.7s" href="/materials"
                                                class="btn mt-90" style="background-color: #e6e92cff; color: #fff;">
                                                Get Started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /slider-active -->
                </div>

                <!-- Side Banners -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 pl-md-0">
                    <div class="slider-site">
                        <!-- Past Papers -->
                        <div class="single-banner mb-10 position-relative over-hidden">
                            <img class="img-zoom width100" src="/assets3/images/slider/banner-slider1.jpg" alt="">
                            <div class="section-content section-content-position position-absolute pl-55 pt-50">
                                <span class="text-white">Available Resources</span>
                                <h3 class="text-white pt-15">Past Papers</h3>
                                <a href="/past-papers"
                                    class="btn2 position-relative d-inline-block pt-45 pb-6 text-white">Explore</a>
                            </div>
                        </div>

                        <!-- Reference Books -->
                        <div class="single-banner mb-10 position-relative over-hidden">
                            <img class="img-zoom width100" src="/assets3/images/slider/banner-slider2.jpg" alt="">
                            <div class="section-content section-content-position position-absolute text-end pr-55 pt-50">
                                <span class="text-white">Available Resources</span>
                                <h3 class="text-white pt-15">Reference Books</h3>
                                <a href="/reference-books"
                                    class="btn2 position-relative d-inline-block pt-45 pb-6 text-white">Explore</a>
                            </div>
                        </div>

                        <!-- Tutorials -->
                        <div class="single-banner position-relative over-hidden">
                            <img class="img-zoom width100" src="/assets3/images/slider/banner-slider3.jpg" alt="">
                            <div class="section-content section-content-position position-absolute pl-55 pt-50">
                                <span class="text-white">Available Resources</span>
                                <h3 class="text-white pt-10">Tutorials</h3>
                                <a href="/materials"
                                    class="btn2 position-relative d-inline-block pt-45 pb-6 text-white">Explore</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /col -->
            </div>
        </div>
    </div>

    <!-- slider-area-end  -->

    <!-- ====== store-product-area-start=========================================== -->
    <div class="store-product-area store-product-position over-hidden">
        <div class="container-wrapper pl-15 pr-15">

            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 offset-xl-2">
                    <div class="section-title text-center pb-15 pt-95 pl-25 pr-25">
                        <span>Welcome to SomaConnect</span>
                        <h2 class="underline position-relative pb-20 mb-50 pt-2">Find What You Want to Learn</h2>
                        <p>
                            SomaConnect is your one‑stop digital platform for reading, learning, and sharing knowledge.
                            Browse curated topics, track your progress, and collaborate with teachers and students in real
                            time.
                            Discover books, resources, and discussions tailored to your learning journey.
                        </p>
                    </div><!-- /section-title -->
                </div><!-- /col -->
            </div><!-- /row -->


            <div class="row">
                <div class="col-xl-4  col-lg-4  col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid1-home1.jpeg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a class="text-capitalize text-white fw-bold fs-4" href="#">Geography</a></h4>
                            <span class="text-white"><span
                                    class="text-white fw-bold fs-4">{{ $counts['Geography'] ?? 0 }}</span> items</span>
                        </div>
                    </div>
                </div><!-- /col -->
                <div class="col-xl-4  col-lg-4  col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid2-home2.jpg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a class="text-capitalize text-white fw-bold fs-4" href="#">Computer Languages</a>
                            </h4>
                            <span class="text-white"><span
                                    class="text-white fw-bold fs-4">{{ $counts['Computer Studies'] ?? 0 }}</span>
                                items</span>
                        </div>
                    </div>
                </div><!-- /col -->
                <div class="col-xl-4  col-lg-4  col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid3-home3.jpg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a class="text-capitalize text-white fw-bold fs-4" href="#">Science</a></h4>
                            <span class="text-white"><span
                                    class="text-white fw-bold fs-4">{{ $counts['Science'] ?? 0 }}</span> items</span>
                        </div>
                    </div>
                </div><!-- /col -->
                <div class="col-xl-4  col-lg-4 col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid4-home4.jpg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a class="text-capitalize text-black fw-bold fs-4" href="#">Mathematics</a></h4>
                            <span class="text-black"><span
                                    class="text-black fw-bold fs-4">{{ $counts['Mathematics'] ?? 0 }}</span> items</span>
                        </div>
                    </div>
                </div><!-- /col -->
                <div class="col-xl-4  col-lg-4 col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid6-home6.jpg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a class="text-capitalize text-black fw-bold fs-4" href="#">Kiswahili</a></h4>
                            <span class="text-black"><span
                                    class="text-black fw-bold fs-4">{{ $counts['Kiswahili'] ?? 0 }}</span> items</span>
                        </div>
                    </div>
                </div><!-- /col -->
                <div class="col-xl-4  col-lg-4  col-md-4  col-sm-12 col-12 plr-5">
                    <div class="single-store-product position-relative over-hidden mb-10">
                        <a href="#"><img class="img-zoom width100 height100"
                                src="/assets3/images/store-product/grid5-home5.jpg" alt=""></a>
                        <div class="store-product-title position-absolute pt-40 pl-40">
                            <h4><a href="#" class="text-capitalize text-white fw-bold fs-4">History</a></h4>
                            <span class="text-white"><span
                                    class="text-white fw-bold fs-4">{{ $counts['History'] ?? 0 }}</span> items</span>
                        </div>
                    </div>
                </div><!-- /col -->
            </div><!-- /row -->

        </div><!-- /container -->
    </div>
    <!-- store-product-area-end  -->

    <!-- ====== pastpapers-area-start================================ -->
    <div class="bestseller-product-area">
        <div class="container-fluid">

            <!-- Section Title -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center pt-90 pb-30">
                        <h2>Past Papers</h2>
                        <p>Browse and download past papers to help you prepare effectively for your exams.</p>
                    </div>
                </div>
            </div>

            <!-- Past Papers List -->
            <div class="Sale-Products-home2-active">
                {{-- <div class="row pl-10 pr-10 pt-20"> --}}

                @if ($pastpapers->count() > 0)
                    @foreach ($pastpapers as $paper)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-40">
                            <div class="single-product bg-white position-relative pb-30">

                                <!-- /row -->
                                <div class="row pl-10 pr-10 pt-20">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-40">
                                        <div class="single-product bg-white position-relative pb-30">
                                            <div class="single-product-img position-relative">
                                                <a href="{{ route('notes.show', encrypt($paper->id)) }}">
                                                    {{-- <img
                                                        class="height100"
                                                        src="/assets3/images/product/default-pastpaper.jpg"
                                                        alt="" /></a> --}}
                                                <div class="single-product-hover-img position-absolute">
                                                    {{-- <a href="{{ route('notes.show', encrypt($paper->id)) }}">
                                                        <img
                                                            class="height100"
                                                            src="/assets3/images/product/default-pastpaper.jpg"
                                                            alt="" /></a> --}}
                                                    <ul class="single-product-button d-flex position-absolute">
                                                        <li data-bs-toggle="tooltip" data-selector="true"
                                                            data-placement="bottom" title="{{ $paper->title }}">
                                                            <a href="{{ route('notes.show', encrypt($paper->id)) }}"><span
                                                                    class="icon-eye"></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /single-product-hover-img -->
                                            </div>
                                            <!-- /single-product-img -->
                                            <h5 class="product-name pt-20 pl-20">
                                                <a
                                                    href="{{ route('notes.show', encrypt($paper->id)) }}">{{ $paper->title }}</a>
                                            </h5>
                                            <div class="product-price pl-20 d-inline-block">
                                                <span class="black-color">{{ $paper->subject->name }}</span>
                                            </div>
                                            <div class="product-dot d-inline-block float-end pr-20">
                                                <span class="darkblue-bg"></span>
                                                <span class="gray-bg"></span>
                                                <span class="yellow-bg"></span>
                                            </div>
                                            <!-- /product-dot -->
                                        </div>
                                        <!-- /single-product -->
                                    </div>
                                    <!-- /col -->
                                    <!-- Download Button -->
                                    {{-- <div class="pl-20 pt-10">
                                            @if ($paper->file_path)
                                            <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank"
                                                class="btn btn-success btn-sm mt-2">
                                                Download
                                            </a>
                                            @else
                                            <span class="text-danger">Not Available</span>
                                            @endif --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No past papers available at the moment.</p>
                    </div>
                @endif

            </div>

            {{--
                </div> --}}
        </div>

        <!-- View All Button -->
        @if ($pastpapers->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="section-button text-center pt-10">
                        <a href="{{ route('pastpapers') }}" class="btn black-color border-black">All Past Papers</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
    </div>

    <!-- pastpapers-area-end  -->




    <!-- ====== reference-books-area-start ====================================== -->
    <div class="sale-products-area over-hidden">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center pt-5 pb-3">
                        <h2>Reference Books</h2>
                        <p>Explore recommended reference books to support your studies and research.</p>
                    </div>
                </div>
            </div>

            <!-- Swiper Carousel -->
            <div class="swiper mySwiper pb-4">
                <div class="swiper-wrapper">
                    @if ($referenceBooks->count() > 0)
                        @foreach ($referenceBooks as $book)
                            <div class="swiper-slide">
                                <div class="single-product bg-white h-100 d-flex flex-column pb-3">

                                    <!-- Book Image -->
                                    <div class="single-product-img mb-3">
                                        <a href="{{ route('notes.show', encrypt($book->id)) }}">
                                            <img class="img-fluid card-img-top img-fluid rounded"
                                                src="{{ $book->image_path ? asset('storage/' . $book->image_path) : asset('assets3/images/product/default-book.jpg') }}"
                                                alt="{{ $book->title }}"
                                                style="height: 250px; object-fit: cover;">
                                        </a>
                                    </div>

                                    <!-- Book Title -->
                                    <h5 class="product-name mb-2">
                                        <a href="{{ route('notes.show', encrypt($book->id)) }}">
                                            {{ Str::limit($book->title, 50) }}
                                        </a>
                                    </h5>

                                    <!-- Author Info -->
                                    <div class="product-author mb-2 text-muted">
                                        {{ $book->author ?? 'N/A' }}
                                    </div>

                                    <!-- Download / View Button -->
                                    <div class="mt-auto">
                                        @if ($book->file_path)
                                            <a href="{{ route('notes.show', encrypt($book->id)) }}"
                                                class="btn btn-success btn-sm w-100">
                                                <i class="fas fa-book"></i>
                                            </a>
                                        @else
                                            <span class="text-danger">Not Available</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide text-center">
                            <p>No reference books available at the moment.</p>
                        </div>
                    @endif
                </div>

                <!-- Navigation Arrows -->
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}

                <!-- Pagination Dots (optional) -->
                {{-- <div class="swiper-pagination"></div> --}}
            </div>

        </div>
    </div>



    <!--  reference-books-area-end  -->

    <!-- ====== recent-added-area-start=============================================== -->
    <div class="blog-area over-hidden">
        <div class="container-wrapper">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center pt-40 pb-30">
                        <h2>Recently Added Resources</h2>
                        <p>Check out the latest past papers, reference books, and tutorials added to SomaConnect.</p>
                    </div>
                </div>
            </div>

            <!-- Slick Slider -->
            <div class="book-slider">
                @if ($recentResources->count() > 0)
                    @foreach ($recentResources as $resource)
                        <div class="single-blog" style="width: 300px; margin-right: 20px;">
                            <div class="single-blog-content pt-25">
                                <h4>
                                    <a href="{{ route('notes.show', encrypt($resource->id)) }}">
                                        {{ Str::limit($resource->title, 50) }}
                                    </a>
                                </h4>
                                <ul class="d-flex pb-6">
                                    <li><span>Post date:</span></li>
                                    <li>
                                        <a class="date pl-1" href="#">
                                            {{ $resource->created_at->format('d M, Y') }}
                                        </a>
                                    </li>
                                </ul>
                                <p class="pt-10">
                                    {{ Str::limit($resource->description, 100) }}
                                </p>
                                <a href="{{ route('notes.show', encrypt($resource->id)) }}"
                                    class="btn black-color border-black mt-15">
                                    <i class="fas fa-book-open"></i> Read
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No new resources added yet.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>



    <!--  recent-added-books-area-end  -->

    <!-- ====== subscribe-area-start========================================== -->

    <!-- ====== subscribe-area-start========================================== -->
    <div class="subscribe-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12 offset-xl-2 offset-lg-1">
                    <div class="section-title text-center pl-50 pr-50">
                        <h2 class="pb-1">Stay Connected with Soma Connect</h2>
                        <p>
                            Subscribe to our newsletter to get updates on new books, upcoming learning features,
                            special resources, and tips to enhance your study experience.
                        </p>
                    </div><!-- /section-title -->
                </div><!-- /col -->
            </div><!-- /row -->
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12 offset-xl-2 offset-lg-1">
                    <div class="subscribe-form text-center">
                        <form action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <input type="email" name="email" id="email"
                                placeholder="Enter your email to subscribe now" required>
                            <button type="submit" class="btn text-white mt-30">Subscribe here</button>
                        </form>
                    </div>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </div>
    <!-- ====== subscribe-area-end========================================== -->


    <!--  brand-logo-area-end   -->
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session()->has('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: {!! json_encode(session('success')) !!},
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true
            });
        @endif

        @if (session()->has('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: {!! json_encode(session('error')) !!},
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true
            });
        @endif
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5, // how many books show at once
            spaceBetween: 20, // space between slides
            loop: true, // infinite loop
            autoplay: {
                delay: 3000, // 3 seconds per slide
                disableOnInteraction: false, // keep autoplay even after user interaction
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4
                },
                992: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2
                },
                576: {
                    slidesPerView: 1
                },
            },
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.book-slider').slick({
                slidesToShow: 4, // number of books visible
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0, // removes pause
                speed: 10000, // adjust speed (lower = faster)
                cssEase: 'linear', // makes it continuous
                infinite: true,
                arrows: false, // remove prev/next
                dots: false, // remove dots
                pauseOnHover: false // don’t stop on hover
            });
        });
    </script>
@endsection
