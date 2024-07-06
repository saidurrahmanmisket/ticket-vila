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
                        <li data-aos="fade-down" data-aos-duration="1000">
                            <a href="{{ route('frontend.web-shop.buy-ebook') }}"
                               class="{{ Route::is('frontend.web-shop.buy-ebook')  ? 'active' : '' }}">{{ __('Web Shop') }}</a>
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
                <!-- button area -->
                <div
                        data-aos="fade-left"
                        data-aos-duration="600"
                        class="button--area"
                >
                    <!-- cart button -->
                    <div class="add--cart--wrapper">
                        <div class="icon">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="28"
                                    height="28"
                                    viewBox="0 0 28 28"
                                    fill="none"
                            >
                                <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M7.51593 25.0786C8.11376 25.0786 8.59968 25.5645 8.59968 26.1624C8.59968 26.7602 8.11376 27.2447 7.51593 27.2447C6.91809 27.2447 6.43359 26.7602 6.43359 26.1624C6.43359 25.5645 6.91809 25.0786 7.51593 25.0786Z"
                                        stroke="#1E1A32"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                />
                                <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M23.4568 25.0786C24.0546 25.0786 24.5406 25.5645 24.5406 26.1624C24.5406 26.7602 24.0546 27.2447 23.4568 27.2447C22.859 27.2447 22.373 26.7602 22.373 26.1624C22.373 25.5645 22.859 25.0786 23.4568 25.0786Z"
                                        stroke="#1E1A32"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                />
                                <path
                                        d="M0.896484 1.604L3.84315 2.114L5.2074 18.3674C5.3179 19.692 6.42432 20.7092 7.75315 20.7092H23.2118C24.4812 20.7092 25.5578 19.777 25.7406 18.519L27.085 9.2285C27.2507 8.08242 26.3625 7.05675 25.2051 7.05675H4.31632"
                                        stroke="#1E1A32"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                />
                                <path
                                        d="M17.0117 12.2928H20.9401"
                                        stroke="#1E1A32"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                />
                            </svg>
                        </div>

                        <div class="content">
                            <div class="top--area">
                                <h3 class="title">Shopping Cart</h3>
                                <div class="close">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="37"
                                            height="38"
                                            viewBox="0 0 37 38"
                                            fill="none"
                                    >
                                        <path
                                                d="M18.4986 16.8594L26.1295 9.22852L28.3098 11.4088L20.6788 19.0397L28.3098 26.6704L26.1295 28.8507L18.4986 21.2199L10.8678 28.8507L8.6875 26.6704L16.3184 19.0397L8.6875 11.4088L10.8678 9.22852L18.4986 16.8594Z"
                                                fill="#141414"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <div class="item--area">
                                <div class="single--item">
                                    <div class="img--area">
                                        <img src="./assets/images/cart-mini-ticket.png" alt=""/>
                                    </div>

                                    <div class="description">
                                        <p class="title">1 X House Ticket</p>
                                        <p class="price">€<span>49.00</span></p>
                                        <p class="additional--info">11.052024 - 11:01:25</p>
                                    </div>

                                    <div class="amount--wrapper">
                                        <div class="ticket--purchase--amount--wrapper">
                                            <button class="minus">-</button>
                                            <input type="number" readonly value="1"/>
                                            <button class="plus">+</button>
                                        </div>

                                        <p class="remove">Remove</p>
                                    </div>
                                </div>
                            </div>

                            <div class="price--details--area">
                                <div class="vat">
                                    <p>VAT Included (3%)</p>
                                    <p class="value">€ <span>18.81</span></p>
                                </div>

                                <div class="hr"></div>

                                <div class="total">
                                    <p>Total</p>
                                    <p class="value">99.00€</p>
                                </div>
                            </div>

                            <a class='proceed--btn btn--fill blue--btn' href='/checkout'>
                                <span>Procceed to payment</span>
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="18"
                                        height="15"
                                        viewBox="0 0 18 15"
                                        fill="none"
                                >
                                    <path
                                            d="M16.25 7.72607L1.25 7.72607"
                                            stroke="white"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M10.2012 1.70149L16.2512 7.72549L10.2012 13.7505"
                                            stroke="white"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
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
