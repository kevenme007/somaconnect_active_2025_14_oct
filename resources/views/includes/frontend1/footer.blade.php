<footer class="footer-area">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo mb-3">
                            <img src="/assets3/images/logo/somaconnect.svg" alt="Soma Connect" height="200">
                        </div>
                        <p class="footer-description">
                            SomaConnect is your one‑stop digital platform for reading, learning, and sharing knowledge.
                            Access curated study materials, past papers, and reference books.
                        </p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/materials">Materials</a></li>
                            <li><a href="/past-papers">Past Papers</a></li>
                            <li><a href="/reference-books">Reference Books</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4>Resources</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('materials1') }}">Form 1</a></li>
                            <li><a href="{{ route('materials2') }}">Form 2</a></li>
                            <li><a href="{{ route('materials3') }}">Form 3</a></li>
                            <li><a href="{{ route('materials4') }}">Form 4</a></li>
                            <li><a href="{{ route('materials5') }}">Form 5</a></li>
                            <li><a href="{{ route('materials6') }}">Form 6</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4>Contact Info</h4>
                        <ul class="contact-info">
                            <li><i class="fas fa-map-marker-alt"></i> 123 Education Street, Nairobi</li>
                            <li><i class="fas fa-phone"></i> +254 700 123 456</li>
                            <li><i class="fas fa-envelope"></i> info@somaconnect.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="copyright-text">
                        Copyright © {{ date('Y') }} <a href="/about">Soma Connect</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="footer-bottom-links">
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/terms">Terms of Service</a></li>
                        <li><a href="/sitemap">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer Styles */
    .footer-area {
        background: #1a1a2e;
        color: #fff;
    }

    .footer-widgets {
        padding: 60px 0 40px;
    }

    .footer-widget h4 {
        font-size: 18px;
        margin-bottom: 25px;
        color: #fff;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-widget h4:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background: #6cbad9;
    }

    .footer-description {
        color: #a8b2c1;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .social-links {
        display: flex;
        gap: 10px;
    }

    .social-links a {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        transition: all 0.3s;
        text-decoration: none;
    }

    .social-links a:hover {
        background: #6cbad9;
        transform: translateY(-3px);
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: #a8b2c1;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-block;
    }

    .footer-links a:hover {
        color: #6cbad9;
        transform: translateX(5px);
    }

    .contact-info {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .contact-info li {
        color: #a8b2c1;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-info i {
        color: #6cbad9;
        width: 20px;
    }

    .copyright-area {
        background: rgba(0,0,0,0.2);
        padding: 20px 0;
    }

    .copyright-text {
        margin: 0;
        color: #a8b2c1;
    }

    .copyright-text a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .copyright-text a:hover {
        color: #6cbad9;
    }

    .footer-bottom-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: flex-end;
        gap: 20px;
    }

    .footer-bottom-links a {
        color: #a8b2c1;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-bottom-links a:hover {
        color: #fff;
    }

    @media (max-width: 767px) {
        .footer-bottom-links {
            justify-content: flex-start;
            margin-top: 15px;
        }
    }
</style>
