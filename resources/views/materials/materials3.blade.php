@extends('layouts.main3_frontend')

@section('title', 'Form 1 Materials - Soma Connect')

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
                            <div class="skeleton-loader" style="width: 150px; height: 40px; border-radius: 50px;"></div>
                        </div>
                    </div>

                    <!-- Quick Stats Skeleton -->
                    <div class="row g-4 mb-4">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="col-md-4">
                                <div class="skeleton-stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="skeleton-loader me-3" style="width: 50px; height: 50px; border-radius: 15px;"></div>
                                        <div>
                                            <div class="skeleton-loader mb-2" style="width: 100px; height: 20px;"></div>
                                            <div class="skeleton-loader" style="width: 80px; height: 25px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <!-- Subject Filters Skeleton -->
                    <div class="skeleton-filters mb-4">
                        <div class="d-flex flex-wrap gap-3">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="skeleton-loader" style="width: 100px; height: 40px; border-radius: 50px;"></div>
                            @endfor
                        </div>
                    </div>

                    <!-- Materials Grid Skeleton -->
                    <div class="row g-4">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="skeleton-material-card">
                                    <div class="skeleton-loader mb-3" style="height: 180px; width: 100%; border-radius: 20px;"></div>
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
                                    <i class="fas fa-graduation-cap fa-2x text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-black mb-0 fw-bold">Form 3 Learning Materials</h4>
                                    <p class="text-black-50 mb-0 small">Comprehensive resources for Form 1 students</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('materials') }}" class="portal-badge text-black text-decoration-none">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Back to All Materials
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <div>
                                        <span class="stat-label">Total Resources</span>
                                        <h3 class="stat-value">{{ $f3TextBooks->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div>
                                        <span class="stat-label">Subjects</span>
                                        <h3 class="stat-value">{{ $f3TextBooks->pluck('category.name')->unique()->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <span class="stat-label">Latest Update</span>
                                        <h3 class="stat-value">
                                            @php $latest = $f3TextBooks->max('updated_at'); @endphp
                                            {{ $latest ? $latest->format('d M, Y') : 'N/A' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subject Filters -->
                    <div class="filter-section mb-4">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <span class="filter-label">Filter by Subject:</span>
                            <div class="subject-filters">
                                <button class="subject-filter-btn active" data-filter="all">All Subjects</button>
                                @foreach($f3TextBooks->pluck('category.name')->unique()->filter() as $subject)
                                    <button class="subject-filter-btn" data-filter="{{ $subject }}">{{ $subject }}</button>
                                @endforeach
                            </div>
                            <div class="ms-auto">
                                <div class="search-box">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" placeholder="Search resources..." id="searchInput">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Materials Grid (resource-card style) -->
                    @if($f3TextBooks->count() > 0)
                        <div class="row g-4">
                            @foreach($f3TextBooks as $resource)
                                <div class="col-xl-3 col-lg-4 col-md-6 material-item"
                                     data-subject="{{ $resource->category->name ?? 'Uncategorized' }}"
                                     data-title="{{ $resource->title }}"
                                     data-author="{{ $resource->author }}">
                                    <div class="resource-card">
                                        <div class="resource-icon">
                                            @php
                                                $imagePath = $resource->image_path ?? null;
                                                $hasImage = $imagePath && Storage::disk('public')->exists($imagePath);
                                            @endphp
                                            @if($hasImage)
                                                <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $resource->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                <i class="fas fa-book-open"></i>
                                            @endif
                                        </div>
                                        <div class="resource-body">
                                            <h5 class="resource-title">
                                                <a href="{{ route('notes.show', encrypt($resource->id)) }}">{{ Str::limit($resource->title, 40) }}</a>
                                            </h5>
                                            <div class="resource-meta">
                                                <span class="subject-badge">{{ $resource->category->name ?? 'General' }}</span>
                                            </div>
                                            <div class="resource-author">
                                                <i class="fas fa-user me-1"></i> {{ $resource->author ?? 'Unknown' }}
                                            </div>
                                            <div class="resource-date small mt-1">
                                                <i class="far fa-calendar-alt me-1"></i> {{ $resource->created_at->format('d M, Y') }}
                                            </div>
                                            <div class="resource-actions mt-2">
                                                <a href="{{ route('notes.show', encrypt($resource->id)) }}" class="btn-view">
                                                    <i class="fas fa-eye me-1"></i> View Resource
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($f3TextBooks->count() > 8)
                            <div class="text-center mt-5">
                                <button class="btn-load-more" id="loadMoreBtn">
                                    <i class="fas fa-spinner me-2"></i>Load More Resources
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="empty-state">
                            <i class="fas fa-books fa-3x mb-3"></i>
                            <h5>No materials available for Form 1</h5>
                            <p class="text-muted">Check back later for new resources</p>
                            <a href="{{ route('materials') }}" class="btn-back-home mt-3">
                                <i class="fas fa-arrow-left me-2"></i>Browse All Materials
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* SomaConnect Gradient Background (same as before) */
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
            transition: all 0.3s ease;
        }

        .portal-badge:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(-5px);
        }

        /* Stat Cards */
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .stat-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a3a;
            margin: 0;
            line-height: 1.2;
        }

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .subject-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .subject-filter-btn {
            padding: 0.5rem 1.25rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-size: 0.9rem;
            color: #1a2a3a;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .subject-filter-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .subject-filter-btn.active {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border-color: transparent;
        }

        /* Search Box */
        .search-box {
            position: relative;
            width: 250px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #1a2a3a;
            opacity: 0.5;
        }

        .search-input {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 40px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-size: 0.9rem;
            color: #1a2a3a;
            outline: none;
        }

        /* Resource Card */
        .resource-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .resource-icon {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            padding: 1.5rem;
            text-align: center;
            font-size: 3rem;
            color: white;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .resource-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .resource-body {
            padding: 1.2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .resource-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .resource-title a {
            color: #1a2a3a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .resource-title a:hover {
            color: #6cbad9;
        }

        .subject-badge {
            display: inline-block;
            padding: 0.2rem 0.8rem;
            background: rgba(108, 186, 217, 0.2);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #1dafe9;
        }

        .resource-author, .resource-date {
            font-size: 0.8rem;
            color: #666;
            margin-top: 0.2rem;
        }

        .resource-author i, .resource-date i {
            color: #6cbad9;
            width: 16px;
        }

        .btn-view {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            margin-top: 0.5rem;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 186, 217, 0.4);
            color: white;
        }

        /* Load More, Empty State, Skeleton Loader (keep from original) */
        .btn-load-more {
            padding: 0.75rem 2rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: #1a2a3a;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-load-more:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 4rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            color: #1a2a3a;
        }

        .btn-back-home {
            display: inline-block;
            padding: 0.75rem 2rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-back-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        /* Skeleton styles */
        .skeleton-header, .skeleton-stat-card, .skeleton-filters, .skeleton-material-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-stat-card {
            padding: 1.5rem;
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
            .col-10 { width: 100%; padding: 0 15px; }
        }
        @media (max-width: 992px) {
            .filter-section .d-flex { flex-direction: column; align-items: flex-start !important; }
            .subject-filters { width: 100%; margin: 10px 0; }
            .search-box { width: 100%; }
            .ms-auto { margin-left: 0 !important; width: 100%; }
        }
        @media (max-width: 768px) {
            .portal-header { text-align: center; }
            .portal-header .d-flex { flex-direction: column; text-align: center; }
            .portal-logo { margin-right: 0 !important; margin-bottom: 1rem; }
            .stat-card .d-flex { flex-direction: column; text-align: center; }
            .stat-icon { margin-right: 0; margin-bottom: 1rem; }
            .resource-icon { height: 140px; }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Filter and Search (same logic as before)
            const filterButtons = document.querySelectorAll('.subject-filter-btn');
            const materialItems = document.querySelectorAll('.material-item');

            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    const filter = this.dataset.filter;
                    materialItems.forEach(item => {
                        item.style.display = (filter === 'all' || item.dataset.subject === filter) ? '' : 'none';
                    });
                });
            });

            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const term = this.value.toLowerCase().trim();
                    materialItems.forEach(item => {
                        const title = item.dataset.title?.toLowerCase() || '';
                        const author = item.dataset.author?.toLowerCase() || '';
                        const subject = item.dataset.subject?.toLowerCase() || '';
                        const match = title.includes(term) || author.includes(term) || subject.includes(term);
                        item.style.display = match ? '' : 'none';
                    });
                    const activeFilter = document.querySelector('.subject-filter-btn.active');
                    if (activeFilter && activeFilter.dataset.filter !== 'all') {
                        const filterValue = activeFilter.dataset.filter;
                        materialItems.forEach(item => {
                            if (item.dataset.subject !== filterValue) item.style.display = 'none';
                        });
                    }
                });
            }

            // Load More
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            if (loadMoreBtn) {
                let itemsToShow = 8;
                const allItems = Array.from(materialItems);
                allItems.forEach((item, idx) => { if (idx >= itemsToShow) item.style.display = 'none'; });
                loadMoreBtn.addEventListener('click', function() {
                    itemsToShow += 4;
                    allItems.forEach((item, idx) => {
                        if (idx < itemsToShow) {
                            const activeFilter = document.querySelector('.subject-filter-btn.active');
                            const filter = activeFilter ? activeFilter.dataset.filter : 'all';
                            if (filter === 'all' || item.dataset.subject === filter) item.style.display = '';
                        }
                    });
                    if (itemsToShow >= allItems.length) loadMoreBtn.style.display = 'none';
                });
            }
        });
    </script>
@endsection
