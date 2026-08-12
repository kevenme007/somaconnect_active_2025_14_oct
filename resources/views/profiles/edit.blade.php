@extends('layouts.main3_frontend')

@section('title', 'Edit Profile')

@section('content')
<div class="soma-portal">
    <div class="container-fluid px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="portal-header mb-4">
                    <div class="d-flex align-items-center">
                        <div class="portal-logo me-3">
                            <i class="fas fa-user-edit fa-2x text-black"></i>
                        </div>
                        <div>
                            <h4 class="text-black mb-0 fw-bold">Edit Profile</h4>
                            <p class="text-black-50 mb-0 small">Update your personal information</p>
                        </div>
                    </div>
                </div>

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
                    <!-- Edit Form -->
                    <div class="col-lg-8">
                        <div class="glass-card">
                            <h2 class="card-title">Edit Profile</h2>
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-user"></i>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                        </div>
                                    </div>
                                    <!-- Username -->
                                    <div class="col-md-6">
                                        <label class="form-label">Username <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-at"></i>
                                            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-envelope"></i>
                                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>
                                    <!-- Role -->
                                    <div class="col-md-6">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-user-tag"></i>
                                            <select name="role" class="form-select" required>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $key }}" @selected(old('role', strtolower($user->role)) == $key)>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- School -->
                                    <div class="col-md-6">
                                        <label class="form-label">School <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-school"></i>
                                            <select name="school_id" class="form-select" required>
                                                <option value="">Choose School</option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}" @selected(old('school_id', $profile->school_id) == $school->id)>{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Grade (if student) -->
                                    @if (old('role', $user->role) === 'student')
                                    <div class="col-md-6">
                                        <label class="form-label">Class <span class="text-danger">*</span></label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-graduation-cap"></i>
                                            <select name="classroom" class="form-select" required>
                                                <option value="">Select class</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade }}" @selected((old('classroom') ?? $profile->classroom) === $grade)>{{ $grade }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-venus-mars"></i>
                                            <select name="gender" class="form-select">
                                                <option value="" disabled {{ old('gender', $profile->gender) == '' ? 'selected' : '' }}>Select Gender</option>
                                                @foreach ($genders as $key => $value)
                                                    <option value="{{ $key }}" @selected(strtolower(old('gender', $profile->gender)) == $key)>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
                                        </div>
                                    </div>
                                    <!-- Birthday -->
                                    <div class="col-md-6">
                                        <label class="form-label">Birthday</label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-calendar-alt"></i>
                                            <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $profile->birthdate) }}">
                                        </div>
                                    </div>
                                    <!-- Guardian Name (if student) -->
                                    @if (old('role', $user->role) === 'student')
                                    <div class="col-md-6">
                                        <label class="form-label">Guardian Name</label>
                                        <div class="input-group-custom">
                                            <i class="fas fa-users"></i>
                                            <input type="text" name="guardian_name" class="form-control" value="{{ old('guardian_name', $profile->guardian_name) }}">
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Avatar -->
                                    <div class="col-12">
                                        <label class="form-label">Profile Picture</label>
                                        <div class="mb-2">
                                            @if ($profile->avatar)
                                                <img src="{{ Storage::url($profile->avatar) }}" class="avatar-preview" alt="Avatar">
                                            @else
                                                <img src="{{ asset('assets/img/avatar.jpg') }}" class="avatar-preview" alt="Default Avatar">
                                            @endif
                                        </div>
                                        <div class="input-group-custom">
                                            <i class="fas fa-camera"></i>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Bio -->
                                    <div class="col-12">
                                        <label class="form-label">Bio</label>
                                        <div class="input-group-custom">
                                            <textarea name="bio" rows="3" class="form-control">{{ old('bio', $profile->bio) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <a href="{{ route('profile.show') }}" class="btn btn-secondary me-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary-custom px-5">
                                            <i class="fas fa-save me-2"></i> Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Profile Summary -->
                    <div class="col-lg-4">
                        <div class="glass-card text-center">
                            @if ($profile->avatar)
                                <img src="{{ Storage::url($profile->avatar) }}" class="avatar-preview mx-auto" alt="Avatar">
                            @else
                                <img src="{{ asset('assets/img/avatar.jpg') }}" class="avatar-preview mx-auto" alt="Default Avatar">
                            @endif
                            <h5 class="fw-bold mt-2">{{ $user->name }}</h5>
                            <p class="text-muted small">@ {{ $user->username }}</p>
                            <hr>
                            <div class="text-start">
                                <ul class="profile-info-list">
                                    <li><i class="fas fa-envelope"></i> {{ $user->email }}</li>
                                    <li><i class="fas fa-user-tag"></i> {{ ucfirst($user->role) }}</li>
                                    <li><i class="fas fa-school"></i> {{ $profile->school->name ?? 'Not set' }}</li>
                                    @if (old('role', $user->role) === 'student')
                                        <li><i class="fas fa-graduation-cap"></i> {{ $profile->classroom ?? 'Not set' }}</li>
                                    @endif
                                    <li><i class="fas fa-venus-mars"></i> {{ ucfirst($profile->gender) ?? 'Not set' }}</li>
                                    <li><i class="fas fa-birthday-cake"></i> {{ $profile->birthdate ?? 'Not set' }}</li>
                                    <li><i class="fas fa-phone-alt"></i> {{ $profile->phone ?? 'Not set' }}</li>
                                    @if (old('role', $user->role) === 'student')
                                        <li><i class="fas fa-users"></i> Guardian: {{ $profile->guardian_name ?? 'Not set' }}</li>
                                    @endif
                                    <li><i class="fas fa-align-left"></i> Bio: {{ $profile->bio ?? 'None' }}</li>
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
        padding: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-4px);
    }
    .card-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        border-left: 4px solid #6cbad9;
        padding-left: 1rem;
        margin-bottom: 1.5rem;
    }
    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.3rem;
        font-size: 0.9rem;
    }
    .input-group-custom {
        position: relative;
        margin-bottom: 1rem;
    }
    .input-group-custom i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6cbad9;
        font-size: 1rem;
        z-index: 2;
    }
    .form-control, .form-select {
        width: 100%;
        padding: 0.7rem 1rem 0.7rem 45px;
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        font-size: 0.95rem;
        transition: all 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6cbad9;
        box-shadow: 0 0 0 3px rgba(108,186,217,0.2);
        outline: none;
    }
    textarea.form-control {
        padding-top: 0.8rem;
    }
    .avatar-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #6cbad9;
        margin-bottom: 0.5rem;
    }
    .profile-info-list {
        list-style: none;
        padding: 0;
        margin-top: 1rem;
    }
    .profile-info-list li {
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }
    .profile-info-list i {
        width: 28px;
        color: #6cbad9;
    }
    .btn-primary-custom {
        background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        color: black;
        transition: all 0.3s;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(108,186,217,0.4);
    }
    .alert-glass {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1rem 1.5rem;
        border-left: 5px solid;
    }
    .alert-danger {
        background: rgba(248,215,218,0.9);
        border-left-color: #dc3545;
        color: #721c24;
    }
    @media (max-width: 768px) {
        .glass-card { padding: 1.2rem; }
        .card-title { font-size: 1.3rem; }
    }
</style>
@endsection
