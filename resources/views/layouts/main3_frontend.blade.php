<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Soma Connect - Your digital learning platform for study materials, past papers, and reference books">
    <title>Soma Connect | Homepage</title>

    <link rel="icon" type="image/x-icon" href="/assets3/images/icon/favicons.png">

    <!-- All css here -->
    <link rel="stylesheet" href="/assets3/css/bootstrap.css">
    <link rel="stylesheet" href="/assets3/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets3/css/slick.css">
    <link rel="stylesheet" href="/assets3/css/nice-select.css">
    <link rel="stylesheet" href="/assets3/css/animate.css">
    <link rel="stylesheet" href="/assets3/css/meanmenu.css">
    <link rel="stylesheet" href="/assets3/css/flaticon.css">
    <link rel="stylesheet" href="/assets3/css/icomoon.css">
    <link rel="stylesheet" href="/assets3/css/default.css">
    <link rel="stylesheet" href="/assets3/css/style.css">
    <link rel="stylesheet" href="/assets3/css/responsive.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Modern Styles -->
    <style>
        :root {
            --primary-color: #6cbad9;
            --secondary-color: #e6e92c;
            --accent-color: #f72585;
            --dark-color: #1e1e2f;
            --light-color: #f8f9fa;
            --success-color: #06d6a0;
            --gradient-primary: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            --gradient-accent: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --box-shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 80px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 99;
            box-shadow: var(--box-shadow);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--accent-color);
            transform: translateY(-5px);
        }

        /* AI Chat Button */
        .ai-chat-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            z-index: 100;
            box-shadow: 0 5px 20px rgb(108, 186, 217);
            border: none;
            animation: pulse 2s infinite;
        }

        .ai-chat-button:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 8px 25px rgb(108, 186, 217);
        }

        .ai-chat-button i {
            font-size: 24px;
        }

        .ai-chat-tooltip {
            position: absolute;
            right: 70px;
            background: #fff;
            color: #333;
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            box-shadow: var(--box-shadow);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            pointer-events: none;
        }

        .ai-chat-button:hover .ai-chat-tooltip {
            opacity: 1;
            visibility: visible;
            right: 80px;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(102, 126, 234, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
            }
        }

        /* AI Chat Modal */
        .ai-chat-modal {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 350px;
            height: 500px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: none;
            flex-direction: column;
            overflow: hidden;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ai-chat-modal.active {
            display: flex;
        }

        .ai-chat-header {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ai-chat-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .ai-chat-header .close-chat {
            background: none;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .ai-chat-header .close-chat:hover {
            transform: rotate(90deg);
        }

        .ai-chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f8f9fa;
        }

        .ai-message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .ai-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .ai-avatar i {
            font-size: 18px;
        }

        .ai-bubble {
            background: #fff;
            padding: 12px 15px;
            border-radius: 15px 15px 15px 5px;
            max-width: 80%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }

        .user-message {
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .user-bubble {
            background: var(--primary-color);
            color: #fff;
            padding: 12px 15px;
            border-radius: 15px 15px 5px 15px;
            max-width: 80%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            font-size: 14px;
            line-height: 1.5;
        }

        .ai-chat-input {
            padding: 20px;
            border-top: 1px solid #eee;
            background: #fff;
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        .input-group input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 14px;
            transition: var(--transition);
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .input-group button {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-group button:hover {
            transform: scale(1.1);
        }

        .input-group button i {
            font-size: 18px;
        }

        /* Section Titles */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-subtitle {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.1);
            padding: 5px 15px;
            border-radius: 30px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .section-title span {
            color: var(--primary-color);
        }

        .section-description {
            font-size: 16px;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Buttons */
        .btn-modern {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-primary-modern {
            background: var(--gradient-primary);
            color: #fff;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
            color: #fff;
        }

        .btn-secondary-modern {
            background: var(--secondary-color);
            color: var(--dark-color);
            box-shadow: 0 5px 15px rgba(230, 233, 44, 0.3);
        }

        .btn-secondary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(230, 233, 44, 0.4);
            color: var(--dark-color);
        }

        .btn-outline-modern {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-modern:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .section-title {
                font-size: 30px;
            }
        }

        @media (max-width: 767px) {
            .section-title {
                font-size: 26px;
            }

            .back-to-top {
                bottom: 80px;
                right: 20px;
                width: 40px;
                height: 40px;
            }

            .ai-chat-button {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }

            .ai-chat-modal {
                width: 300px;
                right: 20px;
                bottom: 80px;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    @include('includes.frontend1.header')

    <!-- Mobile Menu -->
    @include('includes.frontend1.side-mobile-menu')
    <div class="body-overlay"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.frontend1.footer')

    <!-- AI Chat Button (Maktaba Connect) -->
    <button type="button" class="ai-chat-button" id="aiChatButton" data-bs-toggle="modal"
        data-bs-target="#maktabaChatModal">
        <span class="ai-chat-tooltip">Ask Maktaba Connect</span>
        <i class="fa-solid fa-book"></i>
    </button>

    <!-- Maktaba Connect Modal -->
    <div class="modal fade" id="maktabaChatModal" tabindex="-1" aria-labelledby="maktabaChatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog"
            style="position: fixed; bottom: 100px; right: 30px; margin: 0; width: 350px; max-width: 350px;">
            <div class="modal-content shadow" style="height: 500px; border-radius: 20px; overflow: hidden;">

                <!-- Modal Header -->
                <div class="modal-header"
                    style="background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%); color: white; border-bottom: none; padding: 15px 20px;">
                    <h5 class="modal-title" id="maktabaChatModalLabel">
                        <i class="fas fa-book me-2"></i>Maktaba Connect
                    </h5>
                    <div class="d-flex gap-2 align-items-center">
                        <button type="button" class="btn-close-white btn-sm">
                        <a href="{{ route('tutor.index') }}" style="opacity: 0.8;">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        </button>
                        <button type="button" class="btn-close btn-close-white btn-sm" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-0" style="background: #f8fafc;">
                    <div id="chatMessagesContainer" style="height: 380px; overflow-y: auto; padding: 15px;">
                        @include('partials.tutor_history', ['questions' => $questions ?? collect()])
                    </div>
                </div>

                <!-- Modal Footer (Input) -->
                <div class="modal-footer p-3" style="border-top: 1px solid #e2e8f0; background: white;">
                    <form id="maktabaAskForm" class="w-100">
                        @csrf
                        <div class="input-group">
                            <textarea name="question" rows="1" class="form-control" placeholder="Ask me anything..."
                                style="border-radius: 30px; padding: 10px 15px; border: 1px solid #e2e8f0; resize: none;" required></textarea>
                            <button type="submit" class="btn"
                                style="background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%); color: white; border-radius: 30px; margin-left: 10px; padding: 10px 20px;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom modal positioning */
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 350px;
                margin: 0;
            }
        }

        .modal-content {
            border: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-radius: 20px 20px 0 0;
        }

        .modal-body {
            background: #f8fafc;
        }

        /* Custom scrollbar for chat */
        #chatMessagesContainer::-webkit-scrollbar {
            width: 6px;
        }

        #chatMessagesContainer::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #chatMessagesContainer::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 3px;
        }

        #chatMessagesContainer::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        /* Input styling */
        #maktabaAskForm textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            border-color: #6cbad9;
        }

        /* Message animations */
        .message-item {
            animation: fadeIn 0.3s ease;
        }

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
    </style>

    <!-- Back to Top -->
    <div class="back-to-top">
        <span class="icon-chevrons-up"></span>
    </div>

    <!-- Scripts -->
    <script src="/assets3/js/vendor/jquery.js"></script>
    <script src="/assets3/js/bootstrap.min.js"></script>
    <script src="/assets3/js/jquery.inputarrow.js"></script>
    <script src="/assets3/js/jquery.nice-select.min.js"></script>
    <script src="/assets3/js/slick.min.js"></script>
    <script src="/assets3/js/isotope.pkgd.min.js"></script>
    <script src="/assets3/js/plugins.js"></script>
    <script src="/assets3/js/countdown.min.js"></script>
    <script src="/assets3/js/jquery.meanmenu.min.js"></script>
    <script src="/assets3/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    @yield('scripts')

    <script>
        // Preloader
        $(window).on('load', function() {
            $('#preloader').fadeOut('slow');
        });

        // Back to Top
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        // AI Chat Functionality
        const chatButton = document.getElementById('aiChatButton');
        const chatModal = document.getElementById('aiChatModal');
        const closeChat = document.getElementById('closeChat');
        const chatMessages = document.getElementById('chatMessages');
        const userInput = document.getElementById('userMessage');

        chatButton.addEventListener('click', function() {
            chatModal.classList.add('active');
        });

        closeChat.addEventListener('click', function() {
            chatModal.classList.remove('active');
        });

        // Close modal when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.ai-chat-modal, .ai-chat-button').length) {
                chatModal.classList.remove('active');
            }
        });

        // AI Response function
        function getAIResponse(message) {
            const lowerMessage = message.toLowerCase();

            // Simple response logic - in production, this would call your AI API
            if (lowerMessage.includes('hello') || lowerMessage.includes('hi')) {
                return "Hello! How can I assist with your learning today?";
            } else if (lowerMessage.includes('study tip') || lowerMessage.includes('how to study')) {
                return "Here are some effective study tips:\n\n• Create a study schedule\n• Take regular breaks (Pomodoro technique)\n• Practice active recall\n• Teach others what you've learned\n• Use mind maps and summaries";
            } else if (lowerMessage.includes('mathematics') || lowerMessage.includes('math')) {
                return "For mathematics, I recommend:\n\n• Practice regularly with past papers\n• Understand formulas, don't just memorize\n• Start with basic problems and progress\n• Use online resources like Khan Academy\n• Join study groups for discussion";
            } else if (lowerMessage.includes('science') || lowerMessage.includes('physics') || lowerMessage.includes(
                    'chemistry') || lowerMessage.includes('biology')) {
                return "For science subjects:\n\n• Focus on understanding concepts\n• Draw diagrams and flowcharts\n• Conduct practical experiments\n• Use mnemonics for formulas\n• Review past paper questions regularly";
            } else if (lowerMessage.includes('past paper') || lowerMessage.includes('exam')) {
                return "When using past papers:\n\n• Time yourself strictly\n• Mark your answers honestly\n• Review mistakes thoroughly\n• Identify common question patterns\n• Practice under exam conditions";
            } else if (lowerMessage.includes('book') || lowerMessage.includes('reference')) {
                return "For reference books, I recommend:\n\n• Check our reference books section\n• Use recommended textbooks\n• Supplement with online resources\n• Take notes while reading\n• Discuss with classmates";
            } else {
                return "That's a great question! While I'm learning to answer more specific questions, I can help you with:\n\n• Study techniques\n• Subject guidance\n• Past paper strategies\n• Finding resources\n\nCould you please rephrase or be more specific?";
            }
        }

        // Send message function
        window.sendMessage = function() {
            const message = userInput.value.trim();
            if (message === '') return;

            // Add user message
            const userDiv = document.createElement('div');
            userDiv.className = 'user-message';
            userDiv.innerHTML = `
                <div class="user-bubble">${message}</div>
            `;
            chatMessages.appendChild(userDiv);

            // Clear input
            userInput.value = '';

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Simulate AI typing
            setTimeout(() => {
                const aiResponse = getAIResponse(message);

                const aiDiv = document.createElement('div');
                aiDiv.className = 'ai-message';
                aiDiv.innerHTML = `
                    <div class="ai-avatar">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="ai-bubble">${aiResponse}</div>
                `;
                chatMessages.appendChild(aiDiv);

                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        };

        // Handle Enter key
        window.handleKeyPress = function(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        };
    </script>

    <script>
        // Preloader
        $(window).on('load', function() {
            $('#preloader').fadeOut('slow');
        });

        // Back to Top
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        // Maktaba Connect Chat Functionality
        $(document).ready(function() {
            let isSubmitting = false;

            // Handle form submission
            $('#maktabaAskForm').on('submit', function(e) {
                e.preventDefault();

                if (isSubmitting) return;

                const form = $(this);
                const textarea = form.find('textarea');
                const question = textarea.val().trim();

                if (!question) return;

                // Disable form
                isSubmitting = true;
                textarea.prop('disabled', true);
                form.find('button[type="submit"]').prop('disabled', true);

                // Add user message immediately (optimistic update)
                const userMessage = `
                <div class="user-message message-item" style="margin-bottom: 15px; text-align: right;">
                    <div style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 10px 15px; border-radius: 15px 15px 5px 15px; max-width: 80%; word-wrap: break-word;">
                        ${escapeHtml(question)}
                    </div>
                </div>
            `;
                $('#chatMessagesContainer').append(userMessage);
                textarea.val('');
                scrollToBottom();

                // Show typing indicator
                const typingIndicator = `
                <div class="ai-message message-item typing-indicator" id="typingIndicator">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-book"></i>
                        </div>
                        <div style="background: white; padding: 12px 15px; border-radius: 15px 15px 15px 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                            <span class="dot" style="width: 8px; height: 8px; background: #667eea; border-radius: 50%; display: inline-block; animation: typing 1.4s infinite ease-in-out;"></span>
                            <span class="dot" style="width: 8px; height: 8px; background: #667eea; border-radius: 50%; display: inline-block; animation: typing 1.4s infinite ease-in-out; animation-delay: 0.2s;"></span>
                            <span class="dot" style="width: 8px; height: 8px; background: #667eea; border-radius: 50%; display: inline-block; animation: typing 1.4s infinite ease-in-out; animation-delay: 0.4s;"></span>
                        </div>
                    </div>
                </div>
            `;
                $('#chatMessagesContainer').append(typingIndicator);
                scrollToBottom();

                // Send AJAX request
                $.ajax({
                    url: '{{ route('tutor.modal') }}',
                    method: 'POST',
                    data: {
                        question: question,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Remove typing indicator
                        $('#typingIndicator').remove();

                        if (response.success) {
                            // Update entire chat container with new history
                            $('#chatMessagesContainer').html(response.html);
                        } else {
                            // Show error message
                            showErrorMessage();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#typingIndicator').remove();
                        showErrorMessage();
                    },
                    complete: function() {
                        // Re-enable form
                        isSubmitting = false;
                        textarea.prop('disabled', false);
                        form.find('button[type="submit"]').prop('disabled', false);
                        textarea.focus();
                        scrollToBottom();
                    }
                });
            });

            // Helper function to escape HTML
            function escapeHtml(unsafe) {
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            // Helper function to show error message
            function showErrorMessage() {
                const errorMessage = `
                <div class="ai-message message-item">
                    <div style="display: flex; align-items: flex-start; gap: 8px;">
                        <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-book"></i>
                        </div>
                        <div style="background: white; padding: 12px 15px; border-radius: 15px 15px 15px 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); color: #dc2626;">
                            Sorry, I encountered an error. Please try again.
                        </div>
                    </div>
                </div>
            `;
                $('#chatMessagesContainer').append(errorMessage);
                scrollToBottom();
            }

            // Helper function to scroll to bottom
            function scrollToBottom() {
                const container = document.getElementById('chatMessagesContainer');
                container.scrollTop = container.scrollHeight;
            }

            // Auto-resize textarea
            $('#maktabaAskForm textarea').on('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Handle Enter key (Shift+Enter for new line, Enter to submit)
            $('#maktabaAskForm textarea').on('keydown', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    $('#maktabaAskForm').submit();
                }
            });

            // Add typing animation styles
            const style = document.createElement('style');
            style.textContent = `
            @keyframes typing {
                0%, 60%, 100% {
                    transform: translateY(0);
                    opacity: 0.6;
                }
                30% {
                    transform: translateY(-5px);
                    opacity: 1;
                }
            }
        `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>
