@extends('layouts.main3_frontend')

@section('title', 'Register - Soma Connect')

@section('content')
    <!-- Skeleton Loader -->
    <div id="skeleton">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <!-- Register Card Skeleton -->
                    <div class="skeleton-register-card">
                        <div class="text-center mb-4">
                            <div class="skeleton-loader mx-auto mb-3" style="width: 100px; height: 40px; border-radius: 10px;"></div>
                            <div class="skeleton-loader mx-auto mb-2" style="width: 150px; height: 30px;"></div>
                            <div class="skeleton-loader mx-auto" style="width: 200px; height: 20px;"></div>
                        </div>

                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="skeleton-loader" style="width: 120px; height: 24px;"></div>
                            <div class="skeleton-loader" style="width: 100px; height: 40px; border-radius: 50px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="soma-portal" id="main-content" style="display: none;">
        <div class="container-fluid px-4 py-5">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-5">
                    <!-- Register Card -->
                    <div class="register-card">
                        <!-- Logo -->
                        <div class="text-center mb-3">
                            <img src="{{ asset('/assets/img/logo3.png') }}" alt="Soma Connect Logo" class="register-logo-img">
                        </div>

                        <!-- Header -->
                        <div class="text-center mb-3">
                            <h2 class="register-title">Create Account</h2>
                            <p class="register-subtitle">Join Soma Connect today</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="register-form">
                            @csrf

                            <!-- Name -->
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">
                                    </i>Full Name
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon"></i>
                                    <input id="name"
                                           type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control"
                                           placeholder=""
                                           required
                                           autofocus
                                           autocomplete="name">
                                </div>
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">
                                   </i>Email Address
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control"
                                           placeholder=""
                                           required
                                           autocomplete="username">
                                </div>
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Role Selection -->
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">
                                    {{-- <i class="fas fa-user-tag me-2"></i> --}}
                                    Register As
                                </label>
                                <div class="select-wrapper">
                                    {{-- <i class="fas fa-crown select-icon"></i> --}}
                                    <select name="role" id="role" class="form-select" required>
                                        <option value="" disabled selected>-- Select Role --</option>
                                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    </select>
                                    <div class="select-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                @error('role')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">
                                    {{-- <i class="fas fa-lock me-2"></i> --}}
                                    Password
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="••••••••"
                                           required
                                           autocomplete="new-password">
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password')">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password Strength Indicator (Compact) -->
                            <div class="password-strength-mini mb-2" id="passwordStrength">
                                <div class="strength-bar-mini">
                                    <div class="strength-progress-mini" id="strengthProgress"></div>
                                </div>
                                <span class="strength-text-mini" id="strengthText">Enter password</span>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="form-label">
                                    {{-- <i class="fas fa-lock me-2"> --}}
                                        </i>Confirm Password
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input id="password_confirmation"
                                           type="password"
                                           name="password_confirmation"
                                           class="form-control"
                                           placeholder="••••••••"
                                           required
                                           autocomplete="new-password">
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation')">
                                        <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                                    </button>
                                </div>
                                <div class="password-match-indicator-mini" id="passwordMatchIndicator"></div>
                            </div>

                            <!-- Terms & Conditions (Compact) -->
                            {{-- <div class="terms-checkbox-mini mb-3">
                                <input type="checkbox" id="terms" name="terms" class="terms-input" required>
                                <label for="terms" class="terms-label">
                                    I agree to the <a href="/terms" class="terms-link">Terms</a> and <a href="/privacy" class="terms-link">Privacy</a>
                                </label>
                            </div> --}}

                            <!-- Register Button & Login Link -->
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('login') }}" class="login-link">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Login
                                </a>

                                <button type="submit" class="register-btn">
                                    <span>Sign Up</span>
                                    <i class="fas fa-user-plus ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer Note -->
                    {{-- <p class="text-center mt-3 register-footer">
                        By joining, you agree to our
                        <a href="/terms" class="footer-link">Terms</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>

    <style>
        /* SomaConnect Gradient Background */
        .soma-portal {
            min-height: 100vh;
            background: radial-gradient(circle at center, rgba(253, 224, 71, 0.4) 0%, rgba(3, 110, 178, 0.4) 100%) !important;
            position: relative;
        }

        /* Center content vertically */
        .min-vh-100 {
            min-height: 100vh;
        }

        /* Register Card - Same size as login */
        .register-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 40px;
            padding: 2rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        /* Logo */
        .register-logo-img {
            max-height: 50px;
            width: auto;
        }

        .register-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .register-subtitle {
            color: #475569;
            font-size: 0.95rem;
        }

        /* Form Elements - Compact */
        .form-group {
            margin-bottom: 0.5rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
            display: block;
        }

        .form-label i {
            color: #6cbad9;
            font-size: 0.8rem;
        }

        .input-wrapper,
        .select-wrapper {
            position: relative;
        }

        .input-icon,
        .select-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6cbad9;
            font-size: 0.9rem;
            z-index: 2;
        }

        /* Fix for select dropdown */
        .form-control,
        .form-select {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 40px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            font-size: 0.9rem;
            color: #1e293b;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
        }

        /* Custom select styling */
        .form-select {
            padding-right: 40px;
            background-image: none; /* Remove default arrow */
        }

        /* Custom arrow for select */
        .select-arrow {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6cbad9;
            font-size: 0.8rem;
            pointer-events: none;
            z-index: 2;
        }

        .form-select:hover {
            border-color: #94a3b8;
            background: #f8fafc;
        }

        .form-select:focus {
            outline: none;
            border-color: #6cbad9;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        /* Style for the first/default option */
        .form-select option:first-child {
            color: #94a3b8;
        }

        .form-select option {
            color: #1e293b;
            padding: 10px;
        }

        /* Regular input styling */
        .form-control {
            padding: 0.7rem 1rem 0.7rem 40px;
        }

        .form-control:hover {
            border-color: #94a3b8;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #6cbad9;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control::placeholder {
            color: #94a3b8;
            opacity: 0.8;
            font-size: 0.85rem;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0;
            z-index: 2;
            font-size: 0.9rem;
        }

        .password-toggle:hover {
            color: #6cbad9;
        }

        /* Error Message */
        .error-message {
            display: block;
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.2rem;
        }

        /* Password Strength Mini */
        .password-strength-mini {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.25rem;
        }

        .strength-bar-mini {
            flex: 1;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-progress-mini {
            height: 100%;
            width: 0%;
            background: #e2e8f0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-text-mini {
            font-size: 0.75rem;
            color: #64748b;
            min-width: 80px;
        }

        /* Password Match Indicator Mini */
        .password-match-indicator-mini {
            font-size: 0.75rem;
            margin-top: 0.2rem;
            min-height: 18px;
        }

        .password-match-indicator-mini.match {
            color: #22c55e;
        }

        .password-match-indicator-mini.no-match {
            color: #ef4444;
        }

        /* Terms Checkbox Mini */
        .terms-checkbox-mini {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: #f8fafc;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .terms-input {
            width: 16px;
            height: 16px;
            accent-color: #6cbad9;
        }

        .terms-label {
            color: #475569;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .terms-link {
            color: #6cbad9;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }

        .terms-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Links */
        .login-link {
            color: #6cbad9;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.4rem 1rem;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .login-link:hover {
            background: rgba(102, 126, 234, 0.2);
            color: #764ba2;
        }

        /* Register Button */
        .register-btn {
            padding: 0.7rem 1.8rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        .register-btn i {
            transition: transform 0.3s ease;
            font-size: 0.9rem;
        }

        .register-btn:hover i {
            transform: translateX(3px);
        }

        /* Footer */
        .register-footer {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }

        .footer-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #6cbad9;
            text-decoration: underline;
        }

        /* Skeleton Loader */
        .skeleton-register-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 40px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-loader {
            background: linear-gradient(90deg, rgba(255,255,255,0.2) 25%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0.2) 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-card {
                padding: 1.5rem;
                margin: 1rem;
            }

            .register-title {
                font-size: 1.6rem;
            }

            .d-flex.align-items-center.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }

            .login-link {
                width: 100%;
                text-align: center;
            }

            .register-btn {
                width: 100%;
            }
        }

        /* Fix for Firefox */
        @-moz-document url-prefix() {
            .form-select {
                text-indent: 0.01px;
                text-overflow: '';
            }
        }

        /* Fix for IE */
        .form-select::-ms-expand {
            display: none;
        }
    </style>

    <script>
        // Password visibility toggle
        function togglePasswordVisibility(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = fieldId === 'password'
                ? document.getElementById('togglePasswordIcon')
                : document.getElementById('toggleConfirmPasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Password strength checker
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthProgress = document.getElementById('strengthProgress');
            const strengthText = document.getElementById('strengthText');

            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password)
            };

            const strengthScore = Object.values(requirements).filter(Boolean).length;

            // Update strength bar
            let strengthPercentage = (strengthScore / 4) * 100;
            strengthProgress.style.width = strengthPercentage + '%';

            // Update strength bar color and text
            if (strengthScore === 0) {
                strengthProgress.style.background = '#e2e8f0';
                strengthText.textContent = 'Enter password';
                strengthText.style.color = '#64748b';
            } else if (strengthScore === 1) {
                strengthProgress.style.background = '#ef4444';
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#ef4444';
            } else if (strengthScore === 2) {
                strengthProgress.style.background = '#f59e0b';
                strengthText.textContent = 'Fair';
                strengthText.style.color = '#f59e0b';
            } else if (strengthScore === 3) {
                strengthProgress.style.background = '#3b82f6';
                strengthText.textContent = 'Good';
                strengthText.style.color = '#3b82f6';
            } else if (strengthScore === 4) {
                strengthProgress.style.background = '#22c55e';
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#22c55e';
            }
        }

        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const indicator = document.getElementById('passwordMatchIndicator');

            if (confirmPassword.length === 0) {
                indicator.textContent = '';
                indicator.className = 'password-match-indicator-mini';
            } else if (password === confirmPassword) {
                indicator.textContent = '✓ Passwords match';
                indicator.className = 'password-match-indicator-mini match';
            } else {
                indicator.textContent = '✗ Passwords do not match';
                indicator.className = 'password-match-indicator-mini no-match';
            }
        }

        // Hide skeleton loader after page load
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Add password strength checker
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    checkPasswordStrength();
                    checkPasswordMatch();
                });
            }

            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', checkPasswordMatch);
            }

            // Fix for select initial state
            const selectElement = document.getElementById('role');
            if (selectElement) {
                // Add a class to style the placeholder option
                if (selectElement.value === '') {
                    selectElement.classList.add('placeholder-option');
                }

                selectElement.addEventListener('change', function() {
                    if (this.value === '') {
                        this.classList.add('placeholder-option');
                    } else {
                        this.classList.remove('placeholder-option');
                    }
                });
            }
        });
    </script>
@endsection
