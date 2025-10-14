<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

@include('includes.frontend.head')

<body>
    <!-- Cursor follower -->
    <div class="cursor-follower"></div>

    <!-- Preloader start -->
    @include('includes.frontend.preloader')

    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Offcanvas Area start  -->
     <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="/">
                                <img src="/assets/img/logo3.png" alt="logo-img" style="width: 180px">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        To enhance the quality of education in schools by creating inclusive and nurturing
                        learning spaces, ensuring access to educational materials,<br><br> and facilitating skills
                        development,
                        coaching, and mentorship among the youth.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="index.html"> READ TZ Toure Drive 41 Oysterbay DSM
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:info@example.com"><span
                                            class="mailto:info@example.com">info@somaconnect.or.tz</span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="index.html"> Mon to Fri - Fri: 9 aM - 6 pM
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+2085550112">+255 721 768627</a>

                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <a href="/contact" class="theme-btn text-center">
                                Read More<i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            {{-- <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> --}}
                            <a href="https://x.com/read_tanzania" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/read_tanzania" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/in/read-tanzania-625918339" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/read_tz" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.tictoc.com/read_tanzania/" target="_blank"><i
                                    class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="offcanvas__overlay"></div>

    <!-- Top Header Section Start -->
    @include('includes.frontend.top_header')

    <!-- Sticky Header Section start  -->
    @include('includes.frontend.sticky_header')

    <!-- Main Header Section start  -->
    @include('includes.frontend.main_header')


    @yield('content')

    <!-- Footer Section start  -->
    @include('includes.frontend.footer')


    <!--<< All JS Plugins >>-->
    @include('includes.frontend.js')
    @stack('scripts')

</body>

</html>
