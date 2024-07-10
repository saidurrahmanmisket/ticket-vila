    @extends('frontend.app')

    @section('title', 'About')

    @section('content')
        <!-- banner area starts -->
        <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap">
            <div class="container">
                <div class="about--us--banner--content">
                    <div class="left">
                        <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                            {{ !empty($hero_section) ? $hero_section['title_' . locale()] ?? '' : __('Our Mission & Values') }}
                        </h3>
                        <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                            {!! !empty($hero_section) && !empty($hero_section['description_' . locale()]) ? substr($hero_section['description_' . locale()], 0, 300) . '...' : __('At Ticket villa, we are dedicated to providing an opportunity for everyone to win their dream home. With our Innovative raffle system, we make homeownership accessible and exciting.')  !!}
                        </p>
                        @if (
                        !empty($hero_section) &&
                            !empty($hero_section['description_' . locale()]) &&
                            strlen($hero_section['description_' . locale()]) > 300)
                            <a href="#" class="btn--normal border blank mt-4" data-bs-toggle="modal"
                               data-bs-target="#exampleModal">Read More</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $hero_section['description_' . locale()] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div data-aos="fade-left" data-aos-duration="600" class="right">
                        <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/about-banner-bg.png') }}"
                            alt="" />
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
                        <img src="{{ asset(!empty($the_mission) && !empty($the_mission->image) ? $the_mission->image : 'frontend/images/about-mission-bg.png') }}"
                            alt="" />
                    </div>
                    <div class="right">
                        <h3 class="common--heading--title">
                            {{ !empty($the_mission) ? $the_mission['title_' . locale()] ?? '' : __('The Mission') }}</h3>


                        <p class="subtext">
                            {!! !empty($the_mission) && !empty($the_mission['description_' . locale()]) ? substr($the_mission['description_' . locale()], 0, 300) . '...' :  __("Transforming home ownership dreams into reality with just a €99 ticket. Our house raffle is more than a chance to win; it's a step towards making owning a home accessible for everyone. Join the movement. Own your dream.")  !!}
                        </p>
                        @if (
                        !empty($the_mission) &&
                            !empty($the_mission['description_' . locale()]) &&
                            strlen($the_mission['description_' . locale()]) > 300)
                            <a href="#" class="btn--normal border blank mt-4" data-bs-toggle="modal"
                               data-bs-target="#exampleModal">Read More</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $the_mission['description_' . locale()] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
        <!-- mission area ends -->

        <!-- business feature area starts -->
        <section data-aos-duration="600" data-aos="fade-up" class="business--feature--area--wrapper section--bottom--gap">
            <div class="container">
                <h3 class="common--heading--title">{{ __('Our Values') }}</h3>
                <div class="business--feature--area--content">
                    <div data-aos="fade-up" data-aos-duration="500" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature1.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('Fairness') }}</p>
                        <p class="sub">
                            {{ __('We guarantee fair conditions for all participants and ensure that every draw and sales campaign is transparent and fair.') }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature2.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('Integrity') }}</p>
                        <p class="sub">
                            {{ __('We always act honestly, ethically, and responsibly and are committed to the highest standards in our draws.') }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1100" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature3.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('Customer Satisfaction') }}</p>
                        <p class="sub">
                            {{ __('Customer satisfaction is our top priority. We strive to exceed their expectations and provide an outstanding customer experience.') }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1300" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature4.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('Innovation') }}</p>
                        <p class="sub">
                            {{ __('We strive to offer innovative solutions and continuously improve our draws to provide the best to our customers.') }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1500" class="single--feature">
                        <div class="icon">
                            <img src="{{ asset('frontend/images/business-feature5.png') }}" alt="" />
                        </div>
                        <p class="title">{{ __('Community') }}</p>
                        <p class="sub">
                            {{ __('Together, we explore the wonderful Styria-Thermal Region with the help of the e-book and create a vibrant community. Plus, you have the chance to win your dream home!') }}
                        </p>
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
                        {{ !empty($the_transparency) ? $the_transparency['title_' . locale()] ?? '' : __('Our Commitment To Transparency, Security, And Fairness In The Raffle Process') }}
                    </h3>

                    <p data-aos="fade-up" data-aos-duration="700" class="sub--text">
                        {{ !empty($the_transparency) ? $the_transparency['description_' . locale()] ?? '' : __('At TicketVilla, we value transparency, security, and fairness. We ensure that every participant has the same chances of winning, and all draws are conducted according to the established rules and standards. Our transparent procedures and security measures provide a trustworthy and fair gaming experience for all.') }}
                    </p>

                    <a href="{{route('frontend.web-shop.buy-ebook')}}" class="btn--fill blue--btn">
                        <span>{{ __('Buy Now') }}</span>
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
                    {{ __('Meet Our Team') }}
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
                            {{ __('For more information about our company or if there any question please contact us') }}
                        </p>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="700" class="btn--area">
                        <a href="{{route('frontend.contact')}}" class="btn--fill">
                            <span>{{ __('Contact us') }}</span>
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
