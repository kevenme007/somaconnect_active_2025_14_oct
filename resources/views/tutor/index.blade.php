@extends('layouts.main3_frontend')

@section('title', 'Maktaba Connect - AI Learning Assistant')

@section('content')
    <!-- Maktaba Connect Section -->
    <section class="maktaba-connect-section py-4">
        <div class="container">
            <!-- Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="ai-logo me-3"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-book fa-2x text-white"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-1" style="color: #1e293b;">Maktaba Connect</h2>
                            <p class="text-muted mb-0">Your personal learning assistant </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Chat Container -->
            <div class="chat-container card border-0 shadow-lg"
                style="border-radius: 30px; overflow: hidden; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <!-- Chat Header with Status -->
                <div class="chat-header p-4"
                    style="background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%); color: white;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            {{-- <i class="fa-solid fa-book fa-2x me-3"></i> --}}
                            <div>
                                <h4 class="mb-1">Ask Maktaba Connect</h4>
                                <p class="mb-0 small">
                                    <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                    Online
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-body p-4" id="chatBody" style="height: 400px; overflow-y: auto; background: #f8fafc;">
                    @forelse ($questions as $q)
                        {{-- <div class="message-item user-message mb-3" style="animation: fadeIn 0.3s ease;">
                            <div class="d-flex justify-content-end">
                                <div class="message-bubble user-bubble"
                                    style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); color: white; padding: 12px 18px; border-radius: 18px 18px 5px 18px; max-width: 80%; word-wrap: break-word; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <div class="small fw-bold mb-1" style="opacity: 0.8;">
                                        <i class="fas fa-user me-1"></i> You
                                    </div>
                                    {{ $q->question }}
                                </div>
                            </div>
                        </div> --}}

                        <div class="message-item user-message mb-3">
                            <div class="d-flex justify-content-end w-100">
                                <div class="message-bubble user-bubble" style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); color: white; padding: 10px 18px; border-radius: 18px 18px 5px 18px; max-width: 90%; min-width: 150px; word-wrap: break-word; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <div class="small fw-bold mb-1 opacity-75">
                                        <i class="fas fa-user me-1"></i> You
                                    </div>
                                    {{ $q->question }}
                                </div>
                            </div>
                        </div>

                        <div class="message-item ai-message mb-4" style="animation: fadeIn 0.3s ease 0.1s both;">
                            <div class="d-flex align-items-start">
                                <div class="ai-avatar me-3"
                                    style="width: 45px; height: 45px; background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="message-bubble ai-bubble"
                                    style="background: white; padding: 12px 18px; border-radius: 18px 18px 18px 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); max-width: calc(100% - 60px); word-wrap: break-word; color: #1e293b;">
                                    <div class="small fw-bold mb-2" style="color: #1dafe9;">
                                        <i class="fa-solid fa-book me-1"></i> Maktaba Connect
                                        @if (isset($q->model_used))
                                            <span class="badge bg-light text-dark ms-2"
                                                style="font-size: 0.6rem;">{{ $q->model_used }}</span>
                                        @endif
                                    </div>
                                    {!! nl2br(e($q->answer ?? 'Thinking...')) !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <div class="welcome-icon mb-4">
                                <i class="fas fa-robot fa-5x" style="color: #1dafe9; opacity: 0.3;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #1e293b;">Welcome to Maktaba Connect! 👋</h4>
                            <p class="text-muted mb-4" style="max-width: 400px; margin: 0 auto;">I'm your AI learning
                                assistant. Ask me anything about your studies, and I'll help you learn better using multiple
                                AI models!</p>
                            <div class="suggested-topics">
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">📚 Study tips</span>
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">🔬 Science help</span>
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">📐 Mathematics</span>
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">📝 Past papers</span>
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">🌍 Geography</span>
                                <span class="badge bg-light text-dark p-3 me-2 mb-2 rounded-pill">📜 History</span>
                            </div>
                        </div>
                    @endforelse

                    <div id="loadingIndicator" class="text-center py-3" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted small">Generating response...</p>
                    </div>
                </div>

                {{-- <div class="chat-footer p-4 border-top" style="background: white;">
                    <form action="{{ route('tutor.ask') }}" method="POST" id="askForm">
                        @csrf
                        <div class="mb-3">
                            <textarea name="question" rows="2" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Type your question here... (e.g., 'How to solve quadratic equations?')"
                                style="border-radius: 30px; padding: 15px 20px; border: 2px solid #e2e8f0; resize: none;" required>{{ old('question') }}</textarea>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div id="dot-loader" class="me-3" style="display: none; font-weight: bold;">
                                    <span class="text-primary">Generating</span>
                                    <span id="dots" class="text-primary"></span>
                                </div>
                                <button type="submit" class="btn btn-primary px-5 py-2 "
                                    style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border: none; border-radius: 50px; font-weight: 600;">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Ask
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}

                {{-- <div class="chat-footer p-4 border-top" style="background: white;">
                    <form action="{{ route('tutor.ask') }}" method="POST" id="askForm">
                        @csrf
                        <div class="mb-3">
                            <textarea name="question" rows="2" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Type your question here... (e.g., 'How to solve quadratic equations?')"
                                style="border-radius: 30px; padding: 15px 20px; border: 2px solid #e2e8f0; resize: none;" required>{{ old('question') }}</textarea>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div id="dot-loader" class="me-3" style="display: none; font-weight: bold;">
                                <span class="text-primary">Generating</span>
                                <span id="dots" class="text-primary"></span>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-2 ms-auto"
                                style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border: none; border-radius: 50px; font-weight: 600;">
                                <i class="fas fa-paper-plane me-2"></i> Ask
                            </button>
                        </div>
                    </form>
                </div> --}}

                <div class="chat-footer p-4 border-top" style="background: white;">
                    <form id="askForm">   {{-- no action/method – we'll handle with AJAX --}}
                        @csrf
                        <div class="mb-3">
                            <textarea name="question" rows="2" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Type your question here... (e.g., 'How to solve quadratic equations?')"
                                style="border-radius: 30px; padding: 15px 20px; border: 2px solid #e2e8f0; resize: none;" required>{{ old('question') }}</textarea>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div id="dot-loader" class="me-3" style="display: none; font-weight: bold;">
                                <span class="text-primary">Generating</span>
                                <span id="dots" class="text-primary"></span>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-2 ms-auto"
                                style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border: none; border-radius: 50px; font-weight: 600;">
                                <i class="fas fa-paper-plane me-2"></i> Ask
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <script>
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

        document.querySelector('textarea[name="question"]').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        document.addEventListener('DOMContentLoaded', function() {
            const chatBody = document.getElementById('chatBody');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('askForm');
            const textarea = form.querySelector('textarea[name="question"]');
            const submitBtn = form.querySelector('button[type="submit"]');
            const chatBody = document.getElementById('chatBody');
            const dotLoader = document.getElementById('dot-loader');

            // Auto-resize textarea
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Typing indicator animation
            let dotInterval;
            function startDotLoader() {
                dotLoader.style.display = 'inline';
                submitBtn.disabled = true;
                let count = 0;
                const dotsSpan = document.getElementById('dots');
                dotInterval = setInterval(() => {
                    count = (count + 1) % 4;
                    dotsSpan.textContent = '.'.repeat(count);
                }, 500);
            }

            function stopDotLoader() {
                dotLoader.style.display = 'none';
                submitBtn.disabled = false;
                if (dotInterval) clearInterval(dotInterval);
            }

            // Function to add a "typing" indicator from AI
            function showTypingIndicator() {
                const typingDiv = document.createElement('div');
                typingDiv.className = 'message-item ai-message mb-3 typing-indicator';
                typingDiv.id = 'typingIndicator';
                typingDiv.innerHTML = `
                    <div class="d-flex align-items-start">
                        <div class="ai-avatar me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div class="message-bubble ai-bubble" style="background: white; padding: 12px 20px; border-radius: 18px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                            <div class="d-flex gap-1">
                                <span class="dot" style="animation: typingBounce 1.4s infinite ease-in-out;">●</span>
                                <span class="dot" style="animation: typingBounce 1.4s infinite ease-in-out 0.2s;">●</span>
                                <span class="dot" style="animation: typingBounce 1.4s infinite ease-in-out 0.4s;">●</span>
                            </div>
                            <span class="text-muted ms-2 small">Maktaba Connect is thinking...</span>
                        </div>
                    </div>
                `;
                chatBody.appendChild(typingDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
            }

            function removeTypingIndicator() {
                const indicator = document.getElementById('typingIndicator');
                if (indicator) indicator.remove();
            }

            function appendUserMessage(question) {
                const userDiv = document.createElement('div');
                userDiv.className = 'message-item user-message mb-3';
                userDiv.innerHTML = `
                    <div class="d-flex justify-content-end w-100">
                        <div class="message-bubble user-bubble" style="background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); color: white; padding: 10px 18px; border-radius: 18px 18px 5px 18px; max-width: 90%; min-width: 150px; word-wrap: break-word; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <div class="small fw-bold mb-1 opacity-75">
                                <i class="fas fa-user me-1"></i> You
                            </div>
                            ${escapeHtml(question)}
                        </div>
                    </div>
                `;
                chatBody.appendChild(userDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
            }

            function appendAiResponse(question, answer) {
                const aiDiv = document.createElement('div');
                aiDiv.className = 'message-item ai-message mb-4';
                aiDiv.style.animation = 'fadeIn 0.3s ease';
                aiDiv.innerHTML = `
                    <div class="d-flex align-items-start">
                        <div class="ai-avatar me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #1dafe9 0%, #1dafe9 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div class="message-bubble ai-bubble" style="background: white; padding: 12px 18px; border-radius: 18px 18px 18px 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); max-width: calc(100% - 60px); word-wrap: break-word; color: #1e293b;">
                            <div class="small fw-bold mb-2" style="color: #1dafe9;">
                                <i class="fa-solid fa-book me-1"></i> Maktaba Connect
                            </div>
                            ${escapeHtml(answer).replace(/\n/g, '<br>')}
                        </div>
                    </div>
                `;
                chatBody.appendChild(aiDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
            }

            function escapeHtml(str) {
                if (!str) return '';
                return str.replace(/[&<>]/g, function(m) {
                    if (m === '&') return '&amp;';
                    if (m === '<') return '&lt;';
                    if (m === '>') return '&gt;';
                    return m;
                }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
                    return c;
                });
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const question = textarea.value.trim();
                if (!question) return;

                textarea.value = '';
                textarea.style.height = 'auto';

                appendUserMessage(question);

                showTypingIndicator();

                startDotLoader();

                try {
                    const response = await fetch('{{ route("tutor.modal") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ question: question })
                    });

                    const data = await response.json();

                    removeTypingIndicator();

                    if (data.success) {
                        if (data.answer) {
                            appendAiResponse(question, data.answer, data.model_used);
                        } else if (data.html) {
                            console.warn('No answer field, using full reload not ideal. Please update controller.');
                            location.reload();
                        }
                    } else {
                        removeTypingIndicator();
                        appendAiResponse(question, 'Sorry, I encountered an error. Please try again.', null);
                    }
                } catch (error) {
                    console.error('AJAX error:', error);
                    removeTypingIndicator();
                    appendAiResponse(question, 'Network error. Please check your connection and try again.', null);
                } finally {
                    stopDotLoader();
                }
            });

            // Scroll to bottom on load
            if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
        });

        // CSS for typing animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes typingBounce {
                0%, 60%, 100% { transform: translateY(0); opacity: 0.5; }
                30% { transform: translateY(-6px); opacity: 1; }
            }
            .typing-indicator .dot {
                font-size: 20px;
                display: inline-block;
            }
        `;
        document.head.appendChild(style);
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #chatBody::-webkit-scrollbar {
            width: 6px;
        }

        #chatBody::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #chatBody::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 3px;
        }

        #chatBody::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        /* Message hover effect */
        .message-item {
            transition: transform 0.2s ease;
        }

        .message-item.user-message {
            width: 100%;
        }

        .message-item:hover {
            transform: translateX(5px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .chat-container {
                margin: 0 -15px;
                border-radius: 0 !important;
            }

            .message-bubble {
                max-width: 90% !important;
            }

            .model-info {
                display: none;
            }
        }

        /* Badge hover effect */
        .badge {
            transition: all 0.3s ease;
        }

        .badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .message-bubble {
            max-width: 85%;
            word-wrap: break-word;
            white-space: normal;
        }

        .user-bubble {
            max-width: 90%;
        }

        .ai-bubble {
            max-width: 85%;
        }
    </style>
@endsection
