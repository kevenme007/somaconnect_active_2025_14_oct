@extends('layouts.main3_frontend')

@section('title')
    Support SomaConnect
@endsection

@section('content')
    <section class="faq-section py-5">
        <div class="container">
            <div class="row g-5">

                <!-- Left Side: Support Form -->
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h3 class="mb-3 text-primary">Support SomaConnect</h3>
                            <p class="text-muted">
                                Fill out the form below to let us know how you’d like to support SomaConnect.
                                Every contribution matters!
                            </p>

                            <form action="{{ route('support.submit') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name*</label>
                                        <input type="text" name="first_name" id="firstName" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name*</label>
                                        <input type="text" name="last_name" id="lastName" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address*</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone (optional)</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="supportType" class="form-label">How would you like to support?*</label>
                                        <select name="support_type" id="supportType" class="form-select" required>
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="skills">📘 Offering Skills (Teaching, IT, etc.)</option>
                                            <option value="resources">📦 Donating Resources (Books, Devices, etc.)</option>
                                            <option value="funds">💳 Financial Support</option>
                                            <option value="other">✨ Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="details" class="form-label">Details*</label>
                                        <textarea name="details" id="details" rows="5" class="form-control" required></textarea>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary w-100 py-2">
                                            🚀 Submit Support Offer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Why Support -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="text-dark">💡 Why Support SomaConnect?</h4>
                            <p class="text-muted">
                                Your support helps us empower students and teachers with digital tools,
                                educational resources, and training opportunities.
                            </p>
                            <ul class="list-unstyled mt-3">
                                <li class="mb-2">📚 <strong>Donate</strong> books & materials</li>
                                <li class="mb-2">💻 <strong>Provide</strong> technical expertise</li>
                                <li class="mb-2">💰 <strong>Contribute</strong> to funding projects</li>
                                <li class="mb-2">🤝 <strong>Volunteer</strong> your time and skills</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });
        </script>
    @endif
@endsection
