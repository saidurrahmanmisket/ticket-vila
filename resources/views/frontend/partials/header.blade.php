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
                <a href="/" class="logo">
                    <img src="{{ isset($systemSetting->logo) ? asset($systemSetting->logo) : asset('frontend/images/logo.svg') }}"
                        alt="" />
                    <p>{{ $systemSetting->system_name ?? 'TicketVilla' }}</p>
                </a>

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
                <div class="language-dropdown">
                    <select class="form-select select" id="change_locale">
                        @foreach(\App\Enums\Lang::map() as $key => $lang)
                            <option @if(locale() == $key) selected @endif value="{{$key}}">{{$lang}}</option>
                        @endforeach

                    </select>

                    {{--  --}}
                    <div class="lang--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M87.956 73.232A44.292 44.292 0 0 0 94.5 50.001V50a44.293 44.293 0 0 0-6.544-23.232l-.024-.039a44.502 44.502 0 0 0-75.864 0l-.024.039a44.513 44.513 0 0 0 0 46.464l.025.04a44.502 44.502 0 0 0 75.863-.001ZM55.688 86.873a10.814 10.814 0 0 1-2.89 1.996 6.521 6.521 0 0 1-5.597 0 13.621 13.621 0 0 1-5.048-4.442 39.775 39.775 0 0 1-5.747-12.471q6.79-.418 13.594-.426 6.801 0 13.595.426a50.198 50.198 0 0 1-2.438 6.712 25.803 25.803 0 0 1-5.469 8.205ZM10.587 52.5h17.949a88.305 88.305 0 0 0 1.623 14.914q-7.36.648-14.682 1.78a39.23 39.23 0 0 1-4.89-16.694Zm4.89-21.693q7.319 1.134 14.687 1.78A88.15 88.15 0 0 0 28.538 47.5H10.587a39.23 39.23 0 0 1 4.89-16.693Zm28.835-17.68a10.811 10.811 0 0 1 2.89-1.996 6.521 6.521 0 0 1 5.597 0 13.621 13.621 0 0 1 5.048 4.442 39.775 39.775 0 0 1 5.747 12.471q-6.79.418-13.594.426-6.801 0-13.595-.426a50.19 50.19 0 0 1 2.438-6.712 25.803 25.803 0 0 1 5.469-8.205ZM89.413 47.5H71.464a88.312 88.312 0 0 0-1.623-14.914q7.36-.648 14.682-1.78a39.23 39.23 0 0 1 4.89 16.694ZM35.188 67.025a82.696 82.696 0 0 1-1.65-14.525h32.925a82.678 82.678 0 0 1-1.647 14.526q-7.4-.486-14.816-.496-7.41 0-14.812.495Zm29.624-34.05a82.702 82.702 0 0 1 1.65 14.525H33.538a82.68 82.68 0 0 1 1.647-14.526q7.4.486 14.816.496 7.41 0 14.812-.496Zm6.65 19.525h17.951a39.23 39.23 0 0 1-4.89 16.693q-7.32-1.134-14.687-1.78A88.146 88.146 0 0 0 71.462 52.5Zm10.063-26.295q-6.4.923-12.837 1.462a57.018 57.018 0 0 0-2.975-8.396 35.48 35.48 0 0 0-4.14-7.045 39.492 39.492 0 0 1 19.952 13.979ZM22.07 22.069a39.487 39.487 0 0 1 16.356-9.843c-.094.122-.19.238-.282.361a45.643 45.643 0 0 0-6.822 15.08q-6.438-.545-12.846-1.462a39.825 39.825 0 0 1 3.594-4.136Zm-3.594 51.726q6.399-.923 12.837-1.462a57.018 57.018 0 0 0 2.975 8.396 35.484 35.484 0 0 0 4.14 7.045 39.492 39.492 0 0 1-19.952-13.979Zm59.456 4.136a39.486 39.486 0 0 1-16.356 9.843c.094-.122.19-.238.282-.361a45.643 45.643 0 0 0 6.822-15.08q6.438.545 12.846 1.462a39.825 39.825 0 0 1-3.594 4.136Z" data-name="Layer 2" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                    </div>
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
                        <span>{{ __("Profile") }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="link">
                        <span>{{ __("Login") }}</span>
                    </a>
                @endif

                <a href="{{route('user.buy-tickets')}}" class="btn--fill blue--btn">
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
                    flasher.error(error?.responseJson?.message);
                } // Error
            })
        })
    }, true);
</script>
