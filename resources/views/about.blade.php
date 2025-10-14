@extends('layouts.main3_frontend')

@section('title')
@endsection

@section('content')
    <main>
        <!-- ====== history-area-start=============================================== -->
        <div class="history-area pt-120 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container-inner pl-35 pr-35">
                            <div class="history-title section-title pl-140 pb-50">
                                <span class="secondary-color position-relative">About Us</span>
                                <h2 class="pt-10">About Soma Connect</h2>
                            </div>
                            <div class="history-content">
                                <p class="pb-30">
                                    Soma Connect is an innovative digital platform designed to transform the way
                                    education is delivered and accessed. At its core, Soma Connect is committed
                                    to leveraging technology to bridge educational gaps and create equal learning
                                    opportunities for all.
                                </p>
                                <p class="pb-30">
                                    We offer a robust selection of learning resources, powerful digital tools,
                                    and personalized support systems tailored for students, teachers, and educational
                                    institutions across different learning levels and environments. With a strong
                                    emphasis on accessibility, inclusivity, and interactivity, our platform makes
                                    learning engaging and effective—no matter where learners are located or what their
                                    background is.
                                </p>
                                <p>
                                    From interactive books and multimedia lessons to performance tracking and
                                    real-time collaboration, Soma Connect provides a comprehensive ecosystem that
                                    supports continuous academic growth and development. Our vision is to make
                                    high-quality education universally available, helping communities thrive and
                                    students reach their full potential.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== portfolio-area-start=============================================== -->
        <!-- ====== portfolio-area-start=============================================== -->
        <div class="portfolio-area over-hidden">
            <div class="container-wrapper pl-15 pr-15">
                <div class="row grid">
                    <!-- Left Side (Keep Big Image) -->
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 grid-item pl-10 pr-10">
                        <div class="single-portfolio mb-20 over-hidden">
                            <div class="portfolio-img">
                                <img class="img-zoom" src="/assets/img/about.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (Replace Small Image with Text) -->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 grid-item pl-10 pr-10">
                        <div class="p-3 bg-white shadow-sm rounded">
                            <h3 class="mb-3">Soma Connect</h3>
                            <p>
                                 is a transformative digital platform designed to make education
                                more engaging, accessible, and impactful. Our mission is to empower students
                                and teachers by offering high-quality learning resources and innovative tools
                                for better learning experiences.
                            </p>
                            <p>
                                We believe education should be inclusive and future-ready. With our platform,
                                learners gain access to interactive resources, while educators benefit from
                                smart tools to track and support student progress.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- ====== our-service-area-start ========================================= -->
        <div class="our-service mt-55 pb-85">
            <div class="container">
                <div class="container-inner pl-50 pr-50">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-md-0">
                            <div class="our-single-service text-center pb-35 mt-35 pl-10 pr-20 border-bottom border-right">
                                <div class="our-icon">
                                    <span class="flaticon-football-cup"></span>
                                </div>
                                <h5 class="pt-30 pb-10">Transforming Education</h5>
                                <p>We provide digital tools and resources to enhance learning experiences for students and
                                    educators.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-md-0">
                            <div class="our-single-service text-center pb-35 mt-35 pl-20 pr-10 border-bottom">
                                <div class="our-icon">
                                    <span class="flaticon-target"></span>
                                </div>
                                <h5 class="pt-30 pb-10">Accessible Learning</h5>
                                <p>Our platform ensures inclusivity and accessibility, empowering learners everywhere.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-md-0">
                            <div class="our-single-service text-center mb-35 pt-35 pl-10 pr-20 border-right">
                                <div class="our-icon">
                                    <span class="flaticon-like"></span>
                                </div>
                                <h5 class="pt-30 pb-10">Engaging Tools</h5>
                                <p>Interactive resources and real-time collaboration features make learning fun and
                                    effective.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-md-0">
                            <div class="our-single-service text-center mb-35 pt-35 pl-20 pr-10">
                                <div class="our-icon">
                                    <span class="flaticon-recommend"></span>
                                </div>
                                <h5 class="pt-30 pb-10">Building Partnerships</h5>
                                <p>We collaborate with organizations that share our vision of empowering education and
                                    innovation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== Partners Section (Brand Logos) ================================= -->
        <div class="brand-logo-area">
            <div class="container-wrapper pl-15 pr-15">
                <div class="brand-active border-gray-top">
                    <div class="single-brand pt-85 pb-85 pl-15 pr-15 d-flex justify-content-center">
                        <img src="/assets/img/team/readtz.png" alt="READ Tanzania">
                    </div>
                    <div class="single-brand pt-85 pb-85 pl-15 pr-15 d-flex justify-content-center">
                        <img src="/assets/img/team/cordura.png" alt="Cordura">
                    </div>
                    <div class="single-brand pt-85 pb-85 pl-15 pr-15 d-flex justify-content-center">
                        <img src="/assets/img/team/karimjee.png" alt="Karimjee">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection