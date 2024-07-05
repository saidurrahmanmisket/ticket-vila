@extends('user.app')

@section('title', 'Dashboard')
@section('header_title')
    {{ $campaign['name_' . locale()] ?? 'Ticket' }}
@endsection
@push('style')
    <style>
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
    </style>
@endpush
@section('content')
    <!-- start app content area  -->
    <section class="app--content--main user--portal buy-ebook">
        <!-- buy--ebook--area  -->
        <div class="buy--ebook--area">
            <!-- buy-ebook  -->

            <div class="buy-ebook--wrap">
                <h4>Buy a E- Book get a free Ticket</h4>
                <div class="buy-ebook">
                    <div class="book--details">
                        <!-- book  -->
                        <div class="book">
                            <img src="{{ asset($campaign->thumbnail ?? 'user/images/ticket.png') }}" alt="" />
                        </div>
                        <div class="details">
                            <h3>{{ $campaign['name_' . locale()] ?? 'No Ticket Found' }}</h3>
                            <p class="id">Ticket ID: #{{ $campaign->unique_text ?? 'Not Found' }}</p>
                            <p class="price">Price: <span
                                        id="totalPrice"> {{ number_format($campaign->price,2) ?? 'Not Found' }}</span>€
                            </p>
                            <!-- quantity  -->
                            <div class="quantity">
                                <button class="minus disabled" id="price-minus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="3" viewBox="0 0 16 3"
                                        fill="none">
                                        <path d="M14.5094 1.38124H1.10547" stroke="#04BAFF" stroke-width="2.18344"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <input id="quantityInput" type="number" min="1" value="1" max="9"
                                    readonly />
                                <button class="plus" id="price-plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15"
                                        viewBox="0 0 17 15" fill="none">
                                        <path d="M8.42116 1.5957V13.3846" stroke="white" stroke-width="2.18344"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1265 7.48963H1.72266" stroke="white" stroke-width="2.18344"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="buttons--area position-relative">
                        @if(!empty($campaign->how_many_buy) && !empty($campaign->how_many_free))
                            <p class="text-green">
                                #{{$campaign->how_many_buy}} Tickets left until you get {{$campaign->how_many_free}} for
                                free 🎉
                            </p>
                        @endif

                        <form action="{{ route('user.checkout') }}" method="GET">
                            <div class="buttons">
                                <input type="hidden" id="quantity" name="quantity" value="1">
                                <a href="#" class="user--common--btn gift" style="opacity: 0;visibility: hidden">Buy as
                                    a Gift 🎁</a>
                                <button href="#" type="submit" class="user--common--btn">
                                    Buy Ticket
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                         viewBox="0 0 18 15" fill="none">
                                        <path d="M16.25 7.72607L1.25 7.72607" stroke="white" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.1992 1.70149L16.2492 7.72549L10.1992 13.7505" stroke="white"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 mt_35 pr_17">
                    <div class="faq--box">
                        <h4>Frequently Asked Questions</h4>

                         <!-- this is daynamic faq component -->
                         <x-faq></x-faq>
                    </div>
                </div>
                @if(!empty($campaign->how_many_buy) && !empty($campaign->how_many_free))
                    <div class="col-md-5 pl_17 details--area">
                        <div class="chat--box mt_35">
                            <h3>We are here to help, please feel free to contact Us!</h3>
                            <p>24/7 Chat support with the help of all.</p>
                            <a href="#" class="user--common--btn">Start Chat</a>
                        </div>
                        <div class="tickets--box">
                            <img src="{{ asset('user/images/tickets.png') }}" alt=""/>
                            <h3>Get a Bonus</h3>
                            <p class="last-week">Buy {{$campaign->how_many_buy}} Tickets and
                                get {{$campaign->how_many_free}} for free!</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- end app content area  -->
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

@push('script')
    <script>
        $(document).ready(function () {
            var price = parseFloat("{{ $campaign->price ?? 0 }}");
            var totalPrice = price;
            var quantity = 1;

            $('#price-plus').on('click', function () {
                if (quantity < 9) {

                    totalPrice += price;
                    quantity++;
                    $('#totalPrice').text(totalPrice.toFixed(2));
                    $('#quantity').val(quantity);
                }
            });

            $('#price-minus').on('click', function () {
                if (quantity > 1) {
                    if (totalPrice - price >= 0) {
                        totalPrice -= price;
                        $('#totalPrice').text(totalPrice.toFixed(2));
                        quantity--;
                        $('#quantity').val(quantity);
                    }
                }
            });
        });
    </script>
    <script>
        $('#close-popup').on('click', function () {
            $("#success--popup").hide()
            $("#overlay").hide()
        })
        $('#overlay').on('click', function () {
            $("#success--popup").hide()
            $("#overlay").hide()
        })
    </script>
@endpush
