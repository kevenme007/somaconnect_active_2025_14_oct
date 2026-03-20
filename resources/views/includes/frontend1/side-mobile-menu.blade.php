<div class="side-mobile-menu">
    <div class="mobile-menu-header">
        <div class="logo">
            <img src="/assets3/images/logo/logo.png" alt="Soma Connect" height="35">
        </div>
        <div class="close-menu">
            <a href="javascript:void(0);"><span class="icon-clear"></span></a>
        </div>
    </div>

    <div class="mobile-menu-body">
        <ul class="mobile-menu-list">
            <li><a href="/">Home</a></li>
            <li><a href="/materials">Materials</a></li>
            <li class="has-submenu">
                <a href="#">Classrooms <span class="arrow"><i class="fas fa-chevron-down"></i></span></a>
                <ul class="submenu">
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
            <li class="has-submenu">
                <a href="#">About <span class="arrow"><i class="fas fa-chevron-down"></i></span></a>
                <ul class="submenu">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/faq">FAQ's</a></li>
                    <li><a href="/support">Support</a></li>
                </ul>
            </li>
        </ul>

        @auth
            <div class="mobile-user-info">
                <div class="user-name">
                    <i class="fas fa-user-circle"></i> {{ auth()->user()->username }}
                </div>
                <div class="user-links">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="mobile-btn">Dashboard</a>
                    @elseif(Auth::user()->role === 'teacher')
                        <a href="{{ route('dashboard.teacher') }}" class="mobile-btn">Dashboard</a>
                    @else
                        <a href="{{ route('dashboard.student') }}" class="mobile-btn">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mobile-btn logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <div class="mobile-auth-buttons">
                <a href="{{ route('login') }}" class="mobile-btn login-btn">Login</a>
                <a href="{{ route('register') }}" class="mobile-btn register-btn">Register</a>
            </div>
        @endauth
    </div>
</div>

<style>
    /* Mobile Menu Styles */
    .side-mobile-menu {
        position: fixed;
        top: 0;
        left: -350px;
        width: 300px;
        height: 100%;
        background: #fff;
        box-shadow: 2px 0 20px rgba(0,0,0,0.1);
        z-index: 1001;
        transition: left 0.3s;
        overflow-y: auto;
    }

    .side-mobile-menu.active {
        left: 0;
    }

    .mobile-menu-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .close-menu a {
        font-size: 20px;
        color: #333;
        text-decoration: none;
    }

    .mobile-menu-body {
        padding: 20px;
    }

    .mobile-menu-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-menu-list li {
        border-bottom: 1px solid #eee;
    }

    .mobile-menu-list a {
        display: block;
        padding: 15px 0;
        color: #333;
        text-decoration: none;
        font-weight: 500;
    }

    .mobile-menu-list li.has-submenu > a {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-menu-list .submenu {
        list-style: none;
        padding-left: 20px;
        display: none;
    }

    .mobile-menu-list .submenu.active {
        display: block;
    }

    .mobile-menu-list .submenu a {
        padding: 10px 0;
        font-weight: 400;
        color: #666;
    }

    .mobile-user-info {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .user-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    .user-name i {
        color: #4361ee;
        margin-right: 5px;
    }

    .mobile-btn {
        display: block;
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        text-align: center;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }

    .login-btn {
        background: #4361ee;
        color: #fff;
    }

    .login-btn:hover {
        background: #2f4ad0;
        color: #fff;
    }

    .register-btn {
        background: transparent;
        border: 1px solid #4361ee;
        color: #4361ee;
    }

    .register-btn:hover {
        background: #4361ee;
        color: #fff;
    }

    .logout-btn {
        background: #dc3545;
        color: #fff;
    }

    .logout-btn:hover {
        background: #c82333;
    }

    .body-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
    }

    .body-overlay.active {
        opacity: 1;
        visibility: visible;
    }
</style>

<script>
    $(document).ready(function() {
        // Toggle mobile menu
        $('.mobile-menubar').on('click', function() {
            $('.side-mobile-menu').addClass('active');
            $('.body-overlay').addClass('active');
        });

        $('.close-menu, .body-overlay').on('click', function() {
            $('.side-mobile-menu').removeClass('active');
            $('.body-overlay').removeClass('active');
        });

        // Toggle submenu
        $('.has-submenu > a').on('click', function(e) {
            e.preventDefault();
            $(this).next('.submenu').slideToggle();
            $(this).find('.arrow i').toggleClass('fa-chevron-down fa-chevron-up');
        });
    });
</script>
