@extends('layouts.main2_frontend')

@section('title')
@endsection

@section('content')
    <!--<< Faq Section Start >>-->
    <section class="faq-section fix">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row g-4">
                    <!-- Contact Section Start -->
                    <section class="contact-section fix">
                        <div class="container">
                            <div class="contact-wrapper">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-5">
                                        <div class="contact-left-items">
                                            <div class="contact-info-area-2">
                                                <div class="contact-info-items mb-4">
                                                    <div class="icon">
                                                        <i class="icon-icon-10"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Call Us 7/24</p>
                                                        <h3>
                                                            <a href="tel:+255721768627">+255 721 768627</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="contact-info-items mb-4">
                                                    <div class="icon">
                                                        <i class="icon-icon-11"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Make a Quote</p>
                                                        <h3>
                                                            <a
                                                                href="mailto:info@somaconnect.or.tz">info@somaconnect.or.tz</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="contact-info-items border-none">
                                                    <div class="icon">
                                                        <i class="icon-icon-12"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Location</p>
                                                        <h3>
                                                            READ TZ Toure Drive 41 Oysterbay DSM </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="video-image">
                                                <img src="/assets/img/contact.jpg" alt="img"
                                                    style="width: 441px; height: 227px;">
                                                <div class="video-box">
                                                    <a href="https://www.youtube.com/watch?v=F5cnYQMqg3I"
                                                        class="video-btn ripple video-popup">
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="contact-content">
                                            <h2>Ready to Connect and Collaborate?</h2>
                                            <p>
                                                Whether you're an educator, institution, parent, or tech partner, Soma
                                                Connect is here to support your educational journey.
                                                Reach out to explore our solutions, request a demo, or simply share your
                                                ideas. Let’s work together to make learning more
                                                impactful, inclusive, and accessible for everyone. We’d love to hear from
                                                you!
                                            </p>
                                            <form action="{{ route('contact.submit') }}" id="contact-form" method="POST"
                                                class="contact-form-items">
                                                @csrf
                                                <div class="row g-4">
                                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                                        <div class="form-clt">
                                                            <span>Your name*</span>
                                                            <input type="text" name="name" id="name"
                                                                placeholder="Your Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                                        <div class="form-clt">
                                                            <span>Your Email*</span>
                                                            <input type="text" name="email" id="email123"
                                                                placeholder="Your Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                                        <div class="form-clt">
                                                            <span>Write Message*</span>
                                                            <textarea name="message" id="message" placeholder="Write Message" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 wow fadeInUp" data-wow-delay=".9s">
                                                        <button type="submit" class="theme-btn">
                                                            Send Message <i class="fa-solid fa-arrow-right-long"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br><br>
                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!--<< Map Section Start >>-->
                    <div class="map-section">
                        <div class="map-items">
                            <div class="googpemap">
                                {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
                                    style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                                <div style="text-decoration:none; overflow:hidden;max-width:100%;width:100%;height:800px;">
                                    <div id="my-map-display" style="height:100%; width:100%;max-width:100%;"><iframe
                                            style="height:100%;width:100%;border:0;" frameborder="0"
                                            src="https://www.google.com/maps/embed/v1/place?q=salt+restaurant&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                                    </div><a class="google-map-html" href="https://www.bootstrapskins.com/themes"
                                        id="get-data-for-map"></a>
                                    <style>
                                        #my-map-display img {
                                            max-width: none !important;
                                            background: none !important;
                                            font-size: inherit;
                                            font-weight: inherit;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
