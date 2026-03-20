@extends('layouts.main3_frontend')

@section('content')
    <!-- Hero Slider Section -->
    <section class="hero-section">
        <div class="hero-slider">
            <!-- Slide 1 -->
            <div class="hero-slide" style="background-image: url('/assets3/images/slider/slider1-home1.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <span class="hero-badge">Featured Learning Resources</span>
                                <h1 class="hero-title">Study Smarter, <span>Not Harder</span></h1>
                                <p class="hero-description text-white">Access curated study materials, past papers,
                                    tutorials, and reference books to enhance your learning journey with SomaConnect.</p>
                                <div class="hero-buttons">
                                    <a href="/materials" class="btn btn-primary-modern btn-lg">Start Learning</a>
                                    <a href="/about" class="btn btn-outline-modern btn-lg">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide" style="background-image: url('/assets3/images/slider/slider2-home2.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <span class="hero-badge">Digital Library</span>
                                <h1 class="hero-title">Learn Anytime, <span>Anywhere</span></h1>
                                <p class="hero-description text-white">Study on the go with access to resources, discussion
                                    forums, and progress tracking all in one platform.</p>
                                <div class="hero-buttons">
                                    <a href="/materials" class="btn btn-primary-modern btn-lg">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide" style="background-image: url('/assets3/images/slider/slider3-home3.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <span class="hero-badge">Interactive Learning</span>
                                <h1 class="hero-title">Grow Your <span>Knowledge</span></h1>
                                <p class="hero-description text-white">Collaborate with teachers and students through
                                    forums, discussions, and progress tracking tools.</p>
                                <div class="hero-buttons">
                                    <a href="/materials" class="btn btn-primary-modern btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Banners -->
    <section class="category-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/assets3/images/slider/banner-slider1.jpg" alt="Past Papers" class="category-img">
                        <div class="category-content">
                            <span class="category-label">Available Resources</span>
                            <h3 class="category-title text-white">Past Papers</h3>
                            <a href="/past-papers" class="category-link">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/assets3/images/slider/banner-slider2.jpg" alt="Reference Books" class="category-img">
                        <div class="category-content text-end">
                            <span class="category-label">Available Resources</span>
                            <h3 class="category-title text-white">Reference Books</h3>
                            <a href="/reference-books" class="category-link">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/assets3/images/slider/banner-slider3.jpg" alt="Tutorials" class="category-img">
                        <div class="category-content">
                            <span class="category-label">Available Resources</span>
                            <h3 class="category-title text-white">Tutorials</h3>
                            <a href="/materials" class="category-link">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <span class="section-subtitle">Welcome to SomaConnect</span>
                    <h2 class="section-title">Find What You <span>Want to Learn</span></h2>
                    <div class="title-divider"></div>
                    <p class="section-description">
                        SomaConnect is your one‑stop digital platform for reading, learning, and sharing knowledge.
                        Browse curated topics, track your progress, and collaborate with teachers and students in real time.
                        Discover books, resources, and discussions tailored to your learning journey.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Subject Categories -->
    <section class="subjects-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid1-home1.jpeg" alt="Geography" class="subject-img">
                        <div class="subject-overlay">
                            <h4 class="subject-name text-white">Geography</h4>
                            <span class="subject-count">{{ $counts['Geography'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid2-home2.jpg" alt="Computer Languages"
                            class="subject-img">
                        <div class="subject-overlay">
                            <h4 class="subject-name text-white">Computer Languages</h4>
                            <span class="subject-count">{{ $counts['Computer Studies'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid3-home3.jpg" alt="Science" class="subject-img">
                        <div class="subject-overlay">
                            <h4 class="subject-name text-white">Science</h4>
                            <span class="subject-count">{{ $counts['Science'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid4-home4.jpg" alt="Mathematics" class="subject-img">
                        <div class="subject-overlay light">
                            <h4 class="subject-name text-dark">Mathematics</h4>
                            <span class="subject-count text-dark">{{ $counts['Mathematics'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid6-home6.jpg" alt="Kiswahili" class="subject-img">
                        <div class="subject-overlay light">
                            <h4 class="subject-name text-dark">Kiswahili</h4>
                            <span class="subject-count text-dark">{{ $counts['Kiswahili'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="subject-card">
                        <img src="/assets3/images/store-product/grid5-home5.jpg" alt="History" class="subject-img">
                        <div class="subject-overlay">
                            <h4 class="subject-name text-white">History</h4>
                            <span class="subject-count">{{ $counts['History'] ?? 0 }} items</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Past Papers Section -->
    <section class="pastpapers-section py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Exam Preparation</span>
                <h2 class="section-title">Past <span>Papers</span></h2>
                <p class="section-description">Browse and download past papers to help you prepare effectively for your
                    exams.</p>
            </div>

            @if ($pastpapers->count() > 0)
                <div class="row g-4">
                    @foreach ($pastpapers as $paper)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="resource-body">
                                    <h5 class="resource-title">
                                        <a
                                            href="{{ route('notes.show', encrypt($paper->id)) }}">{{ Str::limit($paper->title, 40) }}</a>
                                    </h5>
                                    <div class="resource-meta">
                                        <span class="subject-badge">{{ $paper->subject->name }}</span>
                                    </div>
                                    <div class="resource-actions">
                                        <a href="{{ route('notes.show', encrypt($paper->id)) }}" class="btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('pastpapers') }}" class="btn btn-outline-modern btn-lg">View All Past Papers</a>
                </div>
            @else
                <div class="text-center">
                    <p class="text-muted">No past papers available at the moment.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Reference Books Section -->
    <section class="books-section py-5">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Recommended Reading</span>
                <h2 class="section-title">Reference <span>Books</span></h2>
                <p class="section-description">Explore recommended reference books to support your studies and research.
                </p>
            </div>

            @if ($referenceBooks->count() > 0)
                <div class="swiper booksSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($referenceBooks as $book)
                            <div class="swiper-slide">
                                <div class="book-card">
                                    <div class="book-image">
                                        <img src="{{ $book->image_path ? asset('storage/' . $book->image_path) : asset('assets3/images/product/default-book.jpg') }}"
                                            alt="{{ $book->title }}">
                                    </div>
                                    <div class="book-content">
                                        <h5 class="book-title">
                                            <a href="{{ route('notes.show', encrypt($book->id)) }}"
                                                title="{{ $book->title }}">{{ Str::limit($book->title, 20) }}</a>
                                        </h5>
                                        <div class="book-author">{{ Str::limit($book->author, 20) ?? 'Unknown Author' }}
                                        </div>
                                        <a href="{{ route('notes.show', encrypt($book->id)) }}" class="btn-book">
                                            <i class="fas fa-book-open"></i> Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="text-center">
                    <p class="text-muted">No reference books available at the moment.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Recently Added Resources -->
    <section class="recent-section py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Fresh Content</span>
                <h2 class="section-title">Recently <span>Added</span></h2>
                <p class="section-description">Check out the latest materials added to SomaConnect.</p>
            </div>

            @if ($recentResources->count() > 0)
                <div class="recent-slider">
                    @foreach ($recentResources as $resource)
                        <div class="recent-slide">
                            <div class="recent-card">
                                <div class="recent-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $resource->created_at->format('d M, Y') }}
                                </div>
                                <h4 class="recent-title">
                                    <a href="{{ route('notes.show', encrypt($resource->id)) }}">
                                        {{ Str::limit($resource->title, 50) }}
                                    </a>
                                </h4>
                                <p class="recent-description">
                                    {{ Str::limit($resource->description ?? 'No description available.', 80) }}
                                </p>
                                <a href="{{ route('notes.show', encrypt($resource->id)) }}" class="recent-link">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p class="text-muted">No new resources added yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-content">
                            <h3 class="newsletter-title">Stay Connected</h3>
                            <p class="newsletter-text">Subscribe to our newsletter for updates on new resources, features,
                                and learning tips.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control"
                                    placeholder="Your email address" required>
                                <button type="submit" class="btn btn-primary-modern">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SweetAlert notifications
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

        $(document).ready(function() {
            if ($('.hero-slider').length) {
                $('.hero-slider').slick({
                    dots: true,
                    arrows: false, // Arrows removed
                    infinite: true,
                    speed: 500,
                    fade: true,
                    cssEase: 'linear',
                    autoplay: true,
                    autoplaySpeed: 5000,
                    pauseOnHover: false,
                    pauseOnFocus: false
                });
            }

            // Books Swiper
            if (document.querySelector('.booksSwiper')) {
                const booksSwiper = new Swiper('.booksSwiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: 2
                        },
                        768: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 4
                        },
                        1200: {
                            slidesPerView: 5
                        },
                    }
                });
            }

            // Recent Resources Slider
            if ($('.recent-slider').length) {
                $('.recent-slider').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    dots: true,
                    arrows: false,
                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            }
        });
    </script>

    <style>
        /* Hero Section - Full Width 700px */
        .hero-section {
            position: relative;
            width: 100%;
            height: 700px;
            overflow: hidden;
        }

        .hero-slider,
        .hero-slider .slick-list,
        .hero-slider .slick-track {
            height: 100%;
        }

        .hero-slide {
            height: 700px;
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex !important;
            align-items: center;
        }

        /* Ensure slides take full width */
        .hero-slider .slick-slide {
            height: 700px;
        }

        .hero-slider .slick-slide > div {
            height: 100%;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            padding: 50px 0;
        }

        .hero-badge {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 30px;
            margin-bottom: 20px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-title span {
            color: #e6e92c;
        }

        .hero-description {
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 600px;
            opacity: 0.9;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-buttons .btn {
            padding: 12px 30px;
            font-size: 16px;
        }

        /* Slick Slider Customization - Only Dots */
        .slick-dots {
            bottom: 30px;
            z-index: 10;
        }

        .slick-dots li button:before {
            color: #fff;
            opacity: 0.5;
            font-size: 12px;
        }

        .slick-dots li.slick-active button:before {
            opacity: 1;
            color: #e6e92c;
        }

        /* Category Cards */
        .category-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 250px;
            cursor: pointer;
        }

        .category-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .category-card:hover .category-img {
            transform: scale(1.1);
        }

        .category-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 30px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-content.text-end {
            align-items: flex-end;
            background: linear-gradient(to left, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
        }

        .category-label {
            font-size: 14px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .category-title {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .category-link {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: gap 0.3s;
        }

        .category-link:hover {
            gap: 12px;
            color: #e6e92c;
        }

        /* Subject Cards */
        .subject-card {
            position: relative;
            display: block;
            border-radius: 15px;
            overflow: hidden;
            height: 300px;
            text-decoration: none;
        }

        .subject-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .subject-card:hover .subject-img {
            transform: scale(1.1);
        }

        .subject-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 30px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .subject-overlay.light {
            background: linear-gradient(to top, rgba(255, 255, 255, 0.9), transparent);
        }

        .subject-name {
            font-size: 24px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .subject-count {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Resource Cards */
        .resource-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .resource-icon {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            padding: 25px;
            text-align: center;
            font-size: 40px;
            color: #fff;
        }

        .resource-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .resource-title {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .resource-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .resource-title a:hover {
            color: #6cbad9;
        }

        .resource-meta {
            margin-bottom: 15px;
            flex: 1;
        }

        .subject-badge {
            display: inline-block;
            padding: 4px 12px;
            background: #eef2ff;
            color: #6cbad9;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
        }

        .btn-view {
            display: inline-block;
            padding: 8px 20px;
            background: #6cbad9;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            font-size: 14px;
            transition: all 0.3s;
            border: none;
        }

        .btn-view:hover {
            background: #6cbad9;
            color: #fff;
            transform: translateY(-2px);
        }

        /* Book Cards */
        .book-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .book-image {
            height: 250px;
            overflow: hidden;
        }

        .book-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .book-card:hover .book-image img {
            transform: scale(1.1);
        }

        .book-content {
            padding: 20px;
        }

        .book-title {
            font-size: 16px;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .book-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .book-title a:hover {
            color: #6cbad9;
        }

        .book-author {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .btn-book {
            display: inline-block;
            padding: 6px 15px;
            background: transparent;
            border: 1px solid #6cbad9;
            color: #6cbad9;
            text-decoration: none;
            border-radius: 30px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-book:hover {
            background: #6cbad9;
            color: #fff;
        }

        /* Recent Cards */
        .recent-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            margin: 0 10px;
        }

        .recent-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .recent-date {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .recent-date i {
            color: #6cbad9;
        }

        .recent-title {
            font-size: 20px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .recent-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .recent-title a:hover {
            color: #6cbad9;
        }

        .recent-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .recent-link {
            color: #6cbad9;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s;
        }

        .recent-link:hover {
            gap: 10px;
            color: #6cbad9;
        }

        /* Newsletter Section */
        .newsletter-wrapper {
            background: linear-gradient(135deg, #6cbad9 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 50px;
            color: #fff;
        }

        .newsletter-title {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .newsletter-text {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .newsletter-form .input-group {
            background: #fff;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .newsletter-form .form-control {
            border: none;
            padding: 15px 25px;
            height: auto;
            font-size: 16px;
        }

        .newsletter-form .form-control:focus {
            box-shadow: none;
        }

        .newsletter-form .btn {
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 500;
        }

        /* Swiper Pagination */
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #ddd;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background: #6cbad9;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-section,
            .hero-slide {
                height: 600px;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-buttons .btn {
                padding: 10px 25px;
            }
        }

        @media (max-width: 767px) {
            .hero-section,
            .hero-slide {
                height: 500px;
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-buttons .btn {
                width: 100%;
                text-align: center;
            }

            .category-card {
                height: 200px;
            }

            .category-title {
                font-size: 22px;
            }

            .subject-card {
                height: 250px;
            }

            .newsletter-wrapper {
                padding: 30px;
                text-align: center;
            }

            .newsletter-form {
                margin-top: 20px;
            }
        }

        @media (max-width: 480px) {
            .hero-section,
            .hero-slide {
                height: 400px;
            }

            .hero-title {
                font-size: 24px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-buttons .btn {
                padding: 8px 20px;
                font-size: 14px;
            }
        }
    </style>
@endsection
