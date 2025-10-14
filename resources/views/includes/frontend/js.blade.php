
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="/assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="/assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="/assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="/assets/js/wow.min.js"></script>
    <!-- Gsap -->
    <script src="/assets/js/gsap.min.js"></script>
    <!--<< Main.js >>-->
    <script src="/assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ e(session("success")) }}',
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
    @endif
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            toast: true,
            position: 'top-end',
            timer: 5000,
            showConfirmButton: false,
        });
    </script>
    @endif
    <script>
        const chatBtn = document.getElementById('chat-toggle-btn');
        const chatModal = document.getElementById('chat-modal');

        function toggleChatModal() {
            chatModal.classList.toggle('hidden');
        }

        chatBtn.addEventListener('click', toggleChatModal);


        document.addEventListener('DOMContentLoaded', function() {
            const maximizeBtn = document.getElementById('maximizeChatBtn');
            const modalDialog = document.getElementById('chatModalDialog');
            const modalBody = document.getElementById('chatModalBody');
            const chatIframe = document.getElementById('chatIframe');

            let isMaximized = false;

            maximizeBtn.addEventListener('click', () => {
                if (isMaximized) {
                    // Restore to default
                    modalDialog.style.width = '320px';
                    modalDialog.style.height = 'auto';
                    modalBody.style.height = '250px';
                    chatIframe.style.height = '400px';
                    maximizeBtn.innerText = '⛶';
                } else {
                    // Maximize
                    modalDialog.style.width = '550px';
                    modalDialog.style.height = '700px';
                    modalBody.style.height = 'calc(90vh - 130px)';
                    chatIframe.style.height = '100%';
                    maximizeBtn.innerText = '🗕';
                }
                isMaximized = !isMaximized;
            });
        });

        document.getElementById('askForm').addEventListener('submit', function() {
            document.getElementById('typingIndicator').style.display = 'flex';
        });

        const textarea = document.getElementById('chatInput');
        const form = document.getElementById('askForm');
        const typingIndicator = document.getElementById('typingIndicator');

        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault(); // Prevent newline
                if (textarea.value.trim() !== '') {
                    typingIndicator.style.display = 'flex';
                    form.submit();
                }
            }
        });


        $('#askForm').on('submit', function (e) {
            e.preventDefault(); // Stop normal form submission

            let form = $(this);
            let button = form.find('button');
            let textarea = form.find('textarea');

            // Disable button while sending
            button.prop('disabled', true).text('Sending...');

            $.ajax({
                url: "{{ route('tutor.modal') }}",
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    // Clear textarea
                    textarea.val('');
                    button.prop('disabled', false).text('Ask');

                    // Append new question to modal body
                    $('.modal-body').prepend(`
                    <div class="border rounded p-2 mb-2 bg-light">
                        <small class="text-muted">🕒 just now</small>
                        <p class="mb-1"><strong>You:</strong> ${response.question}</p>
                        <p class="mb-0"><strong>MaktabaConnect:</strong> Waiting for answer...</p>
                    </div>
                `);
                },
                error: function (xhr) {
                    alert('Failed to send question. Please try again.');
                    button.prop('disabled', false).text('Ask');
                }
            });
        });
    </script>





