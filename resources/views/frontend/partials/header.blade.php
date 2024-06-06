<!-- header area starts -->
<header>
    <div class="container">
        <div class="header--content--wrapper">
            <!-- hamburger icon -->
            <div class="hamburger--icon">
                <span></span><span></span><span></span>
            </div>

            <!-- content area   -->
            <div class="content--area">
                <!-- logo -->
                <div class="logo">
                    <img src="{{ isset($systemSetting->logo) ? asset($systemSetting->logo) : asset('frontend/images/logo.svg') }}"
                        alt="" />
                    <p>{{ $systemSetting->system_name ?? 'TicketVilla' }}</p>
                </div>

                <!-- menu links -->
                <div class="menu--links">
                    <ul>
                        <li data-aos="fade-down" data-aos-duration="500">
                            <a href="{{ route('frontend.home') }}" class="{{ (Route::is('frontend.home') || Route::is('frontend./')) ? 'active' : '' }}">Home</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="800">
                            <a href="{{ route('frontend.about') }}" class="{{ Route::is('frontend.about')  ? 'active' : '' }}">About Us</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1000">
                            <a href="{{ route('frontend.how-it-works') }}" class="{{ Route::is('frontend.how-it-works')  ? 'active' : '' }}">How it Works</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1200">
                            <a href="{{ route('frontend.the-house') }}" class="{{ Route::is('frontend.the-house')  ? 'active' : '' }}">The House</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1400">
                            <a href="{{ route('frontend.contact') }}" class="{{ Route::is('frontend.contact')  ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- button area -->
            <div data-aos="fade-left" data-aos-duration="600" class="button--area">
                @if (Auth::user())
                    <a href="{{ route('user.dashboard') }}" class="profile">
                        <img src="{{ asset('user/images/profile.png') }}" alt="" />
                        <div>
                            <p>{{ Auth::user()->first_name }}</p>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="link">
                        <span>Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="btn--fill">
                        <span>Registration</span>
                    </a>
                @endif

                <a href="#" class="btn--fill blue--btn">
                    <span>Buy Now</span>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header area ends -->
