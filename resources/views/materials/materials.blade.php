@extends('layouts.main3_frontend')

@section('title', 'All Learning Materials - Soma Connect')

@section('content')
    <!-- Skeleton Loader -->
    <div id="skeleton">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Header Skeleton -->
                    <div class="skeleton-header mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="skeleton-loader me-3" style="width: 50px; height: 50px; border-radius: 15px;"></div>
                                <div>
                                    <div class="skeleton-loader mb-2" style="width: 250px; height: 30px;"></div>
                                    <div class="skeleton-loader" style="width: 350px; height: 20px;"></div>
                                </div>
                            </div>
                            <div class="skeleton-loader" style="width: 180px; height: 40px; border-radius: 50px;"></div>
                        </div>
                    </div>

                    <!-- Materials Grid Skeleton -->
                    <div class="row g-4">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="skeleton-material-card">
                                    <div class="skeleton-loader mb-3" style="height: 250px; width: 100%; border-radius: 20px;"></div>
                                    <div class="p-3">
                                        <div class="skeleton-loader mb-2" style="width: 80px; height: 18px;"></div>
                                        <div class="skeleton-loader mb-2" style="width: 160px; height: 22px;"></div>
                                        <div class="skeleton-loader" style="width: 120px; height: 18px;"></div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="soma-portal" id="main-content" style="display: none;">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Portal Header -->
                    <div class="portal-header mb-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="portal-logo me-3">
                                    <i class="fas fa-layer-group fa-2x text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-black mb-0 fw-bold">All Learning Materials</h4>
                                    <p class="text-black-50 mb-0 small">Browse our complete collection of educational resources</p>
                                </div>
                            </div>
                            <div>
                                <span class="portal-badge text-black">
                                    <i class="fas fa-database me-2"></i>
                                    {{ $textBooks->count() }} Total Resources
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Access Cards -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <a href="{{ route('pastpapers') }}" class="access-card">
                                <div class="access-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div>
                                    <h5 class="access-title">Past Papers</h5>
                                    <p class="access-desc">Exam preparation materials</p>
                                </div>
                                <i class="fas fa-arrow-right access-arrow"></i>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('referencebooks') }}" class="access-card">
                                <div class="access-icon" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <h5 class="access-title">Reference Books</h5>
                                    <p class="access-desc">Supplementary reading</p>
                                </div>
                                <i class="fas fa-arrow-right access-arrow"></i>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('resources.most_read') }}" class="access-card">
                                <div class="access-icon" style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);">
                                    <i class="fas fa-fire"></i>
                                </div>
                                <div>
                                    <h5 class="access-title">Most Read</h5>
                                    <p class="access-desc">Popular resources</p>
                                </div>
                                <i class="fas fa-arrow-right access-arrow"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="search-section mb-4">
                        <form action="{{ route('materials.search') }}" method="GET" class="search-form">
                            <div class="search-wrapper">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" name="query" class="search-input-large" placeholder="Search by title, author, or subject..." value="{{ request('query') }}">
                                <button type="submit" class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Materials Grid -->
                    @if($textBooks->count() > 0)
                        <div class="materials-grid">
                            <div class="row g-4">
                                @foreach($textBooks as $tb)
                                    <div class="col-lg-3 col-md-4 col-sm-6 material-item">
                                        <div class="material-card">
                                            <div class="material-image-wrapper">
                                                <a href="{{ route('notes.show', encrypt($tb->id)) }}" class="material-link">
                                                    <img class="material-image"
                                                         src="{{ asset('storage/' . $tb->image_path) }}"
                                                         alt="{{ $tb->title }}">
                                                    <div class="material-overlay">
                                                        <span class="view-resource-btn">
                                                            <i class="fas fa-eye me-2"></i>View
                                                        </span>
                                                    </div>
                                                </a>
                                                @if($tb->subject)
                                                    <span class="subject-badge">{{ $tb->subject->name }}</span>
                                                @endif
                                                <span class="type-badge {{ strtolower($tb->resource_type) }}">
                                                    {{ $tb->resource_type }}
                                                </span>
                                            </div>
                                            <div class="material-content">
                                                <h5 class="material-category">{{ $tb->subject->name ?? 'General' }}</h5>
                                                <h3 class="material-title">
                                                    <a href="{{ route('notes.show', encrypt($tb->id)) }}">{{ Str::limit($tb->title, 40) }}</a>
                                                </h3>
                                                <div class="material-meta">
                                                    <span class="material-author">
                                                        <i class="fas fa-user me-1"></i>{{ $tb->author ?? 'Unknown' }}
                                                    </span>
                                                    <span class="material-grade">
                                                        <i class="fas fa-graduation-cap me-1"></i>Form {{ $tb->grade_level ?? 'N/A' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-books fa-3x mb-3"></i>
                            <h5>No materials available</h5>
                            <p class="text-muted">Check back later for new resources</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* SomaConnect Gradient Background */
        .soma-portal {
            min-height: 100vh;
            background: radial-gradient(circle at center, rgba(253, 224, 71, 0.4) 0%, rgba(3, 110, 178, 0.4) 100%) !important;
            position: relative;
        }

        /* Portal Header */
        .portal-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .portal-logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .portal-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1.25rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            border-radius: 50px;
            color: white;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Access Cards */
        .access-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
        }

        .access-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .access-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .access-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .access-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a2a3a;
            margin: 0;
        }

        .access-desc {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
        }

        .access-arrow {
            position: absolute;
            right: 1.5rem;
            color: #6cbad9;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .access-card:hover .access-arrow {
            opacity: 1;
            transform: translateX(5px);
        }

        /* Search Section */
        .search-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 0.3rem;
        }

        .search-icon {
            padding: 0 1rem;
            color: #1a2a3a;
            opacity: 0.5;
        }

        .search-input-large {
            flex: 1;
            padding: 0.8rem 0;
            background: transparent;
            border: none;
            font-size: 1rem;
            color: #1a2a3a;
            outline: none;
        }

        .search-input-large::placeholder {
            color: #1a2a3a;
            opacity: 0.5;
        }

        .search-btn {
            padding: 0.8rem 2rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        /* Material Cards */
        .material-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .material-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .material-image-wrapper {
            position: relative;
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            overflow: hidden;
        }

        .material-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
            transition: transform 0.5s ease;
        }

        .material-card:hover .material-image {
            transform: scale(1.05);
        }

        .material-overlay {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
            bottom: 0.5rem;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .material-card:hover .material-overlay {
            opacity: 1;
        }

        .view-resource-btn {
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .material-card:hover .view-resource-btn {
            transform: translateY(0);
        }

        .subject-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            padding: 0.3rem 1rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .type-badge {
            position: absolute;
            top: 2rem;
            right: 2rem;
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            color: white;
        }

        .type-badge.pastpaper {
            background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
        }

        .type-badge.referencebook {
            background: linear-gradient(135deg, #48bb78 0%, #2f855a 100%);
        }

        .material-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .material-category {
            font-size: 0.85rem;
            color: #6cbad9;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .material-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .material-title a {
            color: #1a2a3a;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .material-title a:hover {
            color: #6cbad9;
        }

        .material-meta {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #666;
            margin-top: auto;
        }

        .material-author, .material-grade {
            display: flex;
            align-items: center;
        }

        .material-author i, .material-grade i {
            width: 16px;
            color: #6cbad9;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            color: #1a2a3a;
        }

        /* Skeleton Loader */
        .skeleton-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-material-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-loader {
            background: linear-gradient(90deg, rgba(255,255,255,0.1) 25%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0.1) 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .col-10 {
                width: 100%;
                padding: 0 15px;
            }
        }

        @media (max-width: 768px) {
            .portal-header {
                text-align: center;
            }

            .portal-header .d-flex {
                flex-direction: column;
                text-align: center;
            }

            .portal-logo {
                margin-right: 0 !important;
                margin-bottom: 1rem;
            }

            .search-wrapper {
                flex-direction: column;
                gap: 10px;
            }

            .search-btn {
                width: 100%;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide skeleton and show main content after load
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);
        });
    </script>
@endsection
