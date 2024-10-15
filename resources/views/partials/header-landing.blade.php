<header id="header" class="header fixed w-full">
    <div class="branding w-full flex">

        <div class="relative flex items-center justify-between w-full">
            <a href="index.html" class="logo container flex items-center pl-2">
                <h1 class="sitename">4M MOTORSHOP</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li class="dropdown">
                        <a class="toggle-dropdown"><span>{{ Auth::check() ? 'My Account' : 'Account' }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @if(Auth::check())
                                @if(Auth::user()->role_id == 1)
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                @else
                                    <li><a href="#">My Appointments</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}">Log out</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list lg:hidden"></i>
            </nav>
        </div>

    </div>

</header>
