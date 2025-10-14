@extends('layouts.root')

@section('title', 'Chat')

@section('content')
<main id="main" class="main">

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Chat with {{ $conversation->user_one_id === auth()->id() ? $conversation->userTwo->name : $conversation->userOne->name }}</h5>
            <a href="{{ route('chat.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Back to Users
            </a>
        </div>

        <!-- Chat Box -->
        <div id="chat-box" class="card-body p-3" style="height: 400px; overflow-y: auto; background-color: #f8f9fa;">
            @include('chat._messages')
        </div>

        <!-- Typing Indicator -->
        <div class="px-3 py-2">
            <small id="typing-indicator" class="text-muted fst-italic"></small>
        </div>

        <!-- Chat Input -->
        <div class="card-footer p-2">
            <form id="chat-form" class="d-flex gap-2">
                @csrf
                <input type="text" id="message" name="message" placeholder="Type your message..." class="form-control" autocomplete="off" required>
                <button type="button" id="emoji-trigger" class="btn btn-light">
                    😊
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i> Send
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Audio Alert -->
<audio id="newMessageSound" src="{{ asset('sounds/notification.mp3') }}" preload="auto"></audio>

<!-- jQuery + Emoji Button -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js"></script>

<!-- Main Chat Script -->
<script>
    let typingTimeout;

    $(document).ready(function() {

        function fetchMessages() {
            $.ajax({
                url: "{{ route('chat.show', request()->route('userId')) }}",
                success: function(data) {
                    $('#chat-box').html(data);
                    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                }
            });
        }

        setInterval(fetchMessages, 5000);

        // Send message
        $('#chat-form').on('submit', function(e) {
            e.preventDefault();

            const message = $('#message').val().trim();
            if (!message) return;

            $.ajax({
                url: "{{ route('chat.send', $conversation->id) }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    message: message
                },
                success: function() {
                    $('#message').val('');
                    fetchMessages();
                    $('#newMessageSound')[0].play();
                }
            });
        });

        // Typing indicator
        $('#message').on('input', function() {
            clearTimeout(typingTimeout);
            $.post("{{ route('chat.typing', $conversation->id) }}", {
                _token: "{{ csrf_token() }}"
            });
            typingTimeout = setTimeout(() => {}, 3000);
        });

        // Emoji picker
        const button = document.querySelector('#emoji-trigger');
        const picker = new EmojiButton();

        picker.on('emoji', emoji => {
            const input = document.querySelector('#message');
            input.value += emoji;
            input.focus();
        });

        button.addEventListener('click', () => picker.togglePicker(button));
    });
</script>
</main>
@endsection
