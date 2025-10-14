<div class="side-mobile-menu bg-white pt-30 pb-30 pl-30 pr-30">
    <div class="close-icon float-end pt-10">
        <a href="javascript:void(0);"><span class="icon-clear"></span></a>
    </div>
    <div class="header-search-content pt-110">

    </div>
    <div class="mobile-menu"></div>
    <div class="menu-login pt-50 pb-200">
        <ul class="header-login d-flex justify-content-between border-bottom-gray">
            @auth
                <li>
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @elseif (Auth::user()->role === 'teacher')
                        <a href="{{ route('dashboard.teacher') }}">Dashboard</a>
                    @elseif (Auth::user()->role === 'student')
                        <a href="{{ route('dashboard.student') }}">Dashboard</a>
                    @endif
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login / Register</a></li>
                <li><a href="{{ route('register') }}"><span class="icon-users"></span></a></li>
            @endauth
        </ul>
    </div>

</div>