@extends('layouts.main3_frontend')

@section('title', 'Contact Us - Soma Connect')

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

                    <!-- Contact Form Skeleton -->
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="skeleton-contact-card">
                                <div class="skeleton-loader mb-3" style="width: 150px; height: 30px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 80px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 120px; height: 25px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 80%; height: 20px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 70%; height: 20px;"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="skeleton-contact-card">
                                <div class="skeleton-loader mb-3" style="width: 120px; height: 25px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 50px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 50px;"></div>
                                <div class="skeleton-loader mb-3" style="width: 100%; height: 120px;"></div>
                                <div class="skeleton-loader" style="width: 150px; height: 50px; border-radius: 50px;"></div>
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
                                <i class="fas fa-envelope fa-2x text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-black mb-0 fw-bold">Contact Us</h4>
                                <p class="text-black-50 mb-0 small">Get in touch with our team for any questions or support</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Grid -->
                    <div class="row g-4">
                        <!-- Contact Information -->
                        <div class="col-lg-5">
                            <div class="contact-info-card">
                                <h3 class="contact-info-title">Get in Touch</h3>
                                <p class="contact-info-description">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>

                                <div class="contact-details">
                                    <!-- Location -->
                                    <div class="contact-detail-item">
                                        <div class="detail-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h5>Dar es Salaam</h5>
                                            <p>Salt Restaurant, Drive 41 Oysterbay DSM<br>Open: 9:00 am – 6:00 pm</p>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="contact-detail-item">
                                        <div class="detail-icon" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h5>Email</h5>
                                            <p>
                                                <a href="mailto:admin@somaconnect.or.tz">admin@somaconnect.or.tz</a>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="contact-detail-item">
                                        <div class="detail-icon" style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h5>Phone</h5>
                                            <p>
                                                <a href="tel:+255721768627">+255 721 768 627</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Links -->
                                <div class="social-links">
                                    <h5 class="social-title">Follow Us</h5>
                                    <div class="social-icons">
                                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="col-lg-7">
                            <div class="contact-form-card">
                                <h3 class="form-title">Send a Message</h3>
                                <p class="form-description">Fill out the form below to get in touch with us.</p>

                                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                                    @csrf

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Your Name</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-user input-icon"></i>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="c-email" class="form-label">Email Address</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-envelope input-icon"></i>
                                                    <input type="email" class="form-control" name="email" id="c-email" placeholder="john@example.com" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone Number (Optional)</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-phone-alt input-icon"></i>
                                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="+255 XXX XXX XXX">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject" class="form-label">Subject</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-tag input-icon"></i>
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="How can we help?">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message" class="form-label">Your Message</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-comment input-icon" style="top: 20px;"></i>
                                                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Tell us more about your inquiry..." required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="submit-btn">
                                                <span>Send Message</span>
                                                <i class="fas fa-paper-plane ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="map-section mt-5">
                        <div class="map-card">
                            <div class="map-header">
                                <i class="fas fa-map-marked-alt me-2"></i>
                                <h5>Our Location</h5>
                            </div>
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed/v1/place?q=salt+restaurant+dar+es+salaam&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
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

        /* Portal Header */
        .portal-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .portal-logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        /* Contact Info Card */
        .contact-info-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .contact-info-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 1rem;
        }

        .contact-info-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .contact-details {
            margin-bottom: 2rem;
        }

        .contact-detail-item {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.8rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .contact-detail-item:hover {
            transform: translateX(5px);
            background: rgba(255, 255, 255, 0.8);
        }

        .detail-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .detail-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .detail-content h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 0.3rem;
        }

        .detail-content p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        .detail-content a {
            color: #6cbad9;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .detail-content a:hover {
            color: #764ba2;
        }

        /* Social Links */
        .social-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 1rem;
        }

        .social-icons {
            display: flex;
            gap: 0.8rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6cbad9;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .social-icon:hover {
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            transform: translateY(-3px);
        }

        /* Contact Form Card */
        .contact-form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .contact-form input, .contact-form textarea{
            border: 0.5px solid #1a1a1a;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 0.5rem;
        }

        .form-description {
            color: #666;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 0.5rem;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #1a2a3a;
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6cbad9;
            opacity: 0.7;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 45px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            font-size: 0.95rem;
            color: #1a2a3a;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #6cbad9;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            padding-top: 1rem;
        }

        textarea.form-control + .input-icon {
            top: 20px;
            transform: none;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn i {
            transition: transform 0.3s ease;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        /* Map Section */
        .map-section {
            margin-top: 2rem;
        }

        .map-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .map-header {
            padding: 1.2rem 2rem;
            background: rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
        }

        .map-header i {
            color: #6cbad9;
            font-size: 1.2rem;
        }

        .map-header h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a2a3a;
        }

        .map-container {
            height: 350px;
            width: 100%;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
        }

        /* Skeleton Loader */
        .skeleton-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-contact-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-loader {
            background: linear-gradient(90deg, rgba(255,255,255,0.1) 25%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0.1) 75%);
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
            .contact-info-card,
            .contact-form-card {
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

            .contact-detail-item {
                flex-direction: column;
                text-align: center;
            }

            .detail-icon {
                margin: 0 auto;
            }

            .social-icons {
                justify-content: center;
            }

            .map-container {
                height: 250px;
            }
        }

        /* Success/Error Message Styles (if you want to add) */
        .alert-success {
            background: rgba(72, 187, 120, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(72, 187, 120, 0.3);
            color: #2f855a;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .alert-error {
            background: rgba(245, 101, 101, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 101, 101, 0.3);
            color: #c53030;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide skeleton and show main content after load
            setTimeout(function() {
                document.getElementById('skeleton').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 500);

            // Add any additional contact form validation or AJAX submission here
            const contactForm = document.querySelector('.contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    // Optional: Add loading state
                    const submitBtn = this.querySelector('.submit-btn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin ms-2"></i>';
                    submitBtn.disabled = true;

                    // Form will submit normally, this just adds visual feedback
                    // Remove loading state after form submission (handled by page reload)
                });
            }
        });
    </script>
@endsection
