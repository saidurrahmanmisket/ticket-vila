@extends('frontend.app')

@section('title', 'Home')

@section('content')
    <!-- home banner area starts -->
    <section class="home--banner--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="home--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="500" class="main--text">
                        {{ !empty($hero_section) ? $hero_section['title_' . locale()] ?? '' : __('Dream house Raffle') }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="500" class="main--subtext">
                        {{ !empty($hero_section)
                            ? $hero_section['description_' . locale()] ?? ''
                            : __('Be the lucky owner of a dream home, win €850,000.00 for the purchase of a € 99.00 eBook') }}
                    </p>
                    <div data-aos="fade-up" data-aos-duration="900" class="btn--wrapper aos-init aos-animate">
                        <a href="{{ route('frontend.how-it-works') }}" class="btn--fill">
                            <span>{{ __('How does this work?') }}</span>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/home-hero-banner.png') }}"
                        alt="" />
                    <!-- <video autoplay loop src="./assets/videos/ticketvilla EN.mp4"></video> -->
                    <!-- <iframe
                                      src="https://player.vimeo.com/video/950150289?h=a62df445a8"
                                      width="640"
                                      height="360"
                                      frameborder="0"
                                      allow="autoplay; fullscreen; picture-in-picture"
                                      allowfullscreen
                                    ></iframe>
                                    <p>
                                      <a href="https://vimeo.com/950150289">ticketvilla-en</a> from
                                      <a href="https://vimeo.com/user220176202">mashfikur rahman</a>
                                      on <a href="https://vimeo.com">Vimeo</a>.
                                    </p> -->
                </div>

                <!-- live statistics wrapper -->
                <div data-aos="fade-up" data-aos-duration="800" class="live--statistics--wrapper">
                    <p class="intro">{{ __('Live Statistics') }}</p>
                    <x-user.live-ticket-statistics />
                </div>
            </div>
        </div>
    </section>
    <!-- some facts area starts -->
    <section class="some--facts--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="some--facts--area--content">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    {{ __('Here are some facts.') }}
                </h3>

                <div class="facts--wrapper">
                    {{-- @dd($gift) --}}
                    @if ($gift != null)
                        @if ($gift->giftFeaturedItem && $gift->giftFeaturedItem->isNotEmpty())
                            @foreach ($gift->giftFeaturedItem as $item)
                                <div data-aos="fade-up" data-aos-duration="500" class="single--facts">
                                    <div class="icon">
                                        <img src="{{ asset($item->image) }}" alt="" />
                                    </div>

                                    <div class="text--wrapper">
                                        @if (is_numeric($item['title_' . locale()]))
                                            <p class="main">
                                                <span>
                                                    {{ intval($item['title_' . locale()]) }}
                                                </span>
                                            </p>
                                        @else
                                            <h3 class="fw-bold">

                                                {{ $item['title_' . locale()] }}
                                            </h3>
                                        @endif
                                        <p class="sub">{{ $item['sub_title_' . locale()] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- some facts area ends -->

    <!-- home chance area starts -->
    <section class="home--chance--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="home--chance--area--content">
                <div class="top--area">
                    <div data-aos="fade-up" data-aos-duration="600" class="left">
                        <h3 class="common--heading--title">
                            {{ __('Experience Your new home') }}
                        </h3>

                        <p class="sub--text">
                            {{ __("Your dream home is just a click away! Purchase our e-book and you'll automatically be entered into the raffle to win a house worth €850,000 in Söchau. Don't hesitate, discover the house and secure your ticket to the wonderful world of Styria by purchasing our e-book.") }}
                        </p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800" class="right">
                        <a href="{{route('frontend.the-house')}}" class="btn--fill">
                            <span>{{ __('Learn More') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="transparent">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" fill="transparent" />

                                <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" fill="transparent" />
                            </svg>
                        </a>
                        @if(empty(Auth::user()))
                            <a href="{{ route('register') }}" class="btn--fill blue--btn">
                                <span>{{ __('Sign Up') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                     fill="none">
                                    <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white"
                                          stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- slider area -->
                <div class="home--chance--slider">

                    @if (isset($giftRandomImages) && $giftRandomImages)
                        <div class="owl-carousel owl-theme">
                            @foreach ($giftRandomImages as $item)
                                <div class="item">
                                    <div class="single--card">
                                        <img class="cover--img" src="{{ $item->image ? asset($item->image) : asset('frontend/images/single-chance1.png') }}"
                                            {{-- facts1.svg') }} --}} alt="" />

                                        {{-- <div class="overlay"></div> --}}

                                        <div class="content">
                                            <div class="icon">
                                                <img src="{{ asset('frontend/images/chance-icon1.png') }}"
                                                    alt="" />
                                            </div>
                                            <p class="text">{{ $item->gift_image_type ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </section>
    <!-- home chance area ends -->

    <!-- the process area starts -->
    <x-frontend.the-process :theProcess="$theProcess" />
    <!-- the process area ends -->

    <!-- ticket chance area starts -->
    <section class="ticket--chance--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="ticket--chance--area--content">
                <div class="ticket--img--holder">
                    <div class="img--box">
                        <img class="ticket1"
                             src="{{ asset(!empty($ticket_chance) ? $ticket_chance->image : 'frontend/images/ticket-main.png') }}"
                             alt=""/>
                        <img class="ticket2"
                             src="{{ asset(!empty($ticket_chance) ? $ticket_chance->image : 'frontend/images/ticket-main.png') }}"
                             alt=""/>
                        <img class="ticket3"
                             src="{{ asset(!empty($ticket_chance) ? $ticket_chance->image : 'frontend/images/ticket-main.png') }}"
                             alt=""/>
                    </div>

                    <div class="base--holder">
                        <img src="{{ asset('frontend/images/base-circle.svg') }}" alt="" />
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="700" class="text--holder">
                    <h3 class="common--heading--title">{{ !empty($ticket_chance) ? $ticket_chance['title_'.locale()] ?? '' : __('Don’t miss out!') }}</h3>
                    <p class="subtext">
                        {{ !empty($ticket_chance) ? $ticket_chance['description_'.locale()] ?? '' : __("Don't miss your chance to win your dream home! With just one e-book purchase, you can participate in the house raffle and pave your way to homeownership. Our raffles are transparent, fair, and offer everyone an equal chance. Take advantage of this opportunity and join today!") }}
                    </p>

                    <a href="{{route('frontend.rules')}}"
                       class="gold--link">{{ !empty($ticket_chance) ? $ticket_chance['sub_title_'.locale()] ?? '' : __('This ticket can change your life.') }}</a>

                    <div class="btn--wrapper">
                        <a href="{{route('user.buy-tickets')}}" class="btn--fill blue--btn">
                            <span>{{ __('Buy Now') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        {{--                        <a href="{{route('frontend.the-house')}}" class="btn--normal border blank">--}}
                        {{--                            <span>{{ __('See More') }}</span>--}}
                        {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"--}}
                        {{--                                fill="none">--}}
                        {{--                                <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5"--}}
                        {{--                                    stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{--                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F"--}}
                        {{--                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{--                            </svg>--}}
                        {{--                        </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ticket chance area ends -->

    <!-- spin area starts -->
    <section data-aos="fade-up" data-aos-duration="600" class="spin--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="spin--area--content">
                <h3 class="main">{{ !empty($wit_spin) ? $wit_spin['title_'.locale()] ?? '' : __('Win yours') }}</h3>
                <h3 class="main gold--text">{{ !empty($wit_spin) ? $wit_spin['sub_title_'.locale()] ?? '' : __("Dream Home") }}</h3>

                <a href="{{route('user.buy-tickets')}}" class="btn--fill blue--btn">
                    <span>{{ __('Buy Now') }}</span>
                </a>
            </div>
        </div>

        <!-- spinner -->
        <div class="spinner--holder">
            <img class="spin" src="{{ asset('frontend/images/spinner.png') }}" alt="" />

            <!-- spinner pointer -->
            <div class="pointer">
                <img src="{{ asset('frontend/images/spinner-pointer.svg') }}" alt="" />
            </div>
        </div>
    </section>
    <!-- spin area ends -->

    <!-- small steps area starts -->
    <section class="small--steps--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="small--steps--area--content">
                <div data-aos="fade-up" data-aos-duration="500" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step1.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __('Buy e-books') }}</p>
                        <p class="sub">{{ __('You automatically enter the raffle') }}</p>
                    </div>

                    <!-- id -->
                    <div class="id">
                        <img src="{{ asset('frontend/images/01.svg') }}" alt="" />
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step2.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __('Get tickets') }}</p>
                        <p class="sub">{{ __('You’ll get one ticket per e-book') }}</p>
                    </div>
                    <!-- id -->
                    <div class="id"><img src="{{ asset('frontend/images/02.svg') }}" alt="" /></div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1100" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step3.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("Live draw") }}</p>
                        <p class="sub">{{ __('Follow the draw live') }}</p>
                    </div>
                    <!-- id -->
                    <div class="id"><img src="{{ asset('frontend/images/03.svg') }}" alt="" /></div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1400" class="single--step">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/small-step4.svg') }}" alt="" />
                    </div>

                    <div class="text">
                        <p class="main">{{ __("Take the keys") }}</p>
                        <p class="sub">{{ __("The costs are covered - sign and live!") }}</p>
                    </div>
                    <!-- id -->
                    <div class="id"><img src="{{ asset('frontend/images/04.svg') }}" alt="" /></div>
                </div>
            </div>
        </div>
    </section>
    <!-- small steps area ends -->

    <!-- special features area starts -->
    <section class="home--special--feature--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="home--special--feature--content">
                <div data-aos="fade-right" data-aos-duration="600" class="single--feature">
                    <h3 class="big--text">€{{ __('850.000€ dream home for just 99€!') }} </h3>
                    <p class="big--para">{{ __("no hidden additional costs!") }}</p>
                </div>
                <div data-aos="fade-left" data-aos-duration="900" class="single--feature">
                    <p class="gold--text">100%</p>
                    <p class="gold--para">{{ __("Real!") }}</p>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="single--feature common">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/feature--book.svg') }}" alt="" />
                    </div>
                    <div>
                        <p class="title">{{ __("Notarized") }}</p>
                        <p class="sub--title">{{ __("The costs are covered - sign and move in!") }}</p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="900" class="single--feature common">
                    <div>
                        <p class="title">{{ __("Just 99€") }}€</p>
                        <p class="sub--title">{{ __("Per Ticket, the winner gets the house") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- special features area ends -->

    <!-- house tour area starts -->
    <section class="house--tour--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="house--tour--area--content">
                <h3 class="title">{{ __("Visit Your new Home") }}</h3>

                <div class="area--wrapper">
                    @if(!empty($houseTour) && !empty($houseTour->link))
                        <iframe
                                src="{{$houseTour->link}}"
                                width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @elseif(empty($houseTour))
                        <iframe
                                src="https://www.youtube.com/embed/xVTF4M3I1-w?si=V9ESVFiRGqjvtKTh"
                        width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe
                                width="560"
                                height="315"
                                src="{{ $houseTour['link_'.locale()] ?? '' }}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen

                        ></iframe>
                    @endif


                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt="" />
                            </div>
                            <p>{{ __("Click to start") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- house tour area ends -->

    <!-- get your ticket area starts -->
    <div data-aos="fade-up" data-aos-duration="600" class="get--your--tickets--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="get--your--tickets--area--content">
                <h3 class="main">{{ __("Buy the e-book now!") }}</h3>
                <a href="{{route('user.buy-tickets')}}" class="btn--fill blue--btn">
                    <span>{{ __("Buy Now") }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- get your ticket area ends -->

    <!-- business feature area starts -->
    <section class="business--feature--area--wrapper section--bottom--gap home--area">
        <div class="container">
            <div class="business--feature--area--content">
                <div data-aos="fade-up" data-aos-duration="500" class="single--feature">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/business-feature1.png') }}" alt="" />
                    </div>
                    <p class="title">{{ __("Safe") }}</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" class="single--feature">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/business-feature2.png') }}" alt="" />
                    </div>
                    <p class="title">{{ __("Legal") }}</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="1100" class="single--feature">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/business-feature3.png') }}" alt="" />
                    </div>
                    <p class="title">{{ __("Fair") }}</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="1300" class="single--feature">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/business-feature4.png') }}" alt="" />
                    </div>
                    <p class="title">{{ __("Simple") }}</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="1500" class="single--feature">
                    <div class="icon">
                        <img src="{{ asset('frontend/images/business-feature5.png') }}" alt="" />
                    </div>
                    <p class="title">{{ __("Cheap") }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- business feature area ends -->
@endsection
