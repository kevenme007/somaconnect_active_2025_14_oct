@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.showAlert = function(options = {}) {
    const defaults = {
        type: 'toast', // 'toast' or 'modal'
        icon: 'success', // success, error, warning, info, question
        title: '',
        text: '',       // only for modal
        html: '',       // optional HTML
        position: 'top-end', // for toast
        timer: 3000,    // for toast
        showConfirmButton: false, // for toast
    };

    const settings = {...defaults, ...options};

    if (settings.type === 'toast') {
        Swal.fire({
            toast: true,
            position: settings.position,
            icon: settings.icon,
            title: settings.title,
            html: settings.html || undefined,
            showConfirmButton: settings.showConfirmButton,
            timer: settings.timer,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    } else if (settings.type === 'modal') {
        Swal.fire({
            icon: settings.icon,
            title: settings.title,
            text: settings.text,
            html: settings.html || undefined,
            showConfirmButton: true,
        });
    }
};

// Automatically display session messages
document.addEventListener('DOMContentLoaded', () => {
    @if (session('success'))
        showAlert({ type: 'toast', icon: 'success', title: '{{ session('success') }}' });
    @endif

    @if (session('error'))
        showAlert({ type: 'toast', icon: 'error', title: '{{ session('error') }}' });
    @endif

    @if ($errors->any())
        let errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += '• {{ $error }}<br>';
        @endforeach
        showAlert({ type: 'toast', icon: 'error', title: 'Please fix the following:', html: errorMessages });
    @endif
});
</script>
@endpush
