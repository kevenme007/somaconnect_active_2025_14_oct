@extends('layouts.main2_frontend')

@section('title')
@endsection

@section('content')
    <!--<< Faq Section Start >>-->
    <section class="faq-section fix section-padding">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row g-4">

                    <!-- Eror Section Start -->
                    <section class="Error-section section-padding fix">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div class="error-items">
                                        <h2 class="wow fadeInUp" data-wow-delay=".5s">
                                            <span>Oops!</span> Page not found
                                        </h2>
                                        <div class="error-image wow fadeInUp" data-wow-delay=".3s">
                                            <img src="assets/img/404.png" alt="img">
                                        </div>
                                        <p class="wow fadeInUp" data-wow-delay=".7s">The page you are looking for does not
                                            exist</p>
                                        <a href="/" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
                                            Back to Home Pages
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
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
