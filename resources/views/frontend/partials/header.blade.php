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
                            <a href="{{ route('frontend.home') }}" class="{{ (Route::is('frontend.home') || Route::is('frontend./')) ? 'active' : '' }}">{{ __('Home') }}</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="800">
                            <a href="{{ route('frontend.about') }}" class="{{ Route::is('frontend.about')  ? 'active' : '' }}">{{ __('About Us') }}</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1000">
                            <a href="{{ route('frontend.how-it-works') }}" class="{{ Route::is('frontend.how-it-works')  ? 'active' : '' }}">{{ __('How it Works') }}</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1200">
                            <a href="{{ route('frontend.the-house') }}" class="{{ Route::is('frontend.the-house')  ? 'active' : '' }}">{{ __("The House") }}</a>
                        </li>
                        <li data-aos="fade-down" data-aos-duration="1400">
                            <a href="{{ route('frontend.contact') }}" class="{{ Route::is('frontend.contact')  ? 'active' : '' }}">{{ __('Contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- button area -->
            <div data-aos="fade-left" data-aos-duration="600" class="button--area">
                <div>
                    <select class="form-select select" id="change_locale">
                        @foreach(\App\Enums\Lang::map() as $key => $lang)
                            <option @if(locale() == $key) selected @endif value="{{$key}}">{{$lang}}</option>
                        @endforeach

                    </select>
                </div>
                @if (Auth::user())
                    <a href="{{ route('user.dashboard') }}" class="profile btn--fill"
                       style="background: rgba(1, 12, 15, 0.05);color: black;gap: 6px">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Frame">
                                <path id="Vector"
                                      d="M4.5 22C4.5 17.5817 8.08172 14 12.5 14C16.9183 14 20.5 17.5817 20.5 22H18.5C18.5 18.6863 15.8137 16 12.5 16C9.18629 16 6.5 18.6863 6.5 22H4.5ZM12.5 13C9.185 13 6.5 10.315 6.5 7C6.5 3.685 9.185 1 12.5 1C15.815 1 18.5 3.685 18.5 7C18.5 10.315 15.815 13 12.5 13ZM12.5 11C14.71 11 16.5 9.21 16.5 7C16.5 4.79 14.71 3 12.5 3C10.29 3 8.5 4.79 8.5 7C8.5 9.21 10.29 11 12.5 11Z"
                                      fill="#010C0F"/>
                            </g>
                        </svg>
                        {{ __("Profile") }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="link">
                        <span>{{ __("Login") }}</span>
                    </a>
                @endif

                <a href="#" class="btn--fill blue--btn">
                    <span>{{ __('Buy Now') }}</span>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header area ends -->
<script>
    window.addEventListener('DOMContentLoaded', function () {
        $("#change_locale").on("change", function () {
            let code = $(this).val();
            var url = '{{ route('setLocale', ':code') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':code', code),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (resp) {
                    location.reload();
                }, // success end
                error: function (error) {
                    toastr.error(error?.responseJson?.message);
                } // Error
            })
        })
    }, true);
</script>
