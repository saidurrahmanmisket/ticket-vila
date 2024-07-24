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
                <h4>{{__('Buy an E-Book, get a free Ticket')}}</h4>
                <div class="buy-ebook">
                    <div class="book--details">
                        <!-- book  -->
                        <div class="book">
                            <img src="{{ asset($campaign->thumbnail ?? 'user/images/ticket.png') }}" alt="" />
                        </div>
                        <div class="details">
                            <h3>{{ $campaign['name_' . locale()] ?? 'No Ticket Found' }}</h3>
                            <p class="id">{{ __('Ticket ID: #') }}{{ $campaign->unique_text ?? 'Not Found' }}</p>
                            <p class="price">{{__("Price:")}} <span
                                        id="totalPrice"> {{ number_format($campaign->price ?? 0,2) ?? 'Not Found' }}</span>€ <span class="fs-6 ">(VAT Included)</span>
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
                                #{{$campaign->how_many_buy}} {{ __('Tickets left until you get') }} {{$campaign->how_many_free}} {{ __('for free 🎉') }}
                            </p>
                        @endif

                        <form action="{{ route('user.checkout') }}" method="GET">
                            <div class="buttons">
                                <input type="hidden" id="quantity" name="quantity" value="1">
                                <a href="#" class="user--common--btn gift" style="opacity: 0;visibility: hidden">{{ __('Buy as a Gift 🎁') }}</a>
                                <button href="#" type="submit" class="user--common--btn">
                                    {{ __('Buy ticket') }}
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
                        <h4>{{ __('Frequently Asked Questions') }}</h4>

                         <!-- this is daynamic faq component -->
                         <x-faq></x-faq>
                    </div>
                </div>
                @if(!empty($campaign->how_many_buy) && !empty($campaign->how_many_free))
                    <div class="col-md-5 pl_17 details--area">
                        <div class="chat--box mt_35">
                            <h3>{{ __('We are here to help, please feel free to contact Us!') }}</h3>
                            <p>{{ __('24/7 Chat support with the help of all.') }}</p>
                            <a href="#" class="user--common--btn">{{ __('Start Chat') }}</a>
                        </div>
                        <div class="tickets--box">
                            <img src="{{ asset('user/images/tickets.png') }}" alt=""/>
                            <h3>{{ __('Get a Bonus') }}</h3>
                            <p class="last-week"> {{ __('Buy x Tickets and get x for free!',['buy'=>$campaign->how_many_buy,'free'=>$campaign->how_many_free]) }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- end app content area  -->
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
