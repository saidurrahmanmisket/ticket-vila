@php
    use App\Models\SocialMedia;
    use App\Models\DynamicPage;

    $socialMedia = SocialMedia::where('status', 'active')->get();

    $pageData = DynamicPage::where('status', 'active')->get();
@endphp
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
                    <p>Legal</p>
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
                    <p>House Raffle</p>
                    <a href="#">Buy ticket</a>
                    <a href="#">How to Win?</a>
                    <a href="#">Is This Lefit?</a>
                    <a href="{{ route('frontend.the-house') }}">The House</a>
                </div>
                <div data-aos="fade-up" data-aos-duration="900" class="site--links">
                    <p>Information</p>
                    <a href="#">FAQ</a>
                    <a href="#">Green Policy</a>
                    <a href="{{ route('frontend.about') }}">About Us</a>
                    <a href="#">Blog</a>
                </div>

                <div data-aos="fade-up" data-aos-duration="1000" class="subscribe">
                    <p>Subscribe to Newsletter</p>

                    <form class="input--wrapper">
                        <input type="email" placeholder="Enter email address" />
                        <button>Subscribe</button>
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
