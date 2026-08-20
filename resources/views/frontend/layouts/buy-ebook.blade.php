@extends('frontend.app')

@section('title', 'Web shop')

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
                                <p class="ticket--id">{{ __("Ticket ID") }}
                                    <span>#{{ !empty($campaign) ? $campaign->unique_text : 'XXXXX'}}</span></p>

                                <div class="price">
                                    <p class="tag">{{ __("Price") }}:</p>
                                    <p class="value">
                                        <span>{{ !empty($campaign) ? number_format($campaign->price,2) : '99.00'}}</span>€
                                        <span class="fs-6 ">({{ __("VAT Included") }})</span>
                                    </p>
                                </div>
                            </div>
                            @if(!empty($campaign) && !empty($campaign->how_many_free) && !empty($campaign->how_many_buy))
                                <div class="info">
                                    <p>
                                        #{{ __("x Tickets left until you get x for free",['buy'=>$campaign->how_many_buy,'free' => $campaign->how_many_free]) }}
                                        🎉</p>
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
                                <form action="{{route('frontend.web-shop.add-to-cart', $campaign->id ?? 0)}}"
                                      method="POST"> @csrf
                                    <input type="hidden" name="quantity" class="quantity" value="1">
                                    <button @if(session()->has('cartData')) disabled @endif type="submit" id="addToCartButton"
                                            class="add--cart {{session()->has('cartData') ? 'disabled' : ''}}">
                                        <span>{{session()->has('cartData') ? __("Added") : __("Add to cart")}}</span>
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
                                    id="directBuyNow"
                                    action="{{Auth::check() ? route('user.checkout') : route('frontend.web-shop.checkout')}}"
                                        method="GET">
                                    <input type="hidden" name="quantity" class="quantity" value="1">
                                    <button type="submit"
                                            class="btn--fill blue--btn no--border"
                                    >
                                        <span>{{ __("Proceed to payment") }}</span>
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
                @if(!empty($ebookDescription))

                <div class="ticket--purchase--bottom--content mb-5">
                    <div class="faq--section w-100">
                        {!! $ebookDescription['description_'.locale()] ?? '' !!}
                    </div>
                </div>
                @endif

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
                    @if(!empty($campaign) && !empty($campaign->how_many_free) && !empty($campaign->how_many_buy) )
                        <!-- chat and bonus area -->
                        <div class="chat--bonus--area">
                            <div class="chat--part">
                                <p class="title">
                                    {{ __("We are here to help, please feel free to contact Us!") }}
                                </p>
                                <p class="subtitle">{{ __("24/7 Chat support with the help of all.") }}</p>

                                <a href="{{route('user.live-chat')}}"
                                   class="btn--fill no--border">{{ __("Start Chat") }}</a>
                            </div>
                            <div class="bonus--part">
                                <div class="img--wrapper">
                                    <img src="{{asset('/frontend/images/mini-ticket-group.png')}}" alt=""/>
                                </div>

                                <p class="title">{{ __("Get a Bonus") }}</p>
                                <p class="subtitle">{{ __("Buy x Tickets and get x for free!",['buy'=>$campaign->how_many_buy,'free'=>$campaign->how_many_free]) }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
    <!-- main area ends -->
@endsection

@push('scripts')
{{--    for facebook pixel buy trac --}}
    <script type="text/javascript">
        let value = "{{ !empty($campaign) ? number_format($campaign->price,2) : 0 }}";


        //for add to cart tracking
        $('#addToCartButton').click(function () {
            var productQty = $('#quantity-value').val();
            fbq('track', 'AddToCart', {num_items: productQty, value: value});
        });

        // for initial checkout
        $('#directBuyNow').on('submit', function (event) {
            event.preventDefault()
            var productQty = $('#quantity-value').val();
            fbq('track', 'InitiateCheckout', {num_items: productQty, value: value});
            this.submit()
        });
    </script>


    <script>
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
