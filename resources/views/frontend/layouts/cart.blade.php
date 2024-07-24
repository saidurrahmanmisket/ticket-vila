    @extends('frontend.app')

    @section('title', 'Shopping Cart')

    @push('style')
        <style>
            .add--cart--wrapper .content.page {
                position: static;
                opacity: 1;
                visibility: visible;
                margin: 163px auto;
            }
        </style>
    @endpush

    @section('content')
        <div class="add--cart--wrapper">
            <div class="content page">
                @if(session()->has('cartData') && !empty(session('cartData')))
                    @php($cart = session('cartData'))
                    <div class="item--area">
                        <div class="single--item">
                            <div class="img--area">
                                <img src="{{asset($cart['thumbnail'] ?? '')}}" alt=""/>
                            </div>
                            <div class="description">
                                <p class="title"><span
                                        class="cart_quantity">{{$cart['quantity'] ?? ''}}</span> {{ __("X House Ticket") }}
                                </p>
                                <p class="price"><span>{{number_format($cart['price'] ?? 0,2)}}€</span></p> <span
                                    class="fs-6 ">({{ __("VAT Included") }})</span>
                            </div>

                            <div class="amount--wrapper">
                                <div class="ticket--purchase--amount--wrapper">
                                    <button class="minus cart_quantity_decrement">-</button>
                                    <input type="number" readonly class="cart_quantity"
                                           value="{{$cart['quantity'] ?? 1}}"/>
                                    <button class="plus cart_quantity_increment">+</button>
                                </div>

                                <a href="{{route('frontend.web-shop.remove-cart')}}"
                                   class="remove">{{ __("Remove") }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="price--details--area">

                        <div class="vat">
                            <p>{{ __("Subtotal") }}</p>
                            <p class="cart_subtotal">{{ number_format($cart['quantity'] * $cart['price'],2) }}
                                €</p>
                        </div>
                        @if(!empty($cart['how_many_buy']) && !empty($cart['how_many_free']))
                            <div class="vat">
                                <p>{{ __("Free Tickets") }}</p>
                                <p class="cart_free_ticket">{{ calculateFreeTicket($cart['quantity'],$cart['how_many_buy'],$cart['how_many_free']) }}</p>
                            </div>
                        @endif
                        @if($cart['discount_percent'] && Carbon\Carbon::parse($cart['discount_expire_date'])->greaterThan(now()))
                            <div class="vat">
                                <p>Discount ({{$cart['discount_percent']}}%)</p>
                                <p></p>
                                <p class="cart_discount_price">
                                    -{{ number_format(($cart['quantity'] * $cart['price']) - calculateDiscount(($cart['quantity'] * $cart['price']),$cart['discount_percent']),2) }}
                                    €</p>
                            </div>
                        @endif
                        <div class="hr"></div>

                        <div class="total">
                            <p>{{ __("Total") }}</p>
                            <p class="value cart_total_price">
                                {{number_format($cart['discount_percent'] ? calculateDiscount($cart['quantity'] * $cart['price'],$cart['discount_percent']) : ($cart['quantity'] * $cart['price']),2)}}
                                €</p>
                        </div>
                    </div>

                    <a class='proceed--btn btn--fill blue--btn cart-payment-process'
                       href='{{Auth::check() ? route('user.checkout',['quantity'=>$cart['quantity'],'campaign_id'=>$cart['id'],'cart'=>'true']) : route('frontend.web-shop.checkout',['quantity'=>$cart['quantity'],'campaign_id'=>$cart['id'],'cart'=>'true'])}}'>
                        <span>{{ __("Proceed to payment") }}</span>
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
                @else
                    <div class="empty-cart">
                        <p class="h5">{{ __("Cart is empty") }}</p>
                    </div>
                @endif
            </div>
        </div>
    @endsection
