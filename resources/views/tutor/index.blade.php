@extends('layouts.main2_frontend')

@section('title')
@endsection

@section('content')
    <!-- TextBooks Section start  -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    {{-- <h2 class="wow fadeInUp" data-wow-delay=".3s">Form 6 Materials</h2> --}}
                </div>
                {{-- <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a> --}}
            </div>

            <x-app>
                {{-- <div class="container">
                    <h2>Ask Maktaba Connect</h2>

                    <form action="{{ route('tutor.ask') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <textarea name="question" rows="3" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Type your question here..." required>{{ old('question') }}</textarea>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ask</button>
                        <div id="dot-loader" class="mt-3" style="display: none; font-weight: bold;">
                            Generating response<span id="dots"></span>
                        </div>
                    </form>

                    <h3>Your Questions and Answers</h3>
                    @forelse ($questions as $q)
                        <div class="card mb-3">
                            <div class="card-header">
                                Asked on {{ $q->created_at->format('d M Y, H:i') }}
                            </div>
                            <div class="card-body">
                                <p><strong>Question:</strong> {{ $q->question }}</p>
                                <p><strong>Maktaba Connect:</strong> {!! nl2br(e($q->answer ?? 'Waiting for answer...')) !!}</p>
                            </div>
                        </div>
                    @empty
                        <p>No questions asked yet.</p>
                    @endforelse
                </div> --}}

                <div class="container d-flex flex-column" style="height: 100vh;">
                    <h2 class="mt-3">Ask Maktaba Connect</h2>

                    {{-- Scrollable Q&A History --}}
                    <div class="flex-grow-1 overflow-auto mt-3 mb-2" style="min-height: 0;">
                        <h5>Your Questions and Answers</h5>
                        @forelse ($questions as $q)
                            <div class="card mb-3">
                                <div class="card-header">
                                    Asked on {{ $q->created_at->format('d M Y, H:i') }}
                                </div>
                                <div class="card-body">
                                    <p><strong>Question:</strong> {{ $q->question }}</p>
                                    <p><strong>Maktaba Connect:</strong> {!! nl2br(e($q->answer ?? 'Waiting for answer...')) !!}</p>
                                </div>
                            </div>
                        @empty
                            <p>No questions asked yet.</p>
                        @endforelse
                    </div>

                    {{-- Fixed Input Area --}}
                    <form action="{{ route('tutor.ask') }}" method="POST" class="border-top pt-3 bg-white">
                        @csrf
                        <div class="mb-2">
                            <textarea name="question" rows="4" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Ask Maktaba Connect..." required>{{ old('question') }}</textarea>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="theme-btn ms-auto">Ask Maktaba Connect</button>
                            <div id="dot-loader" style="display: none; font-weight: bold;">
                                Generating response<span id="dots"></span>
                            </div>
                        </div>
                    </form>
                </div>


                <script>
                    let dotInterval;

                    function showDotLoader() {
                        document.getElementById('dot-loader').style.display = 'inline';
                        document.querySelector('button[type="submit"]').disabled = true;

                        let dots = document.getElementById('dots');
                        let count = 0;

                        dotInterval = setInterval(() => {
                            count = (count + 1) % 4;
                            dots.textContent = '.'.repeat(count);
                        }, 500);
                    }
                </script>
            </x-app>

        </div>
    </section>
@endsection
