@extends('layouts.main3_frontend')

@section('title', 'Past Papers - Soma Connect')

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
                                    <div class="skeleton-loader mb-2" style="width: 200px; height: 30px;"></div>
                                    <div class="skeleton-loader" style="width: 300px; height: 20px;"></div>
                                </div>
                            </div>
                            <div class="skeleton-loader" style="width: 150px; height: 40px; border-radius: 50px;"></div>
                        </div>
                    </div>

                    <!-- Papers Grid Skeleton -->
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
                                    <i class="fas fa-file-pdf fa-2x text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-black mb-0 fw-bold">Past Papers</h4>
                                    <p class="text-black-50 mb-0 small">Exam preparation materials from previous years</p>
                                </div>
                            </div>
                            <div>
                                <span class="portal-badge text-black">
                                    <i class="fas fa-database me-2"></i>
                                    {{ $pastpapers->count() }} Papers Available
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="search-section mb-4">
                        <div class="search-wrapper">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input-large" placeholder="Search past papers by title or subject..." id="searchInput">
                        </div>
                    </div>

                    <!-- Subject Filters -->
                    <div class="filter-section mb-4">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <span class="filter-label">Filter by Subject:</span>
                            <div class="filter-buttons">
                                <button class="filter-btn active" data-filter="all">All</button>
                                @foreach($pastpapers->pluck('subject.name')->unique()->filter() as $subject)
                                    <button class="filter-btn" data-filter="{{ $subject }}">{{ $subject }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Papers Grid -->
                    @if($pastpapers->count() > 0)
                        <div class="row g-4">
                            @foreach($pastpapers as $paper)
                                <div class="col-lg-3 col-md-4 col-sm-6 paper-item"
                                     data-subject="{{ $paper->subject->name ?? 'Uncategorized' }}"
                                     data-title="{{ $paper->title }}">
                                    <div class="material-card">
                                        <div class="material-image-wrapper">
                                            <a href="{{ route('notes.show', encrypt($paper->id)) }}" class="material-link">
                                                <div class="paper-icon-placeholder">
                                                    <i class="fas fa-file-pdf"></i>
                                                    <span class="paper-year">{{ $paper->created_at->format('Y') }}</span>
                                                </div>
                                                <div class="material-overlay">
                                                    <span class="view-resource-btn">
                                                        <i class="fas fa-eye me-2"></i>View
                                                    </span>
                                                </div>
                                            </a>
                                            @if($paper->subject)
                                                <span class="subject-badge">{{ $paper->subject->name }}</span>
                                            @endif
                                            <span class="type-badge pastpaper">
                                                Past Paper
                                            </span>
                                        </div>
                                        <div class="material-content">
                                            <h5 class="material-category">{{ $paper->subject->name ?? 'General' }}</h5>
                                            <h3 class="material-title">
                                                <a href="{{ route('notes.show', encrypt($paper->id)) }}">{{ Str::limit($paper->title, 40) }}</a>
                                            </h3>
                                            <div class="material-meta">
                                                <span class="material-author">
                                                    <i class="fas fa-calendar-alt me-1"></i>{{ $paper->created_at->format('Y') }}
                                                </span>
                                                <span class="material-grade">
                                                    <i class="fas fa-download me-1"></i>{{ $paper->downloads ?? 0 }} downloads
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-file-pdf fa-3x mb-3"></i>
                            <h5>No past papers available</h5>
                            <p class="text-muted">Check back later for new exam materials</p>
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

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .filter-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #1a2a3a;
            opacity: 0.7;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1.25rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-size: 0.9rem;
            color: #1a2a3a;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border-color: transparent;
        }

        /* Material Cards - Exactly matching materials page */
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

        .paper-icon-placeholder {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            transition: transform 0.5s ease;
        }

        .paper-icon-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .paper-year {
            font-size: 1.2rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.3rem 1rem;
            border-radius: 50px;
        }

        .material-card:hover .paper-icon-placeholder {
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

        @media (max-width: 992px) {
            .filter-section .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .filter-buttons {
                width: 100%;
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

            .paper-icon-placeholder {
                height: 200px;
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

            // Filter functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            const paperItems = document.querySelectorAll('.paper-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.dataset.filter;

                    paperItems.forEach(item => {
                        if (filterValue === 'all' || item.dataset.subject === filterValue) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                    paperItems.forEach(item => {
                        const title = item.dataset.title?.toLowerCase() || '';
                        const subject = item.dataset.subject?.toLowerCase() || '';

                        if (title.includes(searchTerm) || subject.includes(searchTerm)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Also respect active filter
                    const activeFilter = document.querySelector('.filter-btn.active');
                    if (activeFilter && activeFilter.dataset.filter !== 'all') {
                        const filterValue = activeFilter.dataset.filter;
                        paperItems.forEach(item => {
                            if (item.dataset.subject !== filterValue) {
                                item.style.display = 'none';
                            }
                        });
                    }
                });
            }
        });
    </script>
@endsection
