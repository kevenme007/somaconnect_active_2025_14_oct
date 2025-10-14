@extends('layouts.main2_frontend')

@section('title')
@endsection

@section('content')
    <!--<< Faq Section Start >>-->
    <section class="faq-section fix">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row g-4">

                    <!-- About Section Start -->
                    <section class="about-section fix ">
                        <div class="container">
                            <div class="about-wrapper">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="about-image">
                                            <img src="/assets/img/about.png" alt="img">
                                            <div class="video-box">
                                                <a href="https://www.youtube.com/watch?v=F5cnYQMqg3I"
                                                    class="video-btn ripple video-popup">
                                                    <i class="fa-solid fa-play"></i>
                                                </a>
                                            </div>
                                        </div><br>

                                        <div class="about-image">
                                            <img src="/assets/img/about.png" alt="img">
                                            <div class="video-box">
                                                <a href="https://www.youtube.com/watch?v=F5cnYQMqg3I"
                                                    class="video-btn ripple video-popup">
                                                    <i class="fa-solid fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-content">
                                            <div class="section-title">
                                                <h2 class="wow fadeInUp" data-wow-delay=".3s">About Soma Connect</h2>
                                            </div>
                                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                                Soma Connect is an innovative digital platform designed to transform the way
                                                education is delivered and accessed.
                                                At its core, Soma Connect is committed to leveraging technology to bridge
                                                educational gaps and create equal learning
                                                opportunities for all. We offer a robust selection of learning resources,
                                                powerful digital tools, and personalized
                                                support systems tailored for students, teachers, and educational
                                                institutions across different learning levels and
                                                environments.
                                            </p>
                                            <p class="mt-3 wow fadeInUp" data-wow-delay=".7s">
                                                With a strong emphasis on accessibility, inclusivity, and interactivity, our
                                                platform makes learning engaging and
                                                effective—no matter where learners are located or what their background is.
                                                From interactive books and multimedia
                                                lessons to performance tracking and real-time collaboration, Soma Connect
                                                provides a comprehensive ecosystem that
                                                supports continuous academic growth and development.
                                            </p>
                                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                                We believe that technology should be more than a tool—it should be a bridge
                                                to knowledge, empowerment, and progress.
                                                That’s why we continuously evolve our offerings based on user feedback,
                                                educational trends, and emerging technologies.
                                                Whether in the classroom or learning remotely, Soma Connect gives educators
                                                the flexibility and insights needed to
                                                support each learner’s unique journey.
                                            </p>
                                            <p class="mt-3 wow fadeInUp" data-wow-delay=".7s">
                                                Our vision is to make high-quality education universally available, helping
                                                communities to thrive and students to reach
                                                their full potential. Through purposeful innovation, strategic partnerships,
                                                and a deep commitment to educational equity,
                                                Soma Connect is shaping a future where learning is limitless, impactful, and
                                                truly transformative for all.
                                            </p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Partiner Section Start -->
                    <section class="team-section fix section-padding pt-0 margin-bottom-30">
                        <div class="container">
                            <div class="section-title text-center">
                                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Our Partners</h2>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    We are proud to collaborate with organizations and institutions that share our vision of
                                    empowering education and innovation. <br>
                                    Together, we create meaningful impact and deliver greater value to the communities we
                                    serve.
                                </p>
                            </div>
                            <div class="array-button">
                                <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                                <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                            </div>
                            <div class="swiper team-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="team-box-items">
                                            <div class="team-image">
                                                <div class="thumb">
                                                    <img src="/assets/img/team/readtz.png" alt="img">
                                                </div>
                                                <div class="shape-img">
                                                    <img src="/assets/img/team/shape-img.png" alt="img">
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h6><a href="#">READ Tanzania</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="team-box-items">
                                            <div class="team-image">
                                                <div class="thumb">
                                                    <img src="/assets/img/team/cordura.png" alt="img" style="height: 60px">
                                                </div>
                                                <div class="shape-img">
                                                    <img src="/assets/img/team/shape-img.png" alt="img">
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h6><a href="#">Cordura</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="team-box-items">
                                            <div class="team-image">
                                                <div class="thumb">
                                                    <img src="/assets/img/team/karimjee.png" alt="img">
                                                </div>
                                                <div class="shape-img">
                                                    <img src="/assets/img/team/shape-img.png" alt="img">
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h6><a href="#">Karimjee</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </section>
@endsection
