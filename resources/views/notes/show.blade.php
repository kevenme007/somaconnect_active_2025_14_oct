@extends('layouts.main3_frontend')

@section('title', $resource->title)

@section('content')
    <section class="shop-details-section fix section-padding">
        <div class="container-fluid">
            <div class="row g-4">
                <!-- Sidebar: List of Classes -->
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="text-secondary mb-0">List of Classes</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav flex-column">
                                @for ($i = 1; $i <= 6; $i++)
                                    <li class="nav-item p-2">
                                        <a href="{{ route('materials' . $i) }}" class="text-decoration-none">
                                            Form {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Viewer -->
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <!-- Top Bar -->
                        <div class="d-flex justify-content-between align-items-center p-3 bg-light border-bottom">
                            <a href="{{ route('materials') }}" class="btn btn-sm btn-secondary">← Back</a>
                            <h5 class="mb-0">{{ $resource->title }}</h5>
                            <a href="{{ route('resources.download', $resource->id) }}" class="btn btn-sm btn-success">
                                Download ({{ $resource->downloads }})
                            </a>
                        </div>

                        <!-- Toolbar -->
                        <div class="d-flex justify-content-between align-items-center px-3 py-2 bg-dark text-white">
                            <div>
                                <button id="zoomOut" class="btn btn-sm btn-light me-1">−</button>
                                <button id="zoomIn" class="btn btn-sm btn-light">+</button>
                            </div>
                            <div>
                                <button id="fullscreenBtn" class="btn btn-sm btn-outline-light">
                                    Fullscreen
                                </button>
                            </div>
                        </div>

                        <!-- PDF Viewer -->
                        <div id="pdfContainer" class="bg-light" style="height: 85vh; overflow: hidden; position: relative;">
                            <iframe id="pdfViewer"
                                src="{{ asset('storage/' . $resource->file_path) }}#toolbar=0"
                                width="100%" height="100%" style="border: none; transform-origin: top center;">
                            </iframe>
                        </div>

                        <!-- Navigation -->
                        <div class="d-flex justify-content-between align-items-center p-3 border-top bg-light">
                            @if ($prevResource)
                                <a href="{{ route('notes.show', encrypt($prevResource->id)) }}" class="btn btn-outline-primary">
                                    ← Previous
                                </a>
                            @else
                                <div></div>
                            @endif

                            @if ($nextResource)
                                <a href="{{ route('notes.show', encrypt($nextResource->id)) }}" class="btn btn-outline-primary">
                                    Next →
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Reading Section -->
    <section class="top-ratting-book-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Related Reading Resources</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">Expand your knowledge with similar learning materials</p>
            </div>
            <div class="swiper book-slider">
                <div class="swiper-wrapper">
                    @foreach ($relatedResources as $resource)
                        <div class="swiper-slide">
                            <div class="single-product bg-white shadow-sm rounded p-3 text-center">
                                <h5 class="product-name mb-2">
                                    <a href="{{ route('notes.show', encrypt($resource->id)) }}" class="text-dark fw-bold">
                                        {{ $resource->title }}
                                    </a>
                                </h5>
                                <p class="text-muted small">{{ $resource->author ?? 'Unknown Author' }}</p>
                                <a href="{{ route('notes.show', encrypt($resource->id)) }}" class="btn btn-sm btn-success mt-2">
                                    View Resource
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- PDF Viewer Controls Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pdfViewer = document.getElementById('pdfViewer');
            const zoomInBtn = document.getElementById('zoomIn');
            const zoomOutBtn = document.getElementById('zoomOut');
            const fullscreenBtn = document.getElementById('fullscreenBtn');
            const pdfContainer = document.getElementById('pdfContainer');
            let zoomLevel = 1;

            zoomInBtn.addEventListener('click', () => {
                zoomLevel += 0.1;
                pdfViewer.style.transform = `scale(${zoomLevel})`;
            });

            zoomOutBtn.addEventListener('click', () => {
                if (zoomLevel > 0.5) zoomLevel -= 0.1;
                pdfViewer.style.transform = `scale(${zoomLevel})`;
            });

            fullscreenBtn.addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    pdfContainer.requestFullscreen().catch(err => console.log(err));
                } else {
                    document.exitFullscreen();
                }
            });
        });
    </script>
@endsection
