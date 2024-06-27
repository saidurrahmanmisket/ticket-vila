@extends('user.app')

@section('title', 'Dashboard')

@section('header_title')
Statistics
@endsection;

@section('content')

    <!-- start app content area  -->
    <section class="app--content--main user--portal statistics">
        <!-- live statistics  -->
        <div class="live--statistics--wrapper">
            <p class="intro">Live Statistics</p>

            <!-- live ticket statistics  -->
            <x-user.live-ticket-statistics />
        </div>
        <!-- user details box  -->
        <x-user.user-ranking-statistics :withTickets="true" />

        <!-- analytics area  -->
        <div class="analytics--area">
            <div class="row">
                <div class="col-md-8">
                    <!-- analytic--box  -->
                    <div class="sale--analytic analytic--box box--common position-relative">
                        <!-- title  -->
                        <div class="top--title">
                            <h3>Ticket Sold</h3>
                            <h3>4.358</h3>
                        </div>
                        <div class="chart">
                            <div id="sales--chart"></div>
                        </div>
                        <div class="blur--box">
                            <p>
                                You can't see this section, buy a eBook to get full data
                                access
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 details--area">
                    <!-- tickets box  -->
                    <div class="tickets--box w-100 position-relative">
                        <img src="{{ asset('user/images/tickets.png') }}" alt="" />
                        <h3>178 {{ __("Tickets") }}</h3>
                        <p>Sold Today</p>
                        <p class="last-week">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"
                                fill="none">
                                <path d="M11.0426 5.58282L7.50177 2.04199L3.96094 5.58282" stroke="#12AF6C"
                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7.5 11.9581V2.14062" stroke="#12AF6C" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>+35% </strong> Since last week
                        </p>
                        <div class="blur--box">
                            <p>
                                You can't see this section, buy a eBook to get full data
                                access
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt_35">
                    <div class="compare--box position-relative">
                        <h4 class="common--title">Compare It</h4>
                        <!-- compare range  -->
                        <div class="compare--range">
                            <div class="range--bar">
                                <div class="range"></div>
                            </div>
                            <div class="range--ball">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="45"
                                    viewBox="0 0 27 45" fill="none">
                                    <g clip-path="url(#clip0_14152_2335)">
                                        <path
                                            d="M-1.51455 16.8616C-1.51455 2.46387 -1.51759 3.52753 -1.509 3.30582C-2.02246 3.43982 -2.49085 3.70846 -2.86578 4.084L-6.81314 8.03136C-7.6662 8.88434 -7.9142 10.1939 -7.42992 11.2904C-7.16978 11.8791 -7.30107 12.5807 -7.75645 13.0361C-8.21174 13.4914 -8.9133 13.6226 -9.50205 13.3627C-10.5982 12.8784 -11.908 13.1262 -12.7611 13.9794L-16.7085 17.9267C-17.8784 19.0968 -17.8785 21.0004 -16.7085 22.1704L-11.7699 27.109L-1.51455 16.8616ZM-9.92914 28.9497L-1.51455 37.3643V20.5431C-1.5451 20.5735 -2.18956 21.2173 -9.92914 28.9497ZM12.4123 2.39176C11.9797 1.27422 10.8782 0.523376 9.67172 0.523376H4.08938C2.43481 0.523376 1.08862 1.86956 1.08862 3.52414V9.63449H26.6666V3.52414C26.6666 1.86956 25.3204 0.523376 23.6659 0.523376H18.0835C16.8771 0.523376 15.7756 1.27413 15.3429 2.39167C15.1104 2.99197 14.5215 3.39528 13.8776 3.39528C13.2336 3.39528 12.6448 2.99197 12.4123 2.39176ZM4.08938 44.7773H9.67172C10.8782 44.7773 11.9797 44.0265 12.4123 42.909C12.6448 42.3088 13.2336 41.9055 13.8776 41.9055C14.5215 41.9055 15.1104 42.3088 15.3429 42.9091C15.7756 44.0266 16.877 44.7773 18.0835 44.7773H23.6659C25.3204 44.7773 26.6666 43.4312 26.6666 41.7766V12.2377H1.08862V41.7766C1.08862 43.4312 2.43472 44.7773 4.08938 44.7773ZM7.14282 35.6662V16.1424H9.746V35.6662H7.14282ZM12.3492 35.6662V16.1424H14.9523V35.6662H12.3492ZM17.5555 35.6662V16.1424H20.1587V35.6662H17.5555Z"
                                            fill="url(#paint0_linear_14152_2335)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_14152_2335" x1="4.54035" y1="44.7773"
                                            x2="4.54035" y2="0.523376" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <clipPath id="clip0_14152_2335">
                                            <rect width="44.254" height="25.8148" fill="white"
                                                transform="matrix(0 -1 1 0 0.851562 44.7773)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <p>{{ __("Tickets") }} :</p>
                                <p>4506</p>
                            </li>
                            <li>
                                <p>Winning Chance :</p>
                                <p>30.04%</p>
                            </li>
                            <li>
                                <p>Potential Profit :</p>
                                <p class="text-green">1.020.000 EUR</p>
                            </li>
                        </ul>
                        <div class="blur--box">
                            <p>
                                You can't see this section, buy a eBook to get full data
                                access
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt_35">
                    <!-- lotto--box -->
                    <div class="lotto--box position-relative">
                        <h4 class="common--title text-center">Lotto vs TicketHouse</h4>
                        <!-- lotto--compare  -->
                        <ul class="lotto--compare">
                            <li>
                                <p>1 : 140.000.000 Chance to Win</p>
                                <span>0.00000714%</span>
                            </li>
                            <li>
                                <p>1 : 150.000.000 Chance to Win</p>
                                <span>0.000667%</span>
                            </li>
                        </ul>
                        <!-- wining--chance -->
                        <div class="wining--chance">
                            <p>Chance of Winning the house is over</p>
                            <h3>
                                9332+
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <path
                                        d="M26.6202 14.3749L21.748 15.0391C21.102 15.128 20.537 14.5701 20.618 13.9233L21.2969 8.58352C21.4196 7.66469 20.3316 7.091 19.6428 7.71132L15.616 11.2745C15.1234 11.7157 14.3527 11.5693 14.0658 10.9771L11.8615 6.5816C11.415 5.71311 10.1089 5.91752 9.96705 6.89409L8.21312 19.1396C8.15039 19.5587 8.36526 19.9659 8.73678 20.1618L17.1667 24.6067C17.5382 24.8026 18.0003 24.741 18.306 24.4614L27.4195 16.0964C28.1541 15.4324 27.5849 14.2392 26.6202 14.3749ZM17.1405 19.8109L12.7177 17.4789C12.355 17.2876 12.2128 16.8283 12.4041 16.4656C12.5953 16.1029 13.0546 15.9608 13.4173 16.152L17.8401 18.4841C18.2028 18.6753 18.345 19.1346 18.1537 19.4973C17.9625 19.86 17.5032 20.0022 17.1405 19.8109Z"
                                        fill="url(#paint0_linear_14156_2677)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_14156_2677" x1="21.91" y1="5.41806"
                                            x2="8.71314" y2="28.7438" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </h3>
                            <span class="text-green">Times Greater</span>
                        </div>
                        <div class="blur--box">
                            <p>
                                You can't see this section, buy a eBook to get full data
                                access
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end app content area  -->

@endsection
