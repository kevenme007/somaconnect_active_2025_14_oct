@extends('layouts.main3_frontend')

@section('title', 'Support SomaConnect')

@section('content')
    <!-- Skeleton Loader -->
    <div id="skeleton">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Header Skeleton -->
                    <div class="skeleton-header mb-4">
                        <div class="d-flex align-items-center">
                            <div class="skeleton-loader me-3" style="width: 50px; height: 50px; border-radius: 15px;"></div>
                            <div>
                                <div class="skeleton-loader mb-2" style="width: 200px; height: 30px;"></div>
                                <div class="skeleton-loader" style="width: 300px; height: 20px;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Skeleton -->
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="skeleton-form-card">
                                <div class="skeleton-loader mb-3" style="width: 200px; height: 30px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 60px;"></div>
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="skeleton-loader mb-3" style="width: 100%; height: 70px;"></div>
                                @endfor
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="skeleton-side-card">
                                <div class="skeleton-loader mb-3" style="width: 180px; height: 25px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 80px;"></div>
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="skeleton-loader mb-2" style="width: 90%; height: 20px;"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="soma-portal" id="main-content" style="display: none;">
        <div class="container-fluid px-4 py-4">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Portal Header -->
                    <div class="portal-header mb-5">
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="portal-logo me-3" style="background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);">
                                <i class="fas fa-hand-holding-heart fa-2x text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white mb-0 fw-bold">Support SomaConnect</h4>
                                <p class="text-white-50 mb-0 small">Help us transform education through your contribution</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Left Side: Support Form -->
                        <div class="col-lg-8">
                            <div class="support-form-card">
                                <h3 class="form-title">Make a Difference Today</h3>
                                <p class="form-description">
                                    Fill out the form below to let us know how you'd like to support SomaConnect.
                                    Every contribution, big or small, helps us empower more learners.
                                </p>

                                <form action="{{ route('support.submit') }}" method="POST" class="support-form">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName" class="form-label">First Name <span class="required-star">*</span></label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-user input-icon"></i>
                                                    <input type="text" name="first_name" id="firstName" class="form-control" placeholder="John" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName" class="form-label">Last Name <span class="required-star">*</span></label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-user input-icon"></i>
                                                    <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Doe" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email Address <span class="required-star">*</span></label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-envelope input-icon"></i>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="john@example.com" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone <span class="optional-text">(optional)</span></label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-phone-alt input-icon"></i>
                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="+255 XXX XXX XXX">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="supportType" class="form-label">How would you like to support? <span class="required-star">*</span></label>
                                                <div class="select-wrapper">
                                                    <i class="fas fa-hand-holding-heart select-icon"></i>
                                                    <select name="support_type" id="supportType" class="form-select" required>
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="skills">Offering Skills (Teaching, IT, etc.)</option>
                                                        <option value="resources">Donating Resources (Books, Devices, etc.)</option>
                                                        <option value="funds">Financial Support</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="details" class="form-label">Tell us more <span class="required-star">*</span></label>
                                                <div class="textarea-wrapper">
                                                    <i class="fas fa-comment textarea-icon"></i>
                                                    <textarea name="details" id="details" rows="5" class="form-control" placeholder="Please provide details about your support offer..." required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="submit-btn">
                                                <span>Submit Support Offer</span>
                                                <i class="fas fa-paper-plane ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right Side: Why Support & Ways to Help -->
                        <div class="col-lg-4">
                            <!-- Why Support Card -->
                            <div class="why-support-card mb-4">
                                <div class="card-header-gradient">
                                    <i class="fas fa-heart me-2"></i>
                                    <h4>Why Support Us?</h4>
                                </div>
                                <div class="card-body">
                                    <p class="support-message">
                                        Your support helps us empower students and teachers with digital tools,
                                        educational resources, and training opportunities across Tanzania and beyond.
                                    </p>
                                    <div class="impact-stats">
                                        <div class="stat-item">
                                            <span class="stat-number">5k+</span>
                                            <span class="stat-label">Students</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number">70+</span>
                                            <span class="stat-label">Teachers</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number">50+</span>
                                            <span class="stat-label">Resources</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ways to Support Card -->
                            <div class="ways-support-card">
                                <div class="card-header-gradient" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                                    <i class="fas fa-star me-2"></i>
                                    <h4>Ways to Help</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="support-ways-list">
                                        <li class="support-way-item">
                                            <span class="way-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                                <i class="fas fa-book"></i>
                                            </span>
                                            <div class="way-content">
                                                <strong>Donate Books & Materials</strong>
                                                <p>Textbooks, reference materials, and learning resources</p>
                                            </div>
                                        </li>
                                        <li class="support-way-item">
                                            <span class="way-icon" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                                                <i class="fas fa-laptop"></i>
                                            </span>
                                            <div class="way-content">
                                                <strong>Technical Expertise</strong>
                                                <p>IT support, software development, digital training</p>
                                            </div>
                                        </li>
                                        <li class="support-way-item">
                                            <span class="way-icon" style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);">
                                                <i class="fas fa-coins"></i>
                                            </span>
                                            <div class="way-content">
                                                <strong>Financial Support</strong>
                                                <p>Fund projects, sponsor students, support operations</p>
                                            </div>
                                        </li>
                                        <li class="support-way-item">
                                            <span class="way-icon" style="background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);">
                                                <i class="fas fa-hands-helping"></i>
                                            </span>
                                            <div class="way-content">
                                                <strong>Volunteer Time</strong>
                                                <p>Teaching, mentoring, content creation, outreach</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer-gradient">
                                    <p>Every contribution makes a difference!</p>
                                </div>
                            </div>

                            <!-- Contact Alternative -->
                            <div class="contact-alt-card mt-4">
                                <div class="d-flex align-items-center">
                                    <div class="alt-icon">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </div>
                                    <div class="alt-content">
                                        <h5>Prefer email?</h5>
                                        <p>Send us an email at</p>
                                        <a href="mailto:support@somaconnect.or.tz">support@somaconnect.or.tz</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        /* Portal Header - Fixed text colors */
        .portal-header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        }

        .portal-header h4 {
            color: white !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .portal-header p {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .portal-logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Support Form Card - Enhanced visibility */
        .support-form-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.8rem;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 2px;
        }

        .form-description {
            color: #475569;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        /* Form Elements - Highly visible */
        .form-group {
            margin-bottom: 0;
        }

        .form-label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
            display: block;
        }

        .required-star {
            color: #dc2626;
            margin-left: 2px;
        }

        .optional-text {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: normal;
            font-style: italic;
        }

        .input-wrapper,
        .select-wrapper,
        .textarea-wrapper {
            position: relative;
        }

        .input-icon,
        .select-icon,
        .textarea-icon {
            position: absolute;
            left: 16px;
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

        /* Form inputs - Now clearly visible */
        .form-control,
        .form-select {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 45px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #94a3b8;
            background: #f8fafc;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #6cbad9;
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .form-control::placeholder {
            color: #94a3b8;
            opacity: 0.8;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234f46e5' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
            padding-right: 44px;
        }

        textarea.form-control {
            padding-top: 1rem;
            min-height: 120px;
        }

        /* Submit Button - More prominent */
        .submit-btn {
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
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(79, 70, 229, 0.4);
        }

        .submit-btn i {
            transition: transform 0.3s ease;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        /* Why Support Card - Better contrast */
        .why-support-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header-gradient {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            color: white;
        }

        .card-header-gradient i {
            font-size: 1.2rem;
        }

        .card-header-gradient h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
        }

        .why-support-card .card-body {
            padding: 1.8rem;
        }

        .support-message {
            color: #334155;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-weight: 400;
        }

        .impact-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            text-align: center;
            background: #f8fafc;
            padding: 1rem;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .stat-item {
            padding: 0.5rem;
        }

        .stat-number {
            display: block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #6cbad9;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #475569;
            font-weight: 500;
        }

        /* Ways to Support Card - Better contrast */
        .ways-support-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .support-ways-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .support-way-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.2rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .support-way-item:last-child {
            border-bottom: none;
        }

        .way-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.2);
        }

        .way-icon i {
            font-size: 1.3rem;
            color: white;
        }

        .way-content {
            flex: 1;
        }

        .way-content strong {
            display: block;
            color: #1e293b;
            margin-bottom: 0.2rem;
            font-size: 1rem;
        }

        .way-content p {
            color: #475569;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.5;
        }

        .card-footer-gradient {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            padding: 1rem 1.5rem;
            text-align: center;
        }

        .card-footer-gradient p {
            margin: 0;
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Contact Alternative Card */
        .contact-alt-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .alt-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.2);
        }

        .alt-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .alt-content h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.2rem;
        }

        .alt-content p {
            font-size: 0.9rem;
            color: #475569;
            margin-bottom: 0.2rem;
        }

        .alt-content a {
            color: #6cbad9;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .alt-content a:hover {
            color: #6cbad9;
            text-decoration: underline;
        }

        /* Skeleton Loader */
        .skeleton-header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-form-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-side-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 30px;
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
        @media (max-width: 1200px) {
            .col-10 {
                width: 100%;
                padding: 0 15px;
            }
        }

        @media (max-width: 992px) {
            .support-form-card {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .portal-header {
                text-align: center;
            }

            .portal-header .d-flex {
                flex-direction: column;
                text-align: center;
            }

            .portal-logo {
                margin-right: 0 !important;
                margin-bottom: 1rem;
            }

            .form-title::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .form-title {
                text-align: center;
            }

            .form-description {
                text-align: center;
            }

            .support-way-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .contact-alt-card .d-flex {
                flex-direction: column;
                text-align: center;
            }

            .alt-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide skeleton and show main content after load
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Add loading state to form submission
            const supportForm = document.querySelector('.support-form');
            if (supportForm) {
                supportForm.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('.submit-btn');
                    submitBtn.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin ms-2"></i>';
                    submitBtn.disabled = true;
                });
            }
        });
    </script>
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
