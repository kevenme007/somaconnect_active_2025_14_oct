@extends('layouts.main3_frontend')

@section('title', $resource->title . ' - Soma Connect')

@section('content')
    <!-- Skeleton Loader - Now includes full layout -->
    <div id="skeleton">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Header Skeleton -->
                    <div class="skeleton-header mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="skeleton-loader me-3" style="width: 50px; height: 50px; border-radius: 15px;">
                                </div>
                                <div>
                                    <div class="skeleton-loader mb-2" style="width: 200px; height: 25px;"></div>
                                    <div class="skeleton-loader" style="width: 250px; height: 20px;"></div>
                                </div>
                            </div>
                            <div class="skeleton-loader" style="width: 180px; height: 40px; border-radius: 50px;"></div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Left Sidebar Skeleton -->
                        <div class="col-lg-3">
                            <div class="skeleton-card">
                                <div class="skeleton-card-header">
                                    <div class="skeleton-loader" style="width: 150px; height: 20px;"></div>
                                </div>
                                <div class="skeleton-card-body p-0">
                                    @for ($i = 1; $i <= 6; $i++)
                                        <div class="skeleton-class-item">
                                            <div class="d-flex align-items-center">
                                                <div class="skeleton-loader me-3"
                                                    style="width: 35px; height: 35px; border-radius: 10px;"></div>
                                                <div>
                                                    <div class="skeleton-loader mb-1" style="width: 100px; height: 16px;">
                                                    </div>
                                                    <div class="skeleton-loader" style="width: 120px; height: 14px;"></div>
                                                </div>
                                            </div>
                                            <div class="skeleton-loader" style="width: 20px; height: 20px;"></div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Related Resources Skeleton -->
                            <div class="skeleton-card mt-4">
                                <div class="skeleton-card-header">
                                    <div class="skeleton-loader" style="width: 150px; height: 20px;"></div>
                                </div>
                                <div class="skeleton-card-body p-0">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="skeleton-related-item">
                                            <div class="d-flex align-items-center">
                                                <div class="skeleton-loader me-3"
                                                    style="width: 30px; height: 30px; border-radius: 8px;"></div>
                                                <div class="flex-grow-1">
                                                    <div class="skeleton-loader mb-1" style="width: 140px; height: 16px;">
                                                    </div>
                                                    <div class="skeleton-loader" style="width: 100px; height: 14px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Main Viewer Skeleton -->
                        <div class="col-lg-9">
                            <div class="skeleton-card p-0">
                                <!-- Title Bar Skeleton -->
                                <div class="skeleton-title-bar">
                                    <div class="d-flex align-items-center">
                                        <div class="skeleton-loader me-3" style="width: 30px; height: 30px;"></div>
                                        <div>
                                            <div class="skeleton-loader mb-1" style="width: 300px; height: 22px;"></div>
                                            <div class="skeleton-loader" style="width: 250px; height: 18px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PDF Viewer Skeleton -->
                                <div class="skeleton-pdf-container">
                                    <div class="skeleton-loader" style="height: 70vh; width: 100%;"></div>
                                </div>

                                <!-- Navigation Skeleton -->
                                <div class="skeleton-nav-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="skeleton-loader"
                                            style="width: 100px; height: 40px; border-radius: 50px;"></div>
                                        <div class="skeleton-loader"
                                            style="width: 120px; height: 30px; border-radius: 50px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <h4 class="text-black mb-0 fw-bold">SomaConnect</h4>
                                    <p class="text-black-50 mb-0 small">Digital Learning Platform • Resource Viewer</p>
                                </div>
                            </div>
                            <div>
                                <span class="portal-badge text-black">
                                    <i class="fas fa-book-open me-2"></i>
                                    {{ $resource->subject->name ?? 'Learning Resource' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Left Sidebar -->
                        <div class="col-lg-3">
                            <div class="portal-card">
                                <div class="portal-card-header">
                                    <i class="fas fa-layer-group me-2"></i>
                                    Browse Classes
                                </div>
                                <div class="portal-card-body p-0">
                                    <div class="class-list">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <a href="{{ route('materials' . $i) }}"
                                                class="class-item {{ request()->routeIs('materials' . $i) ? 'active' : '' }}">
                                                <div class="d-flex align-items-center">
                                                    <div class="class-icon me-3">
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </div>
                                                    <div>
                                                        <div class="class-name">Form {{ $i }}</div>
                                                        <div class="class-meta">Secondary Education</div>
                                                    </div>
                                                </div>
                                                <i class="fas fa-chevron-right class-arrow"></i>
                                            </a>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- Related Resources -->
                            @if (isset($relatedResources) && $relatedResources->count() > 0)
                                <div class="portal-card mt-4">
                                    <div class="portal-card-header">
                                        <i class="fas fa-link me-2"></i>
                                        Related Resources
                                    </div>
                                    <div class="portal-card-body p-0">
                                        @foreach ($relatedResources->take(4) as $related)
                                            <a href="{{ route('notes.show', encrypt($related->id)) }}"
                                                class="related-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="related-icon me-3">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="related-title">{{ Str::limit($related->title, 30) }}
                                                        </div>
                                                        <div class="related-date">
                                                            <i class="far fa-calendar-alt me-1"></i>
                                                            {{ $related->created_at->format('d M, Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Main Viewer -->
                        <div class="col-lg-9">
                            <div class="portal-card p-0">
                                <!-- Resource Title Bar -->
                                <div class="resource-title-bar">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-primary me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h5 class="text-black mb-0 fw-semibold">{{ $resource->title }}</h5>
                                            <p class="text-black-50 mb-0 small">
                                                {{ $resource->description ?? 'Learning Resource' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- PDF Viewer -->
                                <div id="pdfContainer" class="pdf-viewer-container">
                                    <button id="fullscreenBtn" class="fullscreen-float-btn" title="Fullscreen">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    @php
                                        $extension = strtolower(pathinfo($resource->file_path, PATHINFO_EXTENSION));
                                    @endphp

                                    @if ($extension === 'pdf')
                                        <iframe id="pdfViewer"
                                            src="{{ asset('storage/' . $resource->file_path) }}#toolbar=1&navpanes=0&scrollbar=0&view=FitH"
                                            width="100%" style="border:none; height: 100%;">
                                        </iframe>
                                    @else
                                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                            <div class="file-icon-wrapper mb-4">
                                                <i class="fas fa-file-alt fa-4x text-primary"></i>
                                            </div>
                                            <h5 class="text-muted mb-3">Preview not available for this file type</h5>
                                            <a href="{{ asset('storage/' . $resource->file_path) }}"
                                                class="btn btn-download" download>
                                                <i class="fas fa-download me-2"></i>Download File
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <!-- Simple Navigation -->
                                <div class="portal-nav-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        @if ($prevResource)
                                            <a href="{{ route('notes.show', encrypt($prevResource->id)) }}"
                                                class="nav-link-item">
                                                <i class="fas fa-chevron-left me-2"></i>
                                                Previous
                                            </a>
                                        @else
                                            <div></div>
                                        @endif

                                        @if ($nextResource)
                                            <a href="{{ route('notes.show', encrypt($nextResource->id)) }}"
                                                class="nav-link-item">
                                                Next
                                                <i class="fas fa-chevron-right ms-2"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        /* Portal Cards */
        .portal-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .portal-card-header {
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            font-weight: 600;
            color: #1a2a3a;
            font-size: 1rem;
            letter-spacing: 0.3px;
        }

        .portal-card-body {
            padding: 1rem;
        }

        /* Class List */
        .class-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .class-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: #1a2a3a;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .class-item:last-child {
            border-bottom: none;
        }

        .class-item:hover {
            background: rgba(67, 97, 238, 0.05);
            transform: translateX(5px);
        }

        .class-item.active {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
        }

        .class-item.active .class-meta {
            color: rgba(255, 255, 255, 0.8);
        }

        .class-icon {
            width: 35px;
            height: 35px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6cbad9;
        }

        .class-item.active .class-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .class-name {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .class-meta {
            font-size: 0.75rem;
            color: #666;
        }

        .class-arrow {
            font-size: 0.8rem;
            opacity: 0.5;
        }

        /* Related Items */
        .related-item {
            display: block;
            padding: 0.875rem 1.5rem;
            text-decoration: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .related-item:last-child {
            border-bottom: none;
        }

        .related-item:hover {
            background: rgba(67, 97, 238, 0.05);
        }

        .related-icon {
            width: 30px;
            height: 30px;
            background: rgba(220, 53, 69, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc3545;
        }

        .related-title {
            font-weight: 500;
            font-size: 0.9rem;
            color: #1a2a3a;
            margin-bottom: 2px;
        }

        .related-date {
            font-size: 0.7rem;
            color: #666;
        }

        /* Resource Title Bar */
        .resource-title-bar {
            background: rgba(255, 255, 255, 0.9);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* PDF Viewer */
        .pdf-viewer-container {
            height: 70vh;
            background: #f8f9fa;
            position: relative;
            overflow: auto;
        }

        /* Navigation Footer */
        .portal-nav-footer {
            padding: 1rem 1.5rem;
            background: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-link-item {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1.25rem;
            background: #f8f9fa;
            color: #6cbad9;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .nav-link-item:hover {
            background: #6cbad9;
            color: white;
            transform: translateY(-2px);
        }

        /* Download Button */
        .btn-download {
            padding: 0.75rem 2rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .file-icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Skeleton Loader Styles */
        .skeleton-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-card-header {
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .skeleton-class-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .skeleton-related-item {
            padding: 0.875rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .skeleton-title-bar {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .skeleton-pdf-container {
            height: 70vh;
            background: rgba(0, 0, 0, 0.05);
        }

        .skeleton-nav-footer {
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .skeleton-loader {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 25%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.1) 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .col-10 {
                width: 100%;
                padding: 0 15px;
            }
        }

        @media (max-width: 992px) {
            .portal-header {
                flex-direction: column;
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

            .pdf-viewer-container {
                height: 60vh;
            }
        }

        @media (max-width: 768px) {
            .portal-nav-footer .d-flex {
                flex-direction: column;
                gap: 1rem;
            }

            .pdf-viewer-container {
                height: 50vh;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Text Colors */
        .text-black-50 {
            color: rgba(0, 0, 0, 0.6) !important;
        }

        /* Floating Fullscreen Button */
        .fullscreen-float-btn {
            position: absolute;
            top: 55px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            z-index: 100;
            opacity: 0.7;
        }

        .fullscreen-float-btn:hover {
            transform: scale(1.1);
            opacity: 1;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .fullscreen-float-btn i {
            transition: transform 0.3s ease;
        }

        .fullscreen-float-btn:hover i {
            transform: scale(1.1);
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide skeleton and show main content after load
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Track resource view
            let startTime = Date.now();
            let resourceId = "{{ $resource->id }}";

            window.addEventListener("beforeunload", function() {
                let timeSpent = Math.floor((Date.now() - startTime) / 1000);

                navigator.sendBeacon(
                    "/track-resource-view",
                    JSON.stringify({
                        resource_id: resourceId,
                        time_seconds: timeSpent
                    })
                );
            });

            // Handle URL hash for direct navigation
            const hash = window.location.hash;
            if (hash) {
                const triggerEl = document.querySelector(`.class-item[href="${hash}"]`);
                if (triggerEl) {
                    document.querySelectorAll('.class-item').forEach(el => {
                        el.classList.remove('active');
                    });
                    triggerEl.classList.add('active');
                }
            }
        });

        // Fullscreen functionality
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        const pdfContainer = document.getElementById('pdfContainer');

        if (fullscreenBtn && pdfContainer) {
            fullscreenBtn.addEventListener('click', function() {
                if (!document.fullscreenElement) {
                    // Enter fullscreen
                    if (pdfContainer.requestFullscreen) {
                        pdfContainer.requestFullscreen();
                    } else if (pdfContainer.webkitRequestFullscreen) {
                        /* Safari */
                        pdfContainer.webkitRequestFullscreen();
                    } else if (pdfContainer.msRequestFullscreen) {
                        /* IE/Edge */
                        pdfContainer.msRequestFullscreen();
                    }

                    // Change icon when in fullscreen
                    this.innerHTML = '<i class="fas fa-compress"></i>';
                } else {
                    // Exit fullscreen
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.webkitExitFullscreen) {
                        /* Safari */
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        /* IE/Edge */
                        document.msExitFullscreen();
                    }

                    // Change icon back
                    this.innerHTML = '<i class="fas fa-expand"></i>';
                }
            });

            // Listen for fullscreen change events to update button icon
            document.addEventListener('fullscreenchange', updateFullscreenIcon);
            document.addEventListener('webkitfullscreenchange', updateFullscreenIcon);
            document.addEventListener('mozfullscreenchange', updateFullscreenIcon);
            document.addEventListener('MSFullscreenChange', updateFullscreenIcon);

            function updateFullscreenIcon() {
                if (fullscreenBtn) {
                    if (document.fullscreenElement) {
                        fullscreenBtn.innerHTML = '<i class="fas fa-compress"></i>';
                        fullscreenBtn.classList.add('active');
                    } else {
                        fullscreenBtn.innerHTML = '<i class="fas fa-expand"></i>';
                        fullscreenBtn.classList.remove('active');
                    }
                }
            }
        }
    </script>
@endsection

@section('scripts')
    <script>
        // Hide footer on this page
        document.addEventListener('DOMContentLoaded', function() {
            // Hide footer elements
            const footer = document.querySelector('footer');
            const copyright = document.querySelector('.copyright-area');
            const footerArea = document.querySelector('.footer-area');

            if (footer) footer.style.display = 'none';
            if (copyright) copyright.style.display = 'none';
            if (footerArea) footerArea.style.display = 'none';
        });
    </script>
@endsection
