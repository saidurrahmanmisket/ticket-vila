@extends('frontend.app')

@section('title', 'About')

@push('style')
    <style>
        .buy-ebook--wrap .buy-ebook {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .img--wrapper img {
            width: 100%;
            height: 311px;
        }
    </style>
    {{--    Success Message Style--}}
    <style>

        :root {
            --primary--gradient: linear-gradient(
                    177deg,
                    rgba(223, 241, 247, 1) 30%,
                    rgba(245, 232, 220, 1) 100%
            );
            --heading-color: #141414;
            --sidebar-color: #010c0f;
            --body-color: #f5f7fb;
            --white: #ffffff;
            --border-color: #eee;
            --para-color: #868a9b;
            --green: #12af6c;
            --orange: #fc9719;
            --sky-blue: #04baff;
            --skyblue-light: rgba(59, 171, 255, 0.2);
        }

        .user--common--btn {
            display: inline-block;
            padding: 16px 47px;
            background-color: var(--sky-blue);
            border-radius: 60px;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            letter-spacing: -0.36px;
            color: var(--white);
            border: 1px solid transparent;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        /* success--popup styles  */
        .success--popup {
            padding: 66px;
            background-color: #ffffff;
            border-radius: 20px;
            width: 736px;
            height: 677px;
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) scale(0.8);
            -ms-transform: translate(-50%, -50%) scale(0.8);
            transform: translate(-50%, -50%) scale(0.8);
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            opacity: 0;
            visibility: hidden;
            text-align: center;
            z-index: 9999;
        }

        .success--popup.show {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translate(-50%, -50%) scale(1);
            -ms-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
        }


        .success--popup .pop--close {
            position: absolute;
            top: 27px;
            right: 27px;
            cursor: pointer;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1001;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .add--cart.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
    </style>
@endpush
@section('content')
    <!-- main area starts -->
    <main>
        <section class="banner--top--gap ticket--purchase--top--wrapper">
            <div class="container">
                <!-- top area -->
                <div class="ticket--purchase--top--content">
                    <div class="img--wrapper">
                        <img src="{{ asset((!empty($campaign) && !empty($campaign->thumbnail)) ? $campaign->thumbnail : 'user/images/ticket.png') }}"
                             alt=""/>
                    </div>

                    <!-- buying area -->
                    <div class="buying--area--wrapper">
                        <div class="top--part">
                            <div class="intro">
                                <h3 class="title">{{ !empty($campaign) ? $campaign['name_'.locale()] : __('E-Book')}}</h3>
                                <p class="ticket--id">Ticket ID:
                                    <span>#{{ !empty($campaign) ? $campaign->unique_text : 'XXXXX'}}</span></p>

                                <div class="price">
                                    <p class="tag">Price:</p>
                                    <p class="value">
                                        <span>{{ !empty($campaign) ? number_format($campaign->price,2) : '99.00'}}</span>€
                                    </p>
                                </div>
                            </div>
                            @if(!empty($campaign) && !empty($campaign->how_many_free) && !empty($campaign->how_many_buy))
                                <div class="info">
                                    <p>#{{$campaign->how_many_buy}} Tickets left until you
                                        get {{$campaign->how_many_free}} for free 🎉</p>
                                </div>
                            @endif
                        </div>

                        <div class="bottom--part">
                            <div class="ticket--purchase--amount--wrapper">
                                <button type="button" class="minus" id="decrement-button">-</button>
                                <input type="number" id="quantity-value" readonly value="1"/>
                                <button type="button" class="plus" id="increment-button">+</button>
                            </div>


                            <div class="button--wrapper">
                                <form action="{{route('frontend.web-shop.add-to-cart',$campaign->id)}}"
                                      method="POST"> @csrf
                                    <input type="hidden" name="quantity" class="quantity" value="1">
                                    <button @if(session()->has('cartData')) disabled @endif type="submit"
                                            class="add--cart {{session()->has('cartData') ? 'disabled' : ''}}">
                                        <span>{{session()->has('cartData') ? 'Added' : 'Add to cart'}}</span>
                                        @if(!session()->has('cartData'))
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="20"
                                                    height="17"
                                                    viewBox="0 0 20 17"
                                                    fill="none"
                                            >
                                                <path
                                                        d="M18.7939 8.16371L1.82031 8.16371"
                                                        stroke="white"
                                                        stroke-width="2.26315"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                                <path
                                                        d="M11.9531 1.34613L18.7991 8.16273L11.9531 14.9805"
                                                        stroke="white"
                                                        stroke-width="2.26315"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>
                                        @endif
                                    </button>
                                </form>

                                <form
                                        action="{{!empty(Auth::user()) ? route('user.checkout') : route('frontend.web-shop.checkout')}}"
                                        method="GET">
                                    <input type="hidden" name="quantity" class="quantity" value="1">
                                    <button type="submit"
                                            class="btn--fill blue--btn no--border"
                                    >
                                        <span>Buy Now</span>
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="20"
                                                height="17"
                                                viewBox="0 0 20 17"
                                                fill="none"
                                        >
                                            <path
                                                    d="M18.7939 8.16371L1.82031 8.16371"
                                                    stroke="white"
                                                    stroke-width="2.26315"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                            />
                                            <path
                                                    d="M11.9531 1.34613L18.7991 8.16273L11.9531 14.9805"
                                                    stroke="white"
                                                    stroke-width="2.26315"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- bottom area -->
                <div class="ticket--purchase--bottom--content section--bottom--gap">
                    <div class="faq--section">
                        <section
                                data-aos="fade-up"
                                data-aos-duration="800"
                                class="faq--area--wrapper"
                        >
                            <div class="container">
                                <div class="faq--area--content">
                                    <!-- this is daynamic faq component -->
                                    <x-faq></x-faq>
                                </div>
                            </div>
                        </section>
                    </div>
                    @if(!empty($campaign) && !empty($campaign->how_many_free) && !empty($campaign->how_many_buy))
                        <!-- chat and bonus area -->
                        <div class="chat--bonus--area">
                            <div class="chat--part">
                                <p class="title">
                                    We are here to help, please feel free to contact Us!
                                </p>
                                <p class="subtitle">24/7 Chat support with the help of all.</p>

                                <a href="{{route('user.live-chat')}}" class="btn--fill no--border">Start Chat</a>
                            </div>
                            <div class="bonus--part">
                                <div class="img--wrapper">
                                    <img src="{{asset('/frontend/images/mini-ticket-group.png')}}" alt=""/>
                                </div>

                                <p class="title">Get a Bonus</p>
                                <p class="subtitle">Buy {{$campaign->how_many_buy}} Tickets and
                                    get {{$campaign->how_many_free}} for free!</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
    <!-- main area ends -->
    {{--    Payment Success Message--}}
    @if(session('payment_success'))
        <div class="success--popup show checkout--popup" id="success--popup">
            <div class="step successful">
                <div class="img--area text-center">
                    <img src="{{asset('user/images/congra.png')}}" alt=""/>
                </div>
                <h4>Congratulation!!!</h4>
                <p>
                    You have bought {{session('buy_ticket')}}x eBook and got {{session('free_ticket')}}x free house
                    ticket at
                    TicketVilla on {{date('d M Y \a\t h:i A',strtotime(session('buy_time')))}}
                </p>
                <div class="buttons">
                    <a class='user--common--btn' href='{{route('user.dashboard')}}'>Back to Dashboard</a
                    >
                    <a class='user--common--btn' href='{{route('user.tickets')}}'>
                        View Ticket
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="17"
                                height="15"
                                viewBox="0 0 17 15"
                                fill="none"
                        >
                            <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M5.25 7.4999C5.25 9.27768 6.70528 10.7241 8.50203 10.7241C10.2907 10.7241 11.7459 9.27768 11.7459 7.4999C11.7459 5.71404 10.2907 4.26758 8.50203 4.26758C6.70528 4.26758 5.25 5.71404 5.25 7.4999ZM13.2818 2.53806C14.7046 3.63705 15.9159 5.24513 16.7859 7.25725C16.8509 7.41078 16.8509 7.58856 16.7859 7.73402C15.046 11.7583 11.9485 14.1663 8.5013 14.1663H8.49317C5.05415 14.1663 1.95659 11.7583 0.216749 7.73402C0.151709 7.58856 0.151709 7.41078 0.216749 7.25725C1.95659 3.23301 5.05415 0.833008 8.49317 0.833008H8.5013C10.2249 0.833008 11.859 1.43099 13.2818 2.53806ZM8.50127 9.50986C9.61509 9.50986 10.5257 8.60481 10.5257 7.49774C10.5257 6.38259 9.61509 5.47754 8.50127 5.47754C8.40371 5.47754 8.30615 5.48562 8.21672 5.50178C8.1842 6.39067 7.45249 7.10178 6.55005 7.10178H6.5094C6.48501 7.23107 6.46875 7.36037 6.46875 7.49774C6.46875 8.60481 7.37932 9.50986 8.50127 9.50986Z"
                                    fill="white"
                            />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="pop--close popup-close" id="close-popup">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="37"
                        height="37"
                        viewBox="0 0 37 37"
                        fill="none"
                >
                    <path
                            d="M18.4986 16.3204L26.1295 8.68945L28.3098 10.8697L20.6788 18.5006L28.3098 26.1314L26.1295 28.3116L18.4986 20.6808L10.8678 28.3116L8.6875 26.1314L16.3184 18.5006L8.6875 10.8697L10.8678 8.68945L18.4986 16.3204Z"
                            fill="#141414"
                    />
                </svg>
            </div>
        </div>
        <div class="overlay show" id="overlay"></div>
    @endif
@endsection

@push('scripts')
    <script>
        $('#close-popup').on('click', function () {
            $("#success--popup").hide()
            $("#overlay").hide()
        })
        $('#overlay').on('click', function () {
            $("#success--popup").hide()
            $("#overlay").hide()
        })

        //quantity value set to hidden input

        let quantity = 1;
        $("#increment-button").on('click', function () {
            if (quantity < 9) {
                quantity++
                $(".quantity").each(function () {
                    $(this).val(quantity)
                })
            }

        })
        $("#decrement-button").on('click', function () {
            if (quantity > 1) {
                quantity--
                $(".quantity").each(function () {
                    $(this).val(quantity)
                })
            }
        })
    </script>
@endpush
