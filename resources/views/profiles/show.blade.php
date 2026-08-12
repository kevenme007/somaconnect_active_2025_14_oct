@extends('layouts.main3_frontend')

@section('title', 'My Profile')

@section('content')
<div class="soma-portal">
    <div class="container-fluid px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header -->
                <div class="portal-header mb-4">
                    <div class="d-flex align-items-center">
                        <div class="portal-logo me-3">
                            <i class="fas fa-user-circle fa-2x text-black"></i>
                        </div>
                        <div>
                            <h4 class="text-black mb-0 fw-bold">My Profile</h4>
                            <p class="text-black-50 mb-0 small">View your personal information</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card">
                    <div class="d-flex align-items-center mb-4">
                        <!-- Avatar -->
                        <div class="me-4">
                            @if ($profile && $profile->avatar)
                                <img src="{{ Storage::url($profile->avatar) }}"
                                    alt="User Avatar"
                                    class="rounded-circle border"
                                    style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatar.jpg') }}"
                                    alt="Default Avatar"
                                    class="rounded-circle border"
                                    style="width: 120px; height: 120px; object-fit: cover;">
                            @endif
                        </div>
                        <div>
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-muted mb-0">{{ ucfirst($user->role) }}</p>
                            <p class="text-muted">{{ $user->email }}</p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary-custom mt-2">
                                <i class="fas fa-edit"></i> Edit Profile
                            </a>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">Profile Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Username:</strong>
                            <p class="text-muted">{{ $user->username }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p class="text-muted">{{ $profile->phone ?? 'Not Provided' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Gender:</strong>
                            <p class="text-muted">{{ $profile?->gender ? ucfirst($profile->gender) : 'Not Specified' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Birth:</strong>
                            <p class="text-muted">{{ $profile->birthdate ?? 'Not Provided' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>School:</strong>
                            <p class="text-muted">{{ $profile->school->name ?? 'Not Assigned' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Grade/Class:</strong>
                            <p class="text-muted">{{ $profile->classroom ?? 'Not Assigned' }}</p>
                        </div>
                        @if($user->role === 'student')
                        <div class="col-md-6 mb-3">
                            <strong>Guardian Name:</strong>
                            <p class="text-muted">{{ $profile->guardian_name ?? 'Not Provided' }}</p>
                        </div>
                        @endif
                        <div class="col-md-12 mb-3">
                            <strong>Bio:</strong>
                            <p class="text-muted">{{ $profile->bio ?? 'No bio added yet.' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="text-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
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
    .btn-primary-custom {
        background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        color: black;
        transition: all 0.3s;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(108,186,217,0.4);
    }
</style>
@endsection
