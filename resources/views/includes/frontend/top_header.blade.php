<div class="header-top-1">
    <div class="container">
        <div class="header-top-wrapper">
            <ul class="contact-list">
                <li>
                    <i class="fa-regular fa-phone"></i>
                    <a href="tel:+255712768627">+255 712 768627</a>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <a href="mailto:info@somaconnect.or.tz">info@somaconnect.or.tz</a>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <span>Mon - Fri : 9Am - 5Pm</span>
                </li>
            </ul>

            <ul class="list">
                <li><i class="fa-light fa-phone"></i><a href="/contact">Contact</a></li>
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
                        <i class="fa-light fa-user"></i> {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        @if (Auth::user()->role === 'admin')
                        <li><a class="dropdown-item text-dark" href="{{ route('dashboard') }}"> Dashboard</a></li>
                        @elseif (Auth::user()->role === 'teacher')
                        <li><a class="dropdown-item text-dark" href="{{ route('dashboard.teacher') }}"> Dashboard</a></li>
                        @elseif (Auth::user()->role === 'student')
                        <li><a class="dropdown-item text-dark" href="{{ route('dashboard.student') }}"> Dashboard</a></li>
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
                    <i class="fa-light fa-user"></i>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</div>