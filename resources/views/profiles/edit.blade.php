<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Soma Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #6cbad9;
            --primary-dark: #1dafe9;
            --gradient: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(255, 255, 255, 0.3);
        }
        body {
            background: radial-gradient(circle at center, rgba(253, 224, 71, 0.4) 0%, rgba(3, 110, 178, 0.4) 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 2rem 0;
        }
        .profile-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Glassmorphism card */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            padding: 2rem;
        }
        .glass-card:hover {
            transform: translateY(-4px);
        }
        .card-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            border-left: 4px solid var(--primary);
            padding-left: 1rem;
            margin-bottom: 1.5rem;
        }
        /* Form controls */
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
            color: var(--primary);
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
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108,186,217,0.2);
            outline: none;
        }
        textarea.form-control {
            padding-top: 0.8rem;
        }
        /* Avatar upload */
        .avatar-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary);
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
            color: var(--primary);
        }
        .btn-primary-custom {
            background: var(--gradient);
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            color: white;
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
        /* Responsive */
        @media (max-width: 768px) {
            .glass-card { padding: 1.2rem; }
            .card-title { font-size: 1.3rem; }
        }
    </style>
</head>
<body>
<div class="profile-container">
    <div class="row g-4">
        <!-- Edit form column -->
        <div class="col-lg-8">
            <div class="glass-card">
                <h2 class="card-title">Edit Profile</h2>

                @if ($errors->any())
                    <div class="alert-glass alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                            <button class="btn btn-primary-custom px-5">
                                <i class="fas fa-save me-2"></i> <a href="/">Visit Home</a>
                            </button>
                            <button type="submit" class="btn btn-primary-custom px-5">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Profile summary column -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
