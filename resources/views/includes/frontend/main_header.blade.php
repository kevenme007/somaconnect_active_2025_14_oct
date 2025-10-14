<header class="header-1">
    <div class="mega-menu-wrapper p-0">
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <!-- LEFT SECTION: Logo + Nav -->
                    <div class="col-6 col-md-6 col-lg-10 col-xl-10 col-xxl-10">
                        <div class="header-left">
                            <div class="logo">
                                <a href="/" class="header-logo">
                                    <img src="/assets/img/logo3.png" alt="logo-img" style="width: 180px">
                                </a>
                            </div>
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu" class="d-flex">
                                        <ul>
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/materials">Materials</a></li>
                                            <li>
                                                <a href="#">Class Rooms <i class="fas fa-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{route('materials1')}}">Form 1</a></li>
                                                    <li><a href="{{route('materials2')}}">Form 2</a></li>
                                                    <li><a href="{{route('materials3')}}">Form 3</a></li>
                                                    <li><a href="{{route('materials4')}}">Form 4</a></li>
                                                    <li><a href="{{route('materials5')}}">Form 5</a></li>
                                                    <li><a href="{{route('materials6')}}">Form 6</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/support">Support</a></li>
                                            <li><a href="/faq">Faq's</a></li>
                                            <li><a href="/about">About</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT SECTION: Search + Icons -->
                    <div class="col-6 col-md-6 col-lg-2 col-xl-2 col-xxl-2">
                        <div class="header-right">
                            <div class="category-oneadjust gap-6 d-flex align-items-center">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-grid-2"></i>
                                </div>
                                <form action="{{ route('materials.search') }}" method="GET" class="search-toggle-box d-md-block">
                                    <div class="input-area">
                                        <input type="text" name="query" placeholder="Search for a study materials ..">
                                        <button class="cmn-btn">
                                            <i class="far fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="menu-cart">
                                <div class="header-humbager ml-30">
                                    <a class="sidebar__toggle" href="javascript:void(0)">
                                        <div class="bar-icon-2">
                                            <img src="/assets/img/icon/icon-13.svg" alt="img">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
