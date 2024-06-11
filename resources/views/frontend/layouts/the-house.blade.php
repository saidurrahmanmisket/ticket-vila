@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
    <!-- banner area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap the--house">
        <div class="container">
            <div class="about--us--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                        {{ !empty($hero_section) ? $hero_section['title_'.locale()] : __('The House') }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{ !empty($hero_section)
                            ? $hero_section['description_'.locale()]
                            : __('Welcome to i he House, where dreams come true. This stunning property offers the perfect blend of luxury, modern design, and spacious living. Enter our raffle for a chance to win this incredible home and make it your own.') }}
                    </p>

                    <div data-aos="fade-up" data-aos-duration="600" class="btn--wrapper">
                        <a href="#" class="btn--fill">
                            <span>{{ __("Join Now") }}</span>
                        </a>
                        <a href="#" class="btn--normal">
                            <span>{{ __('How does this work?') }}</span>
                        </a>
                    </div>
                </div>
                <div class="right image--holder">
                    <div class="single--row">
                        <div data-aos="fade-down" data-aos-duration="400" class="image">
                            <img src="{{ asset('frontend/images/the-house-banner1.png') }}" alt=""/>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="500" class="image">
                            <img src="{{ asset('frontend/images/the-house-banner2.png') }}" alt=""/>
                        </div>
                    </div>
                    <div class="single--row row2">
                        <div data-aos="fade-down" data-aos-duration="600" class="image">
                            <img src="{{ asset('frontend/images/the-house-banner3.png') }}" alt=""/>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="700" class="image">
                            <img src="{{ asset('frontend/images/the-house-banner4.png') }}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- inner padding section -->
    <section class="section--inner--padding">
        <!-- inside the house area starts -->
        <section class="house--image--grid--wrapper section--bottom--gap">
            <div class="container">
                <div class="top--part">
                    <div data-aos="fade-right" data-aos-duration="600" class="left">
                        <h3 class="common--heading--title">{{ __('Inside The House') }}</h3>
                        <p class="subtitle">
                            {{ __("Experience the thrill of winning a house through our raffle with just a 99€ ticket. Don't miss out on this incredible opportunity!") }}
                        </p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="700" class="right">
                        <a href="#" class="btn--normal border blank">
                            <span>Sign Up</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                 fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="#010C0F" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.70117 1.70149L15.7512 7.72549L9.70117 13.7505" stroke="#010C0F"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="image--grid">
                    @if($gift != null)
                        @if ($giftImages['insideImage'] && $giftImages['insideImage']->isNotEmpty())
                            @foreach ($giftImages['insideImage'] as $item)
                                <div class="img--holder">
                                    <img src="{{ asset($item->image) }}" alt=""/>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>

        </section>
        <!-- inside the house area ends -->

        <!-- outside the house area starts -->
        <section class="house--image--grid--wrapper section--bottom--gap">
            <div class="container">
                <div class="top--part">
                    <div data-aos="fade-right" data-aos-duration="600" class="left">
                        <h3 class="common--heading--title">{{ __('Outside The House') }}</h3>
                        <p class="subtitle">
                            {{ __("Experience the thrill of winning a house through our raffle with just a 99€ ticket. Don't miss out on this incredible opportunity!") }}
                        </p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="700" class="right">
                        <a href="#" class="btn--normal border blank">
                            <span>Join Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                 fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="#010C0F" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.70117 1.70149L15.7512 7.72549L9.70117 13.7505" stroke="#010C0F"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="image--grid">
                    @if($gift != null)
                    @if ($giftImages['outsideImage'] && $giftImages['outsideImage']->isNotEmpty())
                        @foreach ($giftImages['outsideImage'] as $item)
                            <div class="img--holder">
                                <img src="{{ asset($item->image) }}" alt=""/>
                            </div>
                        @endforeach
                    @endif
                    @endif
                </div>
            </div>
        </section>
        <!-- outside the house area ends -->

        <!-- the floor plan area starts -->
        <section class="house--image--grid--wrapper section--bottom--gap">
            <div class="container">
                <div class="top--part">
                    <div data-aos="fade-right" data-aos-duration="600" class="left">
                        <h3 class="common--heading--title">{{ __('The Floor Plan') }}</h3>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="700" class="right">
                        <a href="#" class="btn--normal border blank">
                            <span>Join Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                 fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="#010C0F" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.70117 1.70149L15.7512 7.72549L9.70117 13.7505" stroke="#010C0F"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="the--floor--plan--content">
                    <div data-aos="fade-up" data-aos-duration="400" class="single--floor">
                        <img src="{{ asset('frontend/images/floor-plan1.png') }}" alt=""/>
                    </div>
                    @if($gift != null)
                    @if ($giftImages['planImage'] && $giftImages['planImage']->isNotEmpty())
                        @foreach ($giftImages['planImage'] as $item)
                            <div data-aos="fade-up" data-aos-duration="400" class="single--floor">
                                <img src="{{ asset($item->image) }}" alt=""/>
                            </div>
                        @endforeach
                    @endif
                    @endif
                </div>
            </div>
        </section>
        <!-- the floor plan area ends -->
    </section>
    <!-- inner padding section -->

    <!-- house tour area starts -->
    <section class="house--tour--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="house--tour--area--content">
                <h3 class="title">{{ __('3D House Tour') }}</h3>

                <div class="area--wrapper">
                    <iframe
                        src="{{ $gift->video_link_outside ?? 'https://www.google.com/maps/embed?pb=!4v1716460175150!6m8!1m7!1sNY2kCM9GwhDdxMztNku49Q!2m2!1d47.03569798506084!2d16.01661381905965!3f16.892984!4f0!5f0.7820865974627469' }}"
                        width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt=""/>
                            </div>
                            <p>{{ __('Click To Start') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- house tour area ends -->

    <!-- property tour area starts -->
    <section class="house--tour--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="house--tour--area--content">
                <div class="top--part">
                    <h3 class="title">{{ __('3D Property View') }}</h3>
                    <a href="#" class="btn--normal blank border">
                        <span>Join Now</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                             fill="none">
                            <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.70117 1.70124L15.7512 7.72524L9.70117 13.7502" stroke="#010C0F"
                                  stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="area--wrapper">
                    <iframe
                        src="{{ $gift->video_link_outside ?? 'https://www.google.com/maps/embed?pb=!4v1716460175150!6m8!1m7!1sNY2kCM9GwhDdxMztNku49Q!2m2!1d47.03569798506084!2d16.01661381905965!3f16.892984!4f0!5f0.7820865974627469' }}"
                        width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt=""/>
                            </div>
                            <p>{{ __('Click To Start') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property tour area ends -->

    <!-- inner padding area starts -->
    <section class="section--inner--padding">
        <section class="highlights--section--wrapper section--bottom--gap">
            <div class="container">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    {{ __('Some Highlights') }}
                </h3>
                <div data-aos="fade-up" data-aos-duration="700" class="highlights--section--content">
                    @if($gift != null)
                    @if (
                        ($giftImages['insideImage'] && $giftImages['insideImage']->isNotEmpty()) ||
                            ($giftImages['outsideImage'] && $giftImages['outsideImage']->isNotEmpty()))
                        @php
                            $allImages = $giftImages['insideImage']
                                ->merge($giftImages['outsideImage'])
                                ->shuffle()
                                ->take(4);
                        @endphp

                        @foreach ($allImages as $image)
                            <div class="single--row">
                                <div class="img--holder">
                                    <img src="{{ asset($image->image) }}" alt=""/>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @endif

                </div>
                <div data-aos="fade-up" data-aos-duration="600" class="btn--wrapper">
                    <a href="#" class="btn--fill">
                        <span>Join Now</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                             fill="none">
                            <path d="M15.75 7.72571L0.75 7.72571" stroke="white" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.7002 1.70131L15.7502 7.72531L9.7002 13.7503" stroke="white" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </section>
    <!-- inner padding area ends -->
@endsection
