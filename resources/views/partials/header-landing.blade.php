<header id="header" class="header fixed w-full">
    <div class="branding w-full flex">

        <div class="relative flex items-center justify-between w-full">
            <a href="/" class="logo container flex items-center pl-2">
                <h1 class="sitename">4M MOTORSHOP</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ request()->routeIs('welcome') ? '#hero' : '/' }}">Home</a></li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#about' : '/' }}">About</a></li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#services' : '/' }}">Services</a></li>
                    <li class="dropdown">
                        <a class="toggle-dropdown"><span>{{ Auth::check() ? 'My Account' : 'Account' }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @if(Auth::check())
                                @if(Auth::user()->role_id == 1)
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('customer.appointments.index')}}">My Appointments</a></li>
                                    <li><a href="{{route('customer.profile.edit')}}">Edit Profile</a></li>
                                @endif
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#contact' : '/' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list lg:hidden"></i>
            </nav>
        </div>

    </div>

</header>
