@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
    <!-- banner area starts -->
    <section class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap privacy">
        <div class="container">
            <div class="imprint--banner--area--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                        {{ __("Get Support") }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{ __("Here to guide you every step of the way.") }}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset('frontend/images/support-banner.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- small steps area starts -->
    <section class="small--steps--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="small--steps--area--content get--support">
                <div data-aos="fade-up" data-aos-duration="500" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step1.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("Account") }}</p>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step2.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("Security") }}</p>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1100" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step3.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("House") }}</p>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1400" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step4.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("Legal") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- small steps area ends -->

    <!-- faq area starts -->
    <div class="section--bottom--gap">
        <x-faq></x-faq>
    </div>
    <!-- faq area ends -->

    <!-- special information starts -->
    <section class="special--information--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="special--information--content">
                <div data-aos="fade-up" data-aos-duration="600" class="text--area">
                    <p>{{ __("Can’t Find Your Answers?") }}</p>
                </div>

                <div data-aos="fade-up" data-aos-duration="700" class="btn--area">
                    <a href="#" class="btn--fill">
                        <span>{{ __("Live Chat") }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15"
                            fill="none">
                            <path d="M17.3959 7.70296L1.14587 7.70296" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.8419 1.17641L17.3961 7.70241L10.8419 14.2295" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <a href="{{route('frontend.contact')}}" class="btn--normal blank border">
                        <span>{{ __("Contact Us") }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                            fill="none">
                            <path d="M15.75 7.72607L0.75 7.72607" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="#010C0F" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- special information ends -->
@endsection
