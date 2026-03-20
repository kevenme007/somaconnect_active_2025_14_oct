@extends('layouts.main3_frontend')

@section('title', 'About Us - Soma Connect')

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
                            <div class="skeleton-content-card">
                                <div class="skeleton-loader mb-3" style="width: 150px; height: 30px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 100%; height: 20px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 100%; height: 20px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 95%; height: 20px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 100%; height: 20px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 90%; height: 20px;"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="skeleton-content-card">
                                <div class="skeleton-loader mb-3" style="width: 120px; height: 30px;"></div>
                                <div class="skeleton-loader mb-2" style="width: 100%; height: 200px;"></div>
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
                                <i class="fas fa-info-circle fa-2x text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-black mb-0 fw-bold">About Soma Connect</h4>
                                <p class="text-black-50 mb-0 small">Transforming education through technology and innovation</p>
                            </div>
                        </div>
                    </div>

                    <!-- About Content -->
                    <div class="row g-4 mb-5">
                        <!-- Main Content -->
                        <div class="col-lg-8">
                            <div class="about-main-card">
                                <h2 class="about-title">About Soma Connect</h2>
                                <div class="about-content">
                                    <p class="about-paragraph">
                                        Soma Connect is an innovative digital platform designed to transform the way
                                        education is delivered and accessed. At its core, Soma Connect is committed
                                        to leveraging technology to bridge educational gaps and create equal learning
                                        opportunities for all.
                                    </p>
                                    <p class="about-paragraph">
                                        We offer a robust selection of learning resources, powerful digital tools,
                                        and personalized support systems tailored for students, teachers, and educational
                                        institutions across different learning levels and environments. With a strong
                                        emphasis on accessibility, inclusivity, and interactivity, our platform makes
                                        learning engaging and effective—no matter where learners are located or what their
                                        background is.
                                    </p>
                                    <p class="about-paragraph">
                                        From interactive books and multimedia lessons to performance tracking and
                                        real-time collaboration, Soma Connect provides a comprehensive ecosystem that
                                        supports continuous academic growth and development. Our vision is to make
                                        high-quality education universally available, helping communities thrive and
                                        students reach their full potential.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Side Card -->
                        <div class="col-lg-4">
                            <div class="about-side-card">
                                <div class="side-card-image">
                                    <img src="/assets/img/about.png" alt="Soma Connect" class="img-fluid">
                                </div>
                                <div class="side-card-content">
                                    <h3 class="side-card-title">Soma Connect</h3>
                                    <p class="side-card-text">
                                        is a transformative digital platform designed to make education
                                        more engaging, accessible, and impactful. Our mission is to empower students
                                        and teachers by offering high-quality learning resources and innovative tools
                                        for better learning experiences.
                                    </p>
                                    <p class="side-card-text">
                                        We believe education should be inclusive and future-ready. With our platform,
                                        learners gain access to interactive resources, while educators benefit from
                                        smart tools to track and support student progress.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mission & Vision Cards -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="mission-card">
                                <div class="mission-icon">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h3 class="mission-title">Our Mission</h3>
                                <p class="mission-text">
                                    To empower learners and educators with accessible, innovative, and high-quality digital
                                    educational resources that foster academic excellence and lifelong learning.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vision-card">
                                <div class="vision-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="vision-title">Our Vision</h3>
                                <p class="vision-text">
                                    To create a world where quality education is universally accessible, enabling every
                                    learner to reach their full potential and contribute meaningfully to society.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Core Values Section -->
                    <div class="values-section mb-5">
                        <h2 class="section-title text-center mb-4">Our Core Values</h2>
                        <div class="row g-4">
                            <div class="col-md-3 col-sm-6">
                                <div class="value-card">
                                    <div class="value-icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h4 class="value-title">Inclusivity</h4>
                                    <p class="value-text">Education for everyone, everywhere</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-card">
                                    <div class="value-icon" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <h4 class="value-title">Innovation</h4>
                                    <p class="value-text">Embracing new ways to learn</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-card">
                                    <div class="value-icon" style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <h4 class="value-title">Accessibility</h4>
                                    <p class="value-text">Breaking down learning barriers</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-card">
                                    <div class="value-icon" style="background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h4 class="value-title">Collaboration</h4>
                                    <p class="value-text">Working together for success</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services/Features Section -->
                    <div class="services-section mb-5">
                        <h2 class="section-title text-center mb-4">What We Offer</h2>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <span class="flaticon-football-cup"></span>
                                    </div>
                                    <h5 class="service-title">Transforming Education</h5>
                                    <p class="service-text">Digital tools and resources to enhance learning experiences</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <span class="flaticon-target"></span>
                                    </div>
                                    <h5 class="service-title">Accessible Learning</h5>
                                    <p class="service-text">Inclusivity and accessibility for all learners</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <span class="flaticon-like"></span>
                                    </div>
                                    <h5 class="service-title">Engaging Tools</h5>
                                    <p class="service-text">Interactive resources and real-time collaboration</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <span class="flaticon-recommend"></span>
                                    </div>
                                    <h5 class="service-title">Building Partnerships</h5>
                                    <p class="service-text">Collaborating with organizations that share our vision</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partners Section -->
                    <div class="partners-section">
                        <h2 class="section-title text-center mb-4">Our Partners</h2>
                        <div class="partners-grid">
                            <div class="partner-card">
                                <img src="/assets/img/team/readtz.png" alt="READ Tanzania" class="partner-logo">
                            </div>
                            <div class="partner-card">
                                <img src="/assets/img/team/cordura.png" alt="Cordura" class="partner-logo">
                            </div>
                            <div class="partner-card">
                                <img src="/assets/img/team/karimjee.png" alt="Karimjee" class="partner-logo">
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

        /* About Main Card */
        .about-main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .about-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .about-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 2px;
        }

        .about-content {
            color: #4a5568;
            line-height: 1.8;
        }

        .about-paragraph {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }

        .about-paragraph:last-child {
            margin-bottom: 0;
        }

        /* About Side Card */
        .about-side-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .side-card-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .side-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .about-side-card:hover .side-card-image img {
            transform: scale(1.05);
        }

        .side-card-content {
            padding: 1.8rem;
        }

        .side-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 1rem;
        }

        .side-card-text {
            color: #666;
            line-height: 1.7;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .side-card-text:last-child {
            margin-bottom: 0;
        }

        /* Mission & Vision Cards */
        .mission-card,
        .vision-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            height: 100%;
            text-align: center;
            transition: all 0.3s ease;
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-5px);
        }

        .mission-icon,
        .vision-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .vision-icon {
            background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
        }

        .mission-icon i,
        .vision-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .mission-title,
        .vision-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 1rem;
        }

        .mission-text,
        .vision-text {
            color: #666;
            line-height: 1.7;
            margin: 0;
        }

        /* Core Values Section */
        .values-section {
            margin-top: 2rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 2rem;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .value-card:hover {
            transform: translateY(-5px);
        }

        .value-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6cbad9 0%, #1dafe9 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
        }

        .value-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .value-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 0.5rem;
        }

        .value-text {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Services Section */
        .services-section {
            margin-top: 2rem;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            margin-bottom: 1.2rem;
        }

        .service-icon span {
            font-size: 3rem;
            color: #6cbad9;
        }

        .service-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 0.8rem;
        }

        .service-text {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Partners Section */
        .partners-section {
            margin-top: 2rem;
            padding: 2rem 0;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            align-items: center;
            justify-items: center;
        }

        .partner-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .partner-card:hover {
            transform: translateY(-5px);
        }

        .partner-logo {
            max-width: 100%;
            height: auto;
            max-height: 80px;
            object-fit: contain;
        }

        /* Skeleton Loader */
        .skeleton-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skeleton-content-card {
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
            .about-main-card,
            .about-side-card {
                padding: 2rem;
            }

            .mission-card,
            .vision-card {
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

            .about-title::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .about-title,
            .side-card-title {
                text-align: center;
            }

            .partners-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .value-card,
            .service-card {
                padding: 1.5rem;
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
        });
    </script>
@endsection
