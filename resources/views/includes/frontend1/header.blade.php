<header>
    <div id="header-sticky" class="header-area white-bg">
        <div class="header header-2 position-relative pl-35 pr-35">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-xl-2  col-lg-7 col-md-7 col-sm-7 col-8">
                        <div class="">
                            <div class="d-inline-block d-xl-none">
                                <a class="mobile-menubar" href="javascript:void(0);"><i class="fas fa-bars"></i></a>
                            </div>
                            <div class="logo float-end d-xl-none">
                                <a href="/"><img src="/assets3/images/logo/logo.png" alt="Soma Connect"></a>
                            </div>
                        </div>
                    </div><!-- /col -->
                    <div
                        class="col-xl-7 col-lg-1 col-md-1 col-sm-1 col-1 d-none d-lg-flex align-items-lg-center justify-content-lg-center position-static pr-0">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul class="d-block">
                                    <li>
                                        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                                    </li>

                                    <li class="full-mega-menu-position">
                                        <a href="/materials"
                                            class="{{ request()->is('materials*') ? 'active' : '' }}">Materials</a>
                                    </li>

                                    <li class="logo pl-10 pr-10 d-none d-xl-inline-block">
                                        <a href="/"><img src="/assets3/images/logo/logo.png"
                                                alt="Soma Connect"></a>
                                    </li>

                                    <li>
                                        <a href="#"
                                            class="{{ request()->is('materials1') || request()->is('materials2') || request()->is('materials3') || request()->is('materials4') || request()->is('materials5') || request()->is('materials6') ? 'active' : '' }}">
                                            Classrooms <i class="fas fa-chevron-down"
                                                style="font-size: 12px; margin-left: 5px;"></i>
                                        </a>
                                        <ul class="mega-menu mega-dropdown-menu">
                                            <li><a href="{{ route('materials1') }}"
                                                    class="{{ request()->routeIs('materials1') ? 'active' : '' }}">Form
                                                    1</a></li>
                                            <li><a href="{{ route('materials2') }}"
                                                    class="{{ request()->routeIs('materials2') ? 'active' : '' }}">Form
                                                    2</a></li>
                                            <li><a href="{{ route('materials3') }}"
                                                    class="{{ request()->routeIs('materials3') ? 'active' : '' }}">Form
                                                    3</a></li>
                                            <li><a href="{{ route('materials4') }}"
                                                    class="{{ request()->routeIs('materials4') ? 'active' : '' }}">Form
                                                    4</a></li>
                                            <li><a href="{{ route('materials5') }}"
                                                    class="{{ request()->routeIs('materials5') ? 'active' : '' }}">Form
                                                    5</a></li>
                                            <li><a href="{{ route('materials6') }}"
                                                    class="{{ request()->routeIs('materials6') ? 'active' : '' }}">Form
                                                    6</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="/contact"
                                            class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#"
                                            class="{{ request()->is('about') || request()->is('faq') || request()->is('support') ? 'active' : '' }}">
                                            About <i class="fas fa-chevron-down"
                                                style="font-size: 12px; margin-left: 5px;"></i>
                                        </a>
                                        <ul class="mega-menu mega-dropdown-menu">
                                            <li><a href="/about"
                                                    class="{{ request()->is('about') ? 'active' : '' }}">About Us</a>
                                            </li>
                                            <li><a href="/faq"
                                                    class="{{ request()->is('faq') ? 'active' : '' }}">FAQ's</a></li>
                                            <li><a href="/support"
                                                    class="{{ request()->is('support') ? 'active' : '' }}">Support</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </nav>
                        </div><!-- /main-menu -->
                    </div><!-- /col -->
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-4">
                        <div class="header-right d-flex justify-content-end">
                            <ul class="header-login d-none d-xl-block">

                                @auth
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" id="userDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
                                            <i class="fa-solid fa-user" style="color:black;"></i>
                                            {{ auth()->user()->username }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                            @if (Auth::user()->role === 'admin')
                                                <li><a class="dropdown-item text-dark"
                                                        href="{{ route('dashboard') }}">Dashboard</a></li>
                                            @elseif (Auth::user()->role === 'teacher')
                                                <li><a class="dropdown-item text-dark"
                                                        href="{{ route('dashboard.teacher') }}">Dashboard</a></li>
                                            @elseif (Auth::user()->role === 'student')
                                                <li><a class="dropdown-item text-dark"
                                                        href="{{ route('dashboard.student') }}">Dashboard</a></li>
                                            @endif

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-dark">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" data-bs-toggle="tooltip" data-selector="true"
                                            data-placement="bottom" title="Login / Register">
                                            {{-- <i class="fa-solid fa-users" style="color:black;"></i> --}}
                                            Login / Register
                                        </a>
                                    </li>
                                @endauth

                            </ul>
                        </div>
                    </div>

                    <!-- /col -->
                </div><!-- /row -->
            </div><!-- /container -->
        </div>
    </div><!-- /header-bottom -->
</header>
