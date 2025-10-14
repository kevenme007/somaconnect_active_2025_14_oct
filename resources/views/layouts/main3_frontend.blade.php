<!DOCTYPE html>
<html lang="en">
@include('includes.frontend1.head')

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <div id="preloader"></div>
    <!--  ====== header-area-start=======================================  -->
    @include('includes.frontend1.header')
    <!--  header area end -->

    <!--  ====== header extra info start================================== -->
    <!-- side-mobile-menu start -->
    @include('includes.frontend1.side-mobile-menu')
    <!-- /side-mobile-menu -->
    <div class="body-overlay"></div>

    <main>

       @yield('content')

    </main>

    <!-- ====== footer-area-start ============================================= -->
    @include('includes.frontend1.footer')

    <!-- back top -->
    <div class="position-relative">
        <div class="top text-center border-gray2"><span class="icon-chevrons-up"></span></div>
    </div>
    <!-- ================= footer-area-end ===============  -->

    <!-- All js here -->
    <script src="/assets3/js/vendor/jquery.js"></script>
    <script src="/assets3/js/bootstrap.min.js"></script>
    <script src="/assets3/js/jquery.inputarrow.js"></script>
    <script src="/assets3/js/jquery.nice-select.min.js"></script>
    <script src="/assets3/js/slick.min.js"></script>
    <script src="/assets3/js/isotope.pkgd.min.js"></script>
    <script src="/assets3/js/plugins.js"></script>
    <script src="/assets3/js/countdown.min.js"></script>
    <script src="/assets3/js/jquery.meanmenu.min.js"></script>
    <script src="/assets3/js/main.js"></script>
    <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
