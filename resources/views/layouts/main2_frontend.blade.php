@extends('layouts.main2_frontend')

@section('title', 'Update Profile - Soma Connect')

@section('content')
<div class="soma-portal">
    <div class="container-fluid px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="portal-header mb-4">
                    <div class="_d-flex align-items-center">
                        <div class="portal-logo me-3">
                            <i class="fas fa-user-circle fa-2x text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white mb-0 fw-bold">My Profile</h4>
                            <p class="text-white-50 mb-0 small">Update your personal information and preferences</p>
                        </div>
                    </div>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert-glass alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row g-4">
                    <!-- Edit Form Card -->
                    <div class="col-lg-8">
                        <div class="glass-card">
                            <h4 class="glass-card-title mb-4">Edit Profile</h4>
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">
                                    <!-- Full Name -->
                                    <div class="col-md-4">
                                        <label for="name" class="form-label-modern">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-user input-icon"></i>
                                            <input type="text" class="form-control-modern" id="name" name="name"
                                                value="{{ old('name', $user->name) }}" required>
                                        </div>
                                    </div>

                                    <!-- Username -->
                                    <div class="col-md-3">
                                        <label for="username" class="form-label-modern">Username <span class="text-danger">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-at input-icon"></i>
                                            <input type="text" class="form-control-modern" id="username"
                                                name="username" value="{{ old('username', $user->username) }}" required>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-5">
                                        <label for="email" class="form-label-modern">Email <span class="text-danger">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-envelope input-icon"></i>
                                            <input type="email" class="form-control-modern" id="email" name="email"
                                                value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>

                                    <!-- Role -->
                                    <div class="col-md-4">
                                        <label for="role" class="form-label-modern">Role <span class="text-danger">*</span></label>
                                        <div class="select-wrapper">
                                            <i class="fas fa-user-tag select-icon"></i>
                                            <select class="form-select-modern" name="role" id="role" required>
                                                <option disabled value="">Select Role</option>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $key }}" @selected(old('role', strtolower($user->role)) == $key)>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Conditional: Grade for students -->
                                    @if (old('role', $user->role) === 'student')
                                    <div class="col-md-4">
                                        <label for="classroom" class="form-label-modern">Grade <span class="text-danger">*</span></label>
                                        <div class="select-wrapper">
                                            <i class="fas fa-graduation-cap select-icon"></i>
                                            <select class="form-select-modern" name="classroom" required>
                                                <option selected disabled value="">Select Grade</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade }}" {{ (old('classroom') ?? $profile->classroom) === $grade ? 'selected' : '' }}>
                                                        {{ $grade }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Gender -->
                                    <div class="col-md-4">
                                        <label for="gender" class="form-label-modern">Gender</label>
                                        <div class="select-wrapper">
                                            <i class="fas fa-venus-mars select-icon"></i>
                                            <select class="form-select-modern" name="gender" required>
                                                <option value="" disabled {{ old('gender', $profile->gender) == '' ? 'selected' : '' }}>Select Gender</option>
                                                @foreach ($genders as $key => $value)
                                                    <option value="{{ $key }}" @selected(strtolower(old('gender', $profile->gender)) == $key)>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label-modern">Phone</label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-phone-alt input-icon"></i>
                                            <input type="text" class="form-control-modern" id="phone" name="phone"
                                                value="{{ old('phone', $profile->phone) }}">
                                        </div>
                                    </div>

                                    <!-- Birthday -->
                                    <div class="col-md-4">
                                        <label for="birthday" class="form-label-modern">Birthday</label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-calendar-alt input-icon"></i>
                                            <input type="date" class="form-control-modern" id="birthday"
                                                name="birthdate" value="{{ old('birthdate', $profile->birthdate) }}" required>
                                        </div>
                                    </div>

                                    <!-- School -->
                                    <div class="col-md-4">
                                        <label for="school" class="form-label-modern">School <span class="text-danger">*</span></label>
                                        <div class="select-wrapper">
                                            <i class="fas fa-school select-icon"></i>
                                            <select class="form-select-modern" name="school_id" id="school" required>
                                                <option selected disabled value="">Choose School</option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}" @selected(old('school_id', $profile->school_id) == $school->id)>
                                                        {{ $school->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Guardian Name (if student) -->
                                    @if (old('role', $user->role) === 'student')
                                        <div class="col-md-4">
                                            <label for="guardian_name" class="form-label-modern">Guardian Name</label>
                                            <div class="input-wrapper">
                                                <i class="fas fa-users input-icon"></i>
                                                <input type="text" class="form-control-modern" id="guardian_name"
                                                    name="guardian_name" value="{{ old('guardian_name', $profile->guardian_name) }}">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Avatar -->
                                    <div class="col-md-12">
                                        <label for="avatar" class="form-label-modern">Profile Picture</label>
                                        @if ($profile->avatar)
                                            <div class="current-avatar mb-2">
                                                <span class="text-muted small">Current:</span>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#avatarModal" class="ms-2">View Avatar</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                                        <div class="modal-content bg-glass">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="avatarModalLabel">Your Avatar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ Storage::url($profile->avatar) }}" alt="User Avatar" class="img-fluid rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-muted small">No avatar uploaded yet.</p>
                                        @endif
                                        <input type="file" class="form-control-modern mt-2" id="avatar" name="avatar">
                                    </div>

                                    <!-- Bio -->
                                    <div class="col-12">
                                        <label for="bio" class="form-label-modern">Bio (optional)</label>
                                        <div class="textarea-wrapper">
                                            <i class="fas fa-comment textarea-icon"></i>
                                            <textarea class="form-control-modern" name="bio" id="bio" rows="3">{{ old('bio', $profile->bio) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn-modern btn-primary-modern px-5" type="submit">
                                            <i class="fas fa-save me-2"></i> Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Profile Summary Card -->
                    <div class="col-lg-4">
                        <div class="glass-card text-center">
                            <div class="profile-avatar mb-3">
                                @if ($profile->avatar)
                                    <img src="{{ Storage::url($profile->avatar) }}" alt="User Avatar" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/avatar.jpg') }}" alt="Default Avatar" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                @endif
                            </div>
                            <h5 class="fw-bold">{{ $user->name }}</h5>
                            <p class="text-muted small">@ {{ $user->username }}</p>
                            <hr>
                            <div class="text-start">
                                <ul class="list-unstyled profile-info">
                                    <li><i class="fas fa-envelope me-2"></i> {{ $user->email }}</li>
                                    <li><i class="fas fa-user-tag me-2"></i> {{ ucfirst($user->role) }}</li>
                                    <li><i class="fas fa-school me-2"></i> {{ $profile->school->name ?? 'Not set' }}</li>
                                    @if (old('role', $user->role) === 'student')
                                        <li><i class="fas fa-graduation-cap me-2"></i> {{ $profile->classroom ?? 'Not set' }}</li>
                                    @endif
                                    <li><i class="fas fa-venus-mars me-2"></i> {{ ucfirst($profile->gender) ?? 'Not set' }}</li>
                                    <li><i class="fas fa-birthday-cake me-2"></i> {{ $profile->birthdate ?? 'Not set' }}</li>
                                    <li><i class="fas fa-phone-alt me-2"></i> {{ $profile->phone ?? 'Not set' }}</li>
                                    @if (old('role', $user->role) === 'student')
                                        <li><i class="fas fa-users me-2"></i> Guardian: {{ $profile->guardian_name ?? 'Not set' }}</li>
                                    @endif
                                    <li><i class="fas fa-align-left me-2"></i> Bio: {{ $profile->bio ?? 'None' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* -------------------------------
       Glassmorphism + Gradient Theme
    ------------------------------- */
    .soma-portal {
        min-height: 100vh;
        background: radial-gradient(circle at center, rgba(253, 224, 71, 0.4) 0%, rgba(3, 110, 178, 0.4) 100%) !important;
    }

    .portal-header {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1.25rem 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    }

    .portal-logo {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 30px;
        padding: 1.8rem;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-4px);
    }

    .glass-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        border-left: 4px solid #6cbad9;
        padding-left: 1rem;
        margin-bottom: 1.5rem;
    }

    /* Form elements */
    .form-label-modern {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.4rem;
        display: block;
    }

    .input-wrapper, .select-wrapper, .textarea-wrapper {
        position: relative;
    }

    .input-icon, .select-icon, .textarea-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6cbad9;
        font-size: 1rem;
        z-index: 2;
    }

    .textarea-icon {
        top: 20px;
        transform: none;
    }

    .form-control-modern, .form-select-modern {
        width: 100%;
        padding: 0.8rem 1rem 0.8rem 45px;
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        font-size: 0.95rem;
        color: #1e293b;
        transition: all 0.3s ease;
    }

    .form-select-modern {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236cbad9' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 44px;
    }

    .form-control-modern:focus, .form-select-modern:focus {
        outline: none;
        border-color: #6cbad9;
        box-shadow: 0 0 0 4px rgba(108, 186, 217, 0.2);
    }

    textarea.form-control-modern {
        padding-top: 0.8rem;
        padding-bottom: 0.8rem;
    }

    /* Buttons */
    .btn-modern {
        display: inline-block;
        padding: 0.7rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
        color: white;
        box-shadow: 0 5px 15px rgba(108,186,217,0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(108,186,217,0.4);
    }

    /* Alert glass */
    .alert-glass {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1rem 1.5rem;
        border-left: 5px solid;
    }

    .alert-danger {
        background: rgba(248, 215, 218, 0.9);
        border-left-color: #dc3545;
        color: #721c24;
    }

    /* Profile info list */
    .profile-info li {
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }
    .profile-info i {
        width: 24px;
        color: #6cbad9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .glass-card { padding: 1.2rem; }
        .glass-card-title { font-size: 1.3rem; }
    }
</style>

<script>
    // Simple script to ensure avatar modal works (already using Bootstrap)
    document.addEventListener("DOMContentLoaded", function() {
        // Any additional custom JS can go here
    });
</script>

{{-- Hide footer on this page (optional) --}}
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const footer = document.querySelector('footer');
        if (footer) footer.style.display = 'none';
    });
</script>
@endsection

@endsection
