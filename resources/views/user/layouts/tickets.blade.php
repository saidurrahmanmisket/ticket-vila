@extends('user.app')

@section('title', 'Dashboard')

@section('content')
    <section class="app--content--main user--portal buy-ebook ">
        <!-- buy--ebook--area  -->
        <div class="buy--ebook--area">
            <!-- buy-ebook  -->
            <div class="buy-ebook--wrap">
                <h4>Buy a E- Book get a free Ticket</h4>
                <div class="buy-ebook">
                    <div class="book--details">
                        <!-- book  -->
                        <div class="book">
                            <img src="{{ asset('user/images/ticket.png') }}" alt="" />
                        </div>
                        <div class="details">
                            <h3>E-Book</h3>
                            <p class="id">Ticket ID: #XXXXX</p>
                            <p class="price">Price: <span> 99.00€</span></p>
                            <!-- quantity  -->
                            <div class="quantity">
                                <button class="minus disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="3" viewBox="0 0 16 3"
                                        fill="none">
                                        <path d="M14.5094 1.38124H1.10547" stroke="#04BAFF" stroke-width="2.18344"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <input id="quantityInput" type="number" min="1" value="1" max="9"
                                    readonly />
                                <button class="plus">
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
                        <p class="text-green">
                            #9 Tickets left until you get 1 for free 🎉
                        </p>
                        <div class="buttons">
                            <a href="#" class="user--common--btn gift">Buy as a Gift 🎁</a>
                            <a href="#" class="user--common--btn">
                                Buy Ticket
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15"
                                    fill="none">
                                    <path d="M16.25 7.72607L1.25 7.72607" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.1992 1.70149L16.2492 7.72549L10.1992 13.7505" stroke="white"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 mt_35 pr_17">
                    <div class="faq--box">
                        <h4>Frequently Asked Questions</h4>
                        <div class="faq--area--content">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            How does the house raffle work?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            The house rattle operates by selling tickets to participants each ticket
                                            offering a chance to win a house. Here's a simplified process:

                                            <br />
                                            <ul class="mt_30">
                                                <li>
                                                    1. 'Ticket Purchase: Buy your ticket’s from our website.
                                                </li>
                                                <li>
                                                    2. Draw: Once sales close. a winner is randomly selected.
                                                </li>
                                                <li>
                                                    3. Winner Notification: The winner gets notified and receives the house.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Is there a limit to how many tickets I can purchase?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Several factors determine how long the process of
                                            buying or selling real estate takes. The most
                                            important of these factors is the season in which you
                                            begin to search for a property or offer it for
                                            sale.The real estate market, like other investments,
                                            is based on the principle of supply and demand. Real
                                            estate is on-demand in certain seasons of the year.

                                            <br />
                                            <br />

                                            It is not possible to ascertain a specific time as it
                                            can vary according to the circumstances of each
                                            season. You may find the right home for you within a
                                            week, or the search process can last for months.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            What happens if the minimum number of tickets isn't sold?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Several factors determine how long the process of
                                            buying or selling real estate takes. The most
                                            important of these factors is the season in which you
                                            begin to search for a property or offer it for
                                            sale.The real estate market, like other investments,
                                            is based on the principle of supply and demand. Real
                                            estate is on-demand in certain seasons of the year.

                                            <br />
                                            <br />

                                            It is not possible to ascertain a specific time as it
                                            can vary according to the circumstances of each
                                            season. You may find the right home for you within a
                                            week, or the search process can last for months.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Are there any additional costs for the house winner, such as taxes or fees?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Several factors determine how long the process of
                                            buying or selling real estate takes. The most
                                            important of these factors is the season in which you
                                            begin to search for a property or offer it for
                                            sale.The real estate market, like other investments,
                                            is based on the principle of supply and demand. Real
                                            estate is on-demand in certain seasons of the year.

                                            <br />
                                            <br />

                                            It is not possible to ascertain a specific time as it
                                            can vary according to the circumstances of each
                                            season. You may find the right home for you within a
                                            week, or the search process can last for months.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            How is the property transferred to the winner?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Several factors determine how long the process of
                                            buying or selling real estate takes. The most
                                            important of these factors is the season in which you
                                            begin to search for a property or offer it for
                                            sale.The real estate market, like other investments,
                                            is based on the principle of supply and demand. Real
                                            estate is on-demand in certain seasons of the year.

                                            <br />
                                            <br />

                                            It is not possible to ascertain a specific time as it
                                            can vary according to the circumstances of each
                                            season. You may find the right home for you within a
                                            week, or the search process can last for months.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <!-- checkout popup  -->
        <div class="checkout--popup">
            <form action="#">
                <div class="step">
                    <h3>Checkout</h3>
                    <div class="billing    "></div>
                </div>
            </form>
        </div>
    </section>
@endsection
