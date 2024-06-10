    @extends('frontend.app')

    @section('title', 'About')

    @section('content')
        <!-- banner area starts -->
        <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap">
            <div class="container">
                <div class="about--us--banner--content">
                    <div class="left">
                        <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                            {{!empty($hero_section) ? $hero_section->title : 'Our Mission & Values'}}
                        </h3>
                        <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                            {{!empty($hero_section) ? $hero_section->description : 'At Ticket villa, we are dedicated to providing an opportunity
                            for everyone to win their dream home. With our Innovative raffle
                            system, we make homeownership accessible and exciting.'}}
                        </p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="600" class="right">
                        <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/about-banner-bg.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area ends -->

        <!-- mission area starts -->
        <section data-aos="fade-up" data-aos-duration="500" class="about--mission--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="about--mission--area--content">
                    <div class="left">
                        <img src="{{ asset('frontend/images/about-mission-bg.png') }}" alt="" />
                    </div>
                    <div class="right">
                        <h3 class="common--heading--title"> {{ __('about-page.the_mission') }}</h3>
                        <p class="subtext">
                            {{ __('about-page.the_mission_content') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- mission area ends -->

        <!-- business feature area starts -->
        <section data-aos-duration="600" data-aos="fade-up" class="business--feature--area--wrapper section--bottom--gap">
            <div class="container">
                <h3 class="common--heading--title">{{ __('about-page.our_values') }}</h3>
                <div class="business--feature--area--content">
                    <div data-aos="fade-up" data-aos-duration="500" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature1.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('about-page.secure') }}</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature2.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('about-page.legal') }}</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1100" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature3.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('about-page.fair') }}</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1300" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature4.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('about-page.real_opportunity') }}</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1500" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature5.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('about-page.cheap') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- business feature area ends -->

        <!-- our commitment area starts -->
        <section data-aos="fade-up" data-aos-duration="600" class="our--commitment--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="our--commitment--area--content">
                    <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                        {{ __('about-page.commitment_to_transparency_security_and_fairness') }}
                    </h3>

                    <p data-aos="fade-up" data-aos-duration="700" class="sub--text">
                        {{ __('about-page.security_and_fairness_content') }}
                    </p>

                    <a href="#" class="btn--fill">
                        <span>Join now</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                            fill="none">
                            <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <!-- our commitment area ends -->

        <!-- meet our team area starts -->
        <section class="meet--team--area--wrapper section--bottom--gap">
            <div class="container">
                <h3 data-aos="fade-up" data-aos-duration="500" class="common--heading--title">
                    {{ __('about-page.meet_our_team') }}
                </h3>
                <div class="meet--team--area--content">
                    @if ($teams)
                        @foreach ($teams as $team)
                            <div class="single--member">
                                <div class="img--area">
                                    <img src="{{ isset($team->image) ? asset($team->image) : asset('frontend/images/member1.png') }}"
                                        alt="" />
                                </div>

                                <div class="text--area">
                                    <p class="name">{{ $team->name }}</p>
                                    <p class="title">{{ $team->position }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- meet our team area ends -->

        <!-- special information starts -->
        <section class="special--information--area--wrapper section--bottom--gap">
            <div class="container">
                <div class="special--information--content">
                    <div data-aos="fade-up" data-aos-duration="600" class="text--area">
                        <p>
                            {{ __('about-page.contact_information') }}
                        </p>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="700" class="btn--area">
                        <a href="#" class="btn--fill">
                            <span>Contact us</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15"
                                fill="none">
                                <path d="M17.3959 7.70296L1.14587 7.70296" stroke="#fff" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.8419 1.17641L17.3961 7.70241L10.8419 14.2295" stroke="#fff"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- special information ends -->
    @endsection
