@extends('frontend.app')

@section('title', 'How it Works')

@section('content')
    <!-- banner area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap how--it--works">
        <div class="container">
            <div class="about--us--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                      {{!empty($hero_section) ? $hero_section["title_".locale()] : __('Discover the Process')}}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{!empty($hero_section) ? $hero_section["description_".locale()] : __('Learn how you can win your dream house with just one ticket!')}}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/how-it-work-banner.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- the process area starts -->
    <section class="the--process--area--wrapper section--bottom--gap">
        <div class="container">
            <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                The Process
            </h3>

            <div class="the--process--area--content">
                <div class="single--process">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">We are officially starting the sale</h3>
                        <p class="subtext">
                            Tickets are now on sale globally, accepting a wide range of
                            payment methods including Euros, Dollars, and Cryptocurrency
                            to accommodate everyone's preferences.
                        </p>

                        <!-- featured content -->
                        <div class="featured--content">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">Ticket sale start</p>
                            <img src="{{ asset('frontend/images/process-icon1.png') }}" alt="" />

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">
                            A insider Dashboard for all your needs
                        </h3>
                        <p class="subtext">
                            Explore Exposés, purchase tickets, join our affiliate program
                            to earn money, view live statistics, news updates, and much
                            more. Our dedicated dashboard streamlines the entire process
                            for seamless management.
                        </p>

                        <a href="#" class="btn--fill blue--btn">
                            <span>Buy Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">All your needs</p>
                            <img src="{{ asset('frontend/images/process-icon2.png') }}" alt="" />

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">
                            Goal reached b the raffle is about to start!
                        </h3>
                        <p class="subtext">
                            Tickets are now on sale globally, accepting a wide range of
                            payment methods including Euros, Dollars, and Cryptocurrency
                            to accommodate everyone's preferences.
                        </p>

                        <a href="#" class="btn--fill blue--btn">
                            <span>Buy Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">15.000 tickets sold</p>
                            <img src="{{ asset('frontend/images/process-icon3.png') }}" alt="" />

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">20.000C Extra furniture voucher</h3>
                        <p class="subtext">
                            At this point, the fortunate winner will receive an additional
                            €20,000 furniture voucher along with the house! You might
                            think there are no more wishes left open. A luxurious house
                            for just €99, plus a €20,000 furniture voucher. What more
                            could one wish for?
                        </p>

                        <a href="#" class="btn--fill blue--btn">
                            <span>Buy Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content bonus">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">17.000 tickets sold</p>
                            <img src="{{ asset('frontend/images/process-icon4.png') }}" alt="" />
                            <p class="bonus--text">bonus</p>

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">Proven fair, legally secure</h3>
                        <p class="subtext">
                            Experience peace of mind with our raffle: proven fair and
                            legally secure. Enter for a chance to win your dream home!
                        </p>

                        <a href="#" class="btn--normal border blank">
                            <span>Learn More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">Good to Know</p>
                            <img src="{{ asset('frontend/images/process-icon5.png') }}" alt="" />

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn over--text">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">
                            The installation of an additional solar-heated covered pool
                        </h3>
                        <p class="subtext">
                            Yep! If we reach the goal of 20,000 sold tickets, the winner
                            will receive not only the house and the €20,000 voucher but
                            also the addition of a solar-heated, fully covered private
                            pool for you, your family, and friends to enjoy.
                        </p>

                        <a href="#" class="btn--normal border blank">
                            <span>Learn More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content bonus">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">20.000 tickets sold</p>
                            <img src="{{ asset('frontend/images/process-icon4.png') }}" alt="" />
                            <p class="bonus--text">bonus</p>

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">
                            Chance is <span class="gold-span">9332</span> Times Higher
                            than playing lottery
                        </h3>
                        <p class="subtext">
                            Experience peace of mind with our raffle: proven fair and
                            legally secure. Enter for a chance to win your dream home!
                        </p>

                        <a href="#" class="btn--normal border blank">
                            <span>Learn More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <!-- featured content -->
                        <div class="featured--content">
                            <div class="left--arrow"></div>
                            <div class="top--arrow"></div>
                            <p class="text">Live drawing</p>
                            <img src="{{ asset('frontend/images/process-icon6.png') }}" alt="" />

                            <div class="bottom--arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="single--process with--btn">
                    <div class="img--container">
                        <img src="{{ asset('frontend/images/single-process.png') }}" alt="" />
                    </div>
                    <div class="text--area">
                        <h3 class="main--text">
                            100% Transparency Guaranteed! The winner will be drawn live
                        </h3>
                        <p class="subtext">
                            Embrace complete transparency with us! Our commitment to
                            fairness means the winner will be drawn live on YouTube,
                            giving everyone the chance to witness the excitement. Don't
                            miss your opportunity to win big!
                        </p>

                        <div class="btn--wrapper">
                            <a href="#" class="btn--fill">
                                <span>Learn More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15"
                                    viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72559L0.75 7.72559" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="#" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15"
                                    viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- the process area ends -->

    <!-- faq area starts -->
    <section data-aos="fade-up" data-aos-duration="800" class="faq--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="text--area">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    Frequently Asked Questions
                </h3>
                <p data-aos="fade-up" data-aos-duration="800" class="subtext">
                    FAQs and answers on a particular topic you product on Residence
                </p>
            </div>
            <div class="faq--area--content">
                <div class="accordion" id="accordionExample">
                    @if ($faqs)
                        @foreach ($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        {{ $faq->question ?? ' ' }}
                                    </button>
                                </h2>
                                <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer ?? '' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- faq area ends -->
@endsection
