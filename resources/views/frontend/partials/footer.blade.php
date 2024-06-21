<!-- footer area starts -->
<footer>
    <div class="container">
        <div class="footer--area--content">
            <div data-aos="fade-up" data-aos-duration="500" class="left">
                <div class="logo">
                    <img src="{{ isset($systemSetting->logo) ? asset($systemSetting->logo) : asset('frontend/images/logo.svg') }}"
                        alt="" />
                    <p>{{ $systemSetting->system_name ?? 'TicketVilla' }}</p>
                </div>

                <div class="social--links">
                    @if ($socialMedia)

                        @foreach ($socialMedia as $item)
                            <a href="{{ url($item->link) }}">
                                <img src="{{ $item->icon }}" alt="">
                            </a>
                        @endforeach

                    @endif
                </div>
            </div>
            <div class="right">
                <div data-aos="fade-up" data-aos-duration="700" class="site--links">
                    <p>{{ __("Legal") }}</p>
                    {{-- <a href="{{ route('frontend.imprint') }}">imprint</a>
                    <a href="{{ route('frontend.terms') }}">Terms of services</a>
                    <a href="{{ route('frontend.privacy') }}">Privacy Policy</a>
                    <a href="{{ route('frontend.contact') }}">Contact</a> --}}
                    @foreach ($pageData as $index => $item)
                    
                        <a
                            href="{{ route('frontend.custom.page', ['page_slug' => $item->page_slug]) }}">{{ $item['title_'.locale()] }}
                        </a>
                    @endforeach
                </div>
                <div data-aos="fade-up" data-aos-duration="800" class="site--links">
                    <p>{{ __("House Raffle") }}</p>
                    <a href="{{ route('user.buy-tickets') }}">{{ __("Buy ticket") }}</a>
                    <a href="{{ route('frontend.rules') }}">{{ __('Raffle Rules') }}</a>
                    {{--                    <a href="#">{{ __("Is This Lefit?") }}</a>--}}
                    <a href="{{ route('frontend.the-house') }}">{{ __("The House") }}</a>
                </div>
                <div data-aos="fade-up" data-aos-duration="900" class="site--links">
                    <p>{{ __("Information") }}</p>
                    <a href="{{ route("frontend.faqs") }}">{{ __("FAQ") }}</a>
                    {{--                    <a href="#">{{ __("Green Policy") }}</a>--}}
                    <a href="{{ route('frontend.about') }}">{{ __("About Us") }}</a>
                    <a href="{{ route('frontend.support') }}">{{ __("Get Support") }}</a>
                </div>

                <div data-aos="fade-up" data-aos-duration="1000" class="subscribe">
                    <p>{{ __("Subscribe to Newsletter") }}</p>

                    <form class="input--wrapper">
                        <input type="email" placeholder="{{ __("Enter email address") }}"/>
                        <button>{{ __("Subscribe") }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="lower--footer">
        <p>© {{ $systemSetting->copy_rights_text ?? 'Copyright 2023, All Rights Reserved by TicketVilla' }}</p>
    </div>
</footer>
<!-- footer area ends -->
