<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.backend.head')

<body>

    <!-- ======= Header ======= -->
    @include('includes.backend.header');
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('includes.backend.aside');
    <!-- End Sidebar-->

    {{-- Main start here --}}
    @yield('content')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('includes.backend.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    {{-- JS files here --}}
    @include('includes.backend.js')
    @stack('scripts')
    @include('components.alert')
</body>

</html>
