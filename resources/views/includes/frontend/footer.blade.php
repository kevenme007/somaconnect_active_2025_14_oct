<footer class="footer-section footer-bg">
    <div class="container">
        <div class="contact-info-area">
            <div class="contact-info-items wow fadeInUp" data-wow-delay=".2s">
                <div class="icon">
                    <i class="icon-icon-5"></i>
                </div>
                <div class="content">
                    <p>Call Us</p>
                    <h3>
                        <a href="tel:+2085550112">+255 721 768627</a>
                    </h3>
                </div>
            </div>
            <div class="contact-info-items wow fadeInUp" data-wow-delay=".4s">
                <div class="icon">
                    <i class="icon-icon-6"></i>
                </div>
                <div class="content">
                    <p>Make a Quote</p>
                    <h3>
                        <a href="mailto:example@gmail.com">info@somaconnect.or.tz</a>
                    </h3>
                </div>
            </div>
            <div class="contact-info-items wow fadeInUp" data-wow-delay=".6s">
                <div class="icon">
                    <i class="icon-icon-7"></i>
                </div>
                <div class="content">
                    <p>Opening Hour</p>
                    <h3>
                        Mon to Fri - Fri: 9 aM - 6 pM
                    </h3>
                </div>
            </div>
            <div class="contact-info-items wow fadeInUp" data-wow-delay=".8s">
                <div class="icon">
                    <i class="icon-icon-8"></i>
                </div>
                <div class="content">
                    <p>Location</p>
                    <h3>
                        READ TZ Toure Drive 41 Oysterbay DSM
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widgets-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="/">
                                <img src="/assets/img/logo3.png" alt="logo-img" style="width: 200px">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                Soma Connect, a platform committed to enhancing education through technology. We provide
                                accessible learning resources, tools, and support to empower students, educators, and
                                communities. By combining innovative digital solutions with a focus on inclusive
                                learning, we strive to make education engaging, effective, and accessible for everyone.
                            </p>
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
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Resources</h3>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="/materials">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Books
                                </a>
                            </li>
                            <li>
                                <a href="/materials">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Past Papers
                                </a>
                            </li>
                            <li>
                                <a href="/materials">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Tutorials
                                </a>
                            </li>
                            <li>
                                <a href="/materials">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Quiz
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Classes</h3>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="/f1">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Form One
                                </a>
                            </li>
                            <li>
                                <a href="f2">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Form Two
                                </a>
                            </li>
                            <li>
                                <a href="f3">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Form Three
                                </a>
                            </li>
                            <li>
                                <a href="f4">
                                    <i class="fa-solid fa-chevrons-right"></i>
                                    Form Four
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Newsletter</h3>
                        </div>
                        <div class="footer-content">
                            <p>Sign up to get the latest updates.</p>
                            <form method="POST" action="{{ route('newsletter.subscribe') }}">
                                @csrf
                                <div class="footer-input">
                                    <input type="email" id="email2" name="email"
                                        placeholder="Enter Email Address" required>
                                    <button class="newsletter-btn" type="submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
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
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft" data-wow-delay=".3s">
                    © All Copyright {{ date('Y') }} by <a href="/">Soma Connect</a>
                </p>
                {{-- <ul class="brand-logo wow fadeInRight" data-wow-delay=".5s">
                    <li>
                        <a href="contact.html">
                            <img src="assets/img/visa-logo.png" alt="img">
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <img src="assets/img/mastercard.png" alt="img">
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <img src="assets/img/payoneer.png" alt="img">
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <img src="assets/img/affirm.png" alt="img">
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</footer>
