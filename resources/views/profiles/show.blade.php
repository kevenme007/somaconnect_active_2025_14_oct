@extends('layouts.main2_frontend')

@section('title', 'Student Profile')

@section('content')
<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Profile Card -->
            <div class="col-lg-8">
                <div class="card shadow-sm p-4">
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
                        </div>
                    </div>

                    <hr>

                    <!-- Profile Details -->
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
                            <p class="text-muted">{{ ucfirst($profile->gender) ?? 'Not Specified' }}</p>
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
                        <div class="col-md-6 mb-3">
                            <strong>Guardian Name:</strong>
                            <p class="text-muted">{{ $profile->guardian_name ?? 'Not Provided' }}</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <strong>Bio:</strong>
                            <p class="text-muted">{{ $profile->bio ?? 'No bio added yet.' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="text-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection