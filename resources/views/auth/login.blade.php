@extends('layouts.main3_frontend')

@section('title', 'Login - Soma Connect')

@section('content')
    <!-- Skeleton Loader -->
    <div id="skeleton">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <!-- Login Card Skeleton -->
                    <div class="skeleton-login-card">
                        <div class="text-center mb-4">
                            <div class="skeleton-loader mx-auto mb-3" style="width: 100px; height: 40px; border-radius: 10px;"></div>
                            <div class="skeleton-loader mx-auto mb-2" style="width: 150px; height: 30px;"></div>
                            <div class="skeleton-loader mx-auto" style="width: 200px; height: 20px;"></div>
                        </div>

                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                        <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                        <div class="skeleton-loader mb-3" style="width: 120px; height: 24px;"></div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="skeleton-loader" style="width: 100px; height: 20px;"></div>
                            <div class="skeleton-loader" style="width: 80px; height: 40px; border-radius: 50px;"></div>
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
                    <!-- Login Card -->
                    <div class="login-card">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('/assets/img/logo3.png') }}" alt="Soma Connect Logo" class="login-logo-img">
                        </div>

                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h2 class="login-title">Welcome Back!</h2>
                            <p class="login-subtitle">Sign in to continue your learning journey</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group mb-4">
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control"
                                           placeholder="Email Address"
                                           required
                                           autofocus
                                           autocomplete="username">
                                </div>
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-link">
                                            Forgot?
                                        </a>
                                    @endif
                                </div>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="••••••••"
                                           required
                                           autocomplete="current-password">
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility()">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Remember Me & Options -->
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember_me" name="remember" class="remember-checkbox">
                                    <label for="remember_me" class="remember-label">
                                        Remember me
                                    </label>
                                </div>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="register-link">
                                        <i class="fas fa-user-plus me-1"></i>Create Account
                                    </a>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="login-btn">
                                <span>Log In</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>

                        </form>
                    </div>

                    <!-- Footer Note -->
                    <p class="text-center mt-4 login-footer">
                        By signing in, you agree to our
                        <a href="/terms" class="footer-link">Terms</a> and
                        <a href="/privacy" class="footer-link">Privacy Policy</a>
                    </p>
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

        /* Login Card */
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 40px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        /* Logo */
        .login-logo-img {
            max-height: 60px;
            width: auto;
            margin-bottom: 1rem;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: #475569;
            font-size: 1rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-label i {
            color: #6cbad9;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6cbad9;
            font-size: 1rem;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 45px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.3s ease;
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
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #6cbad9;
        }

        /* Error Message */
        .error-message {
            display: block;
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        /* Success Alert */
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #16a34a;
            padding: 1rem;
            border-radius: 12px;
            font-size: 0.95rem;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-checkbox {
            width: 18px;
            height: 18px;
            accent-color: #6cbad9;
            margin-right: 8px;
        }

        .remember-label {
            color: #475569;
            font-size: 0.95rem;
            cursor: pointer;
        }

        /* Links */
        .forgot-link {
            color: #6cbad9;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #6cbad9;
            text-decoration: underline;
        }

        .register-link {
            color: #6cbad9;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            background: rgba(102, 126, 234, 0.2);
            color: #1dafe9;
        }

        /* Login Button */
        .login-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px  rgb(108, 186, 217);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgb(108, 186, 217);
        }

        .login-btn i {
            transition: transform 0.3s ease;
        }

        .login-btn:hover i {
            transform: translateX(5px);
        }

        /* Demo Credentials */
        .demo-credentials {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.2rem;
            border: 1px solid #e2e8f0;
        }

        .demo-title {
            color: #475569;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.8rem;
        }

        .demo-badges {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .demo-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.8rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            color: #1e293b;
            font-size: 0.85rem;
            font-family: monospace;
        }

        .demo-badge i {
            color: #6cbad9;
        }

        /* Alternative Login */
        .alternative-login {
            margin-top: 2rem;
        }

        .divider {
            position: relative;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
        }

        .divider-text {
            position: relative;
            background: rgba(255, 255, 255, 0.98);
            padding: 0 1rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 16px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 2px solid #e2e8f0;
            color: #1e293b;
        }

        .social-btn.google:hover {
            background: #ea4335;
            border-color: #ea4335;
            color: white;
        }

        .social-btn.facebook:hover {
            background: #1877f2;
            border-color: #1877f2;
            color: white;
        }

        .social-btn.github:hover {
            background: #333;
            border-color: #333;
            color: white;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .login-footer {
            color: #667eea;
            font-size: 0.9rem;
        }

        .footer-link {
            color: ;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        /* Skeleton Loader */
        .skeleton-login-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 40px;
            padding: 2.5rem;
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
            .login-card {
                padding: 2rem;
                margin: 1rem;
            }

            .login-title {
                font-size: 1.75rem;
            }

            .demo-badges {
                flex-direction: column;
            }

            .demo-badge {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 1.5rem;
            }

            .login-logo-img {
                max-height: 50px;
            }

            .social-login {
                flex-wrap: wrap;
            }
        }
    </style>

    <script>
        // Password visibility toggle
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

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

        // Hide skeleton loader after page load
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Add floating label effect (optional)
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('.input-icon').style.color = '#667eea';
                });

                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.querySelector('.input-icon').style.color = '#667eea';
                    }
                });
            });
        });
    </script>
@endsection
