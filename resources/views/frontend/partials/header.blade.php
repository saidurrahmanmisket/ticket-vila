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
                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="" />
                    <p>TicketVilla</p>
                </div>

                <!-- menu links -->
                <div class="menu--links">
                    <ul>
                        <li data-aos="fade-down" data-aos-duration="500">
                            <a href="{{ route('frontend.home') }}" class="active">Home</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="800">
                            <a href="{{ route('frontend.about') }}">About Us</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1000">
                            <a href="{{ route('frontend.how-it-works') }}">How it Works</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1200">
                            <a href="{{ route('frontend.the-house') }}">The House</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1400">
                            <a href="{{ route('frontend.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- button area -->
            <div data-aos="fade-left" data-aos-duration="600" class="button--area">
                <a href="{{ route('frontend.login') }}" class="link">
                    <span>Login</span>
                </a>
                <a href="{{ route('frontend.sign-up') }}" class="btn--fill">
                    <span>Registration</span>
                </a>
                <a href="#" class="btn--fill blue--btn">
                    <span>Buy Now</span>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header area ends -->
