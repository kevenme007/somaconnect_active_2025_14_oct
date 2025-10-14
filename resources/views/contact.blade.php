@extends('layouts.main3_frontend')

@section('title')
@endsection

@section('content')
    <main>

        <!-- ====== contact-form-area-start=============================================== -->
        <div class="contact-form-area over-hidden">
            <div class="container-wrapper pl-15 pr-15 pl-80 pr-80 pt-100 pb-100 bg-white">
                <div class="row">
                    <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12">
                        <div class="contact-form-left mb-30 pr-100">
                            <div class="section-title text-left pb-30">
                                <span class="secondary-color pb-2 d-block">Contact us</span>
                                <h2>Please get in touch with us </h2>
                            </div><!-- /section-title -->
                            <div class="contact-address pb-2">
                                <span class="blue-color">Dar es Salaam</span>
                                <p>Salt Restaurant, Drive 41 Oysterbay DSM<br> Open: 9:00 am – 6:00 pm</p>
                            </div>

                            <div class="contact-address">
                                <span class="blue-color">Contacts</span>
                                <p class="m-0">Email: admin@somaconnect.or.tz</p>
                                <p class="m-0">Phone: +255 721 768 627</p>
                            </div>
                        </div>
                    </div><!-- /col -->
                    <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12">
                        <div class="contact-form-right mb-30">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf

                                <span class="secondary-color pb-10 d-block">Write to us</span>
                                <div class="name mb-30">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name*" required>
                                </div>
                                <div class="email mb-30">
                                    <input type="email" class="form-control" name="email" id="c-email" placeholder="Email*" required>
                                </div>
                                <div class="comment mb-30">
                                    <textarea name="message" class="form-control" id="message"
                                        placeholder="Comments" required></textarea>
                                </div>
                                <button type="submit" class="btn form-control text-white transition">
                                    Send Message <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </form>
                        </div>
                    </div><!-- /col -->
                </div><!-- /row -->
            </div><!-- /container -->
        </div>
        <!-- contact-form-area-end -->

        <!-- ====== blog-area-start=============================================== -->
        <div class="contact-map position-relative">
            <div class="container-fluid px-0">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=salt&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

            </div>
            <!-- blog-area-end  -->

    </main>
@endsection
