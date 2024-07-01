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
    </style>
@endpush
@section('content')

    <main>
        <div class="container">
            <!-- start app content area  -->
            <section class="banner--top--gap home--check--out--wrapper">
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
                                    <p class="price">Price: <span id="totalPrice"> {{ $campaign->price ?? 'Not Found' }}</span>€
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
                                {{-- <p class="text-green">
                                    #9 Tickets left until you get 1 for free 🎉
                                </p> --}}

                                <form action="{{ route('user.checkout') }}" method="POST">
                                    <div class="buttons">
                                        @csrf
                                        <input type="hidden" id="quantity" name="quantity" value="1">
                                        <a href="#" class="user--common--btn gift">Buy as a Gift 🎁</a>
                                        <button href="#" type="submit" class="user--common--btn">
                                            Buy Ticket
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                                 viewBox="0 0 18 15" fill="none">
                                                <path d="M16.25 7.72607L1.25 7.72607" stroke="white" stroke-width="2"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.1992 1.70149L16.2492 7.72549L10.1992 13.7505" stroke="white"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                        <div class="col-md-5 pl_17 details--area">
                            <div class="chat--box mt_35">
                                <h3>We are here to help, please feel free to contact Us!</h3>
                                <p>24/7 Chat support with the help of all.</p>
                                <a href="#" class="user--common--btn">Start Chat</a>
                            </div>
                            <div class="tickets--box">
                                <img src="{{ asset('user/images/tickets.png') }}" alt="" />
                                <h3>Get a Bonus</h3>
                                <p class="last-week">Buy 9 Tickets and get 1 for free!</p>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!-- end app content area  -->
        </div>
    </main>

@endsection
