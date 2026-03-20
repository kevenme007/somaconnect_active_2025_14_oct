<header>
    <div id="header-sticky" class="header-area">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets3/images/logo/somaconnect.svg" alt="Soma Connect" height="45">
                        </a>
                    </div>
                    <div class="mobile-menu-toggle d-lg-none">
                        <a href="javascript:void(0);"><i class="fas fa-bars"></i></a>
                    </div>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                            <li><a href="/materials" class="{{ request()->is('materials*') ? 'active' : '' }}">Materials</a></li>
                            <li class="has-dropdown">
                                <a href="#">Classrooms <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('materials1') }}">Form 1</a></li>
                                    <li><a href="{{ route('materials2') }}">Form 2</a></li>
                                    <li><a href="{{ route('materials3') }}">Form 3</a></li>
                                    <li><a href="{{ route('materials4') }}">Form 4</a></li>
                                    <li><a href="{{ route('materials5') }}">Form 5</a></li>
                                    <li><a href="{{ route('materials6') }}">Form 6</a></li>
                                </ul>
                            </li>
                            <li><a href="/past-papers">Past Papers</a></li>
                            <li><a href="/reference-books">Books</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li class="has-dropdown">
                                <a href="#">About <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/faq">FAQ's</a></li>
                                    <li><a href="/support">Support</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="header-right d-flex justify-content-end align-items-center">
                        @auth
                            <div class="user-dropdown dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle"></i>
                                    <span class="d-none d-md-inline">{{ auth()->user()->username }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if(Auth::user()->role === 'admin')
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @elseif(Auth::user()->role === 'teacher')
                                        <li><a class="dropdown-item" href="{{ route('dashboard.teacher') }}">Dashboard</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('dashboard.student') }}">Dashboard</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn-login">
                                <i class="fas fa-sign-in-alt"></i>
                                <span class="d-none d-md-inline">Login</span>
                            </a>
                            <a href="{{ route('register') }}" class="btn-register ms-2">
                                <span class="d-none d-md-inline">Register</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    /* Header Styles */
    .header-area {
        background: #fff;
        box-shadow: 0 2px 20px rgba(0,0,0,0.05);
        padding: 15px 0;
        transition: all 0.3s;
        position: relative;
        z-index: 1000;
    }

    .header-area.sticky {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        animation: slideDown 0.5s;
    }

    @keyframes slideDown {
        from { transform: translateY(-100%); }
        to { transform: translateY(0); }
    }

    .logo img {
        max-height: 45px;
    }

    .mobile-menu-toggle a {
        color: #333;
        font-size: 24px;
        margin-left: 15px;
    }

    /* Main Menu */
    .main-menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        justify-content: center;
    }

    .main-menu ul li {
        position: relative;
        margin: 0 5px;
    }

    .main-menu ul li a {
        color: #333;
        font-weight: 500;
        padding: 10px 15px;
        display: block;
        text-decoration: none;
        transition: all 0.3s;
        border-radius: 30px;
    }

    .main-menu ul li a:hover,
    .main-menu ul li a.active {
        color: #6cbad9;
        background: rgba(67, 97, 238, 0.1);
    }

    .main-menu ul li.has-dropdown > a {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .main-menu ul li .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-radius: 10px;
        padding: 10px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s;
        z-index: 100;
        border: none;
    }

    .main-menu ul li:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .main-menu ul li .dropdown-menu li {
        margin: 0;
    }

    .main-menu ul li .dropdown-menu a {
        padding: 8px 20px;
        border-radius: 0;
    }

    .main-menu ul li .dropdown-menu a:hover {
        background: rgba(67, 97, 238, 0.1);
        color: #6cbad9;
    }

    /* Header Right */
    .btn-login {
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 500;
        text-decoration: none;
        color: #6cbad9;
        border: 1px solid #6cbad9;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background: #6cbad9;
        color: #fff;
    }

    .btn-register {
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 500;
        text-decoration: none;
        background: #6cbad9;
        color: #fff;
        transition: all 0.3s;
        border: 1px solid #6cbad9;
    }

    .btn-register:hover {
        background: #6cbad9;
        color: #fff;
    }

    .user-dropdown .btn-link {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 15px;
    }

    .user-dropdown .btn-link:hover {
        color: #6cbad9;
    }

    .user-dropdown .btn-link i {
        font-size: 20px;
        margin-right: 5px;
    }

    .user-dropdown .dropdown-menu {
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-radius: 10px;
        padding: 10px 0;
    }

    .user-dropdown .dropdown-item {
        padding: 8px 20px;
        color: #333;
        transition: all 0.3s;
    }

    .user-dropdown .dropdown-item:hover {
        background: rgba(67, 97, 238, 0.1);
        color: #6cbad9;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .logo {
            float: left;
        }

        .mobile-menu-toggle {
            float: right;
        }
    }
</style>
