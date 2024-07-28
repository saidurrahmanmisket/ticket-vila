@extends('admin.app')

@section('title', 'Dashboard')
@section('header_title')
    Welcome Back, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
    <img src="{{ asset('admin/images/jumper.svg') }}" alt="" />
@endsection;

@section('content')
    <section class="app--content--main">

    <!-- live statistics  -->
        <x-user.live-ticket-statistics />
    <!-- details area  -->
    <div class="details--area">
        <div class="custom--row">
            <!-- revenue--box  -->
            <x-admin.revenue_info :revenueInfo="$revenueInfo" />
            <!-- users--box  -->
            <x-admin.users-info :usersInfo="$usersInfo"/>

            <!-- tickets box  -->
            <div class="tickets--box">
            <x-today_ticket_sold :ticketsSoldToday="$ticketsSoldToday" :todayProgress="$todayProgress" />
            </div>
        </div>
    </div>
    <!-- analytics area  -->
    <div class="analytics--area">
        <div class="row">
            <div class="col-xxl-8">
                <!-- analytic--box  -->
                <div class="sale--analytic analytic--box box--common">
                    <!-- title  -->
                    <div class="top--title">
                        <h3>Sales Analytics</h3>
                        <select id="sale--analytic-select">
                            <option value="last_week">Last Week</option>
                            <option value="last_month">Last Month</option>
                            <option value="last_year">Last Year</option>
                            <option value="since_start">Since Start</option>
                        </select>
                    </div>
                    <div class="chart">
                        <div id="sales--chart-statistics"></div>
                    </div>
                </div>
                <!-- country details  -->
                <div class="country--details box--common mt_35">
                    <!-- top title  -->
                    <div class="top--title">
                        <h3>Country Visits</h3>
                        {{--                        <select id="map-select">--}}
                        {{--                            <option value="1" selected>Top Country Visits</option>--}}
                        {{--                            <option value="2">Top Country's Income</option>--}}
                        {{--                            <option value="3">Total Affiliates Sales</option>--}}
                        {{--                        </select>--}}
                    </div>
                    <!-- map area  -->
                    <div class="map--area w-100 h-auto" id="regions_div">

                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <!-- site--visit  -->
                <div class="site--visit box--common">
                    <div class="text">
                        <h4 class="common--title">Site Visit</h4>
                        <!-- total--visit  -->
                        <div class="total--visit">
                            <p>Total Site Visit</p>
                            <h5>{{formatNumber($loginVisitors+$guestVisitors)}}</h5>
                        </div>
                        @php
                            $totalVisitors = $loginVisitors + $guestVisitors;
                            $loginPercent = ($loginVisitors / $totalVisitors) * 100;
                            $guestPercent = ($guestVisitors / $totalVisitors) * 100;
                        @endphp
                        <ul class="visit--traffic">
                            <li>Login ({{number_format($loginPercent,2)}}%)</li>
                            <li>Guest ({{number_format($guestPercent,2)}}%)</li>
                        </ul>
                    </div>
                    <div class="pie--chart--wrap">
                        <div id="pie--chart--visitors"></div>
                    </div>
                </div>
                <!-- Affiliates  -->
                <div class="affiliates box--common mt_35">
                    <h4 class="common--title">Affiliates</h4>
                    <div class="row">
                        <div class="col-md-6 mt_20">
                            <!-- details--card  -->
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="29"
                                        height="28"
                                        viewBox="0 0 29 28"
                                        fill="none"
                                    >
                                        <path
                                            d="M10.9987 2.33301C7.94203 2.33301 5.45703 4.81801 5.45703 7.87467C5.45703 10.873 7.80203 13.2997 10.8587 13.4047C10.952 13.393 11.0454 13.393 11.1154 13.4047C11.1387 13.4047 11.1504 13.4047 11.1737 13.4047C11.1854 13.4047 11.1854 13.4047 11.197 13.4047C14.1837 13.2997 16.5287 10.873 16.5404 7.87467C16.5404 4.81801 14.0554 2.33301 10.9987 2.33301Z"
                                            fill="url(#paint0_linear_15511_535)"
                                        />
                                        <path
                                            d="M16.9252 16.5084C13.6702 14.3384 8.36182 14.3384 5.08349 16.5084C3.60182 17.5 2.78516 18.8417 2.78516 20.2767C2.78516 21.7117 3.60182 23.0417 5.07182 24.0217C6.70516 25.1184 8.85182 25.6667 10.9985 25.6667C13.1452 25.6667 15.2918 25.1184 16.9252 24.0217C18.3952 23.03 19.2118 21.7 19.2118 20.2534C19.2002 18.8184 18.3952 17.4884 16.9252 16.5084Z"
                                            fill="url(#paint1_linear_15511_535)"
                                        />
                                        <path
                                            d="M23.8209 8.56312C24.0076 10.8265 22.3976 12.8098 20.1693 13.0781C20.1576 13.0781 20.1576 13.0781 20.1459 13.0781H20.1109C20.0409 13.0781 19.9709 13.0781 19.9126 13.1015C18.7809 13.1598 17.7426 12.7981 16.9609 12.1331C18.1626 11.0598 18.8509 9.44979 18.7109 7.69979C18.6293 6.75479 18.3026 5.89146 17.8126 5.15646C18.2559 4.93479 18.7693 4.79479 19.2943 4.74812C21.5809 4.54979 23.6226 6.25312 23.8209 8.56312Z"
                                            fill="url(#paint2_linear_15511_535)"
                                        />
                                        <path
                                            d="M26.1536 19.3551C26.0603 20.4868 25.337 21.4668 24.1236 22.1318C22.957 22.7735 21.487 23.0768 20.0286 23.0418C20.8686 22.2835 21.3586 21.3385 21.452 20.3351C21.5686 18.8885 20.8803 17.5001 19.5036 16.3918C18.722 15.7735 17.812 15.2835 16.8203 14.9218C19.3986 14.1751 22.642 14.6768 24.637 16.2868C25.7103 17.1501 26.2586 18.2351 26.1536 19.3551Z"
                                            fill="url(#paint3_linear_15511_535)"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_15511_535"
                                                x1="5.45703"
                                                y1="7.86884"
                                                x2="16.5404"
                                                y2="7.86884"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_15511_535"
                                                x1="2.78516"
                                                y1="20.2738"
                                                x2="19.2118"
                                                y2="20.2738"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_15511_535"
                                                x1="16.9609"
                                                y1="8.92"
                                                x2="23.8357"
                                                y2="8.92"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" offset=""/>
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint3_linear_15511_535"
                                                x1="16.8203"
                                                y1="18.8138"
                                                x2="26.1664"
                                                y2="18.8138"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Total Affiliates User’s</p>
                                    <h3>778</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt_20">
                            <!-- details--card  -->
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="29"
                                        height="28"
                                        viewBox="0 0 29 28"
                                        fill="none"
                                    >
                                        <path
                                            d="M6.33463 17.5C3.7563 17.5 1.66797 19.5883 1.66797 22.1667C1.66797 23.0417 1.91297 23.87 2.34464 24.57C3.14964 25.9233 4.6313 26.8333 6.33463 26.8333C8.03797 26.8333 9.51963 25.9233 10.3246 24.57C10.7563 23.87 11.0013 23.0417 11.0013 22.1667C11.0013 19.5883 8.91297 17.5 6.33463 17.5ZM8.63297 21.7817L6.14797 24.08C5.98463 24.2317 5.76297 24.3133 5.55297 24.3133C5.3313 24.3133 5.10963 24.2317 4.93463 24.0567L3.77963 22.9017C3.4413 22.5633 3.4413 22.0033 3.77963 21.665C4.11797 21.3267 4.67797 21.3267 5.0163 21.665L5.5763 22.225L7.44297 20.4983C7.79297 20.1717 8.35297 20.195 8.67963 20.545C9.0063 20.895 8.98297 21.455 8.63297 21.7817Z"
                                            fill="url(#paint0_linear_15511_101)"
                                        />
                                        <path
                                            d="M25.582 14.583H22.6654C21.382 14.583 20.332 15.633 20.332 16.9163C20.332 18.1997 21.382 19.2497 22.6654 19.2497H25.582C25.9087 19.2497 26.1654 18.993 26.1654 18.6663V15.1663C26.1654 14.8397 25.9087 14.583 25.582 14.583Z"
                                            fill="url(#paint1_linear_15511_101)"
                                        />
                                        <path
                                            d="M19.7834 6.29953C20.1334 6.63786 19.8418 7.16286 19.3518 7.16286L9.69178 7.1512C9.13178 7.1512 8.85178 6.47453 9.24845 6.07786L11.2901 4.02453C13.0168 2.30953 15.8051 2.30953 17.5318 4.02453L19.7368 6.25286C19.7484 6.26453 19.7718 6.28786 19.7834 6.29953Z"
                                            fill="url(#paint2_linear_15511_101)"
                                        />
                                        <path
                                            d="M26.0143 21.7703C25.3026 24.1737 23.2493 25.667 20.4493 25.667H12.8659C12.4109 25.667 12.1193 25.1653 12.3059 24.7453C12.6559 23.9287 12.8776 23.007 12.8776 22.167C12.8776 18.632 9.99594 15.7503 6.46094 15.7503C5.57427 15.7503 4.71094 15.937 3.9176 16.287C3.48594 16.4737 2.96094 16.182 2.96094 15.7153V14.0003C2.96094 10.827 4.87427 8.61033 7.84927 8.23699C8.14094 8.19033 8.45594 8.16699 8.7826 8.16699H20.4493C20.7526 8.16699 21.0443 8.17866 21.3243 8.22533C23.6809 8.49366 25.3843 9.92866 26.0143 12.0637C26.1309 12.4487 25.8509 12.8337 25.4543 12.8337H22.7826C20.2509 12.8337 18.2443 15.1437 18.7926 17.7687C19.1776 19.682 20.9509 21.0003 22.8993 21.0003H25.4543C25.8626 21.0003 26.1309 21.397 26.0143 21.7703Z"
                                            fill="url(#paint3_linear_15511_101)"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_15511_101"
                                                x1="1.66797"
                                                y1="22.1667"
                                                x2="11.0013"
                                                y2="22.1667"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_15511_101"
                                                x1="20.332"
                                                y1="16.9163"
                                                x2="26.1654"
                                                y2="16.9163"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_15511_101"
                                                x1="9.0625"
                                                y1="4.95057"
                                                x2="19.9372"
                                                y2="4.95057"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint3_linear_15511_101"
                                                x1="2.96094"
                                                y1="16.917"
                                                x2="26.0417"
                                                y2="16.917"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Total Affiliate sales</p>
                                    <h3>1124</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt_20">
                            <!-- details--card  -->
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="28"
                                        height="28"
                                        viewBox="0 0 28 28"
                                        fill="none"
                                    >
                                        <path
                                            d="M20.4532 9.06467C20.3715 9.05301 20.2898 9.05301 20.2082 9.06467C18.3998 9.00634 16.9648 7.52467 16.9648 5.70467C16.9648 3.84967 18.4698 2.33301 20.3365 2.33301C22.1915 2.33301 23.7082 3.83801 23.7082 5.70467C23.6965 7.52467 22.2615 9.00634 20.4532 9.06467Z"
                                            fill="url(#paint0_linear_15511_813)"
                                        />
                                        <path
                                            d="M24.2555 17.1505C22.9489 18.0255 21.1172 18.3521 19.4255 18.1305C19.8689 17.1738 20.1022 16.1121 20.1139 14.9921C20.1139 13.8255 19.8572 12.7171 19.3672 11.7488C21.0939 11.5155 22.9255 11.8421 24.2439 12.7171C26.0872 13.9305 26.0872 15.9255 24.2555 17.1505Z"
                                            fill="url(#paint1_linear_15511_813)"
                                        />
                                        <path
                                            d="M7.51286 9.06467C7.59453 9.05301 7.6762 9.05301 7.75786 9.06467C9.5662 9.00634 11.0012 7.52467 11.0012 5.70467C11.0012 3.83801 9.4962 2.33301 7.62953 2.33301C5.77453 2.33301 4.26953 3.83801 4.26953 5.70467C4.26953 7.52467 5.70453 9.00634 7.51286 9.06467Z"
                                            fill="url(#paint2_linear_15511_813)"
                                        />
                                        <path
                                            d="M7.64229 14.9914C7.64229 16.123 7.88729 17.1964 8.33062 18.1647C6.68563 18.3397 4.97062 17.9897 3.71063 17.1614C1.86729 15.9364 1.86729 13.9414 3.71063 12.7164C4.95896 11.8764 6.72062 11.538 8.37729 11.7247C7.89896 12.7047 7.64229 13.813 7.64229 14.9914Z"
                                            fill="url(#paint3_linear_15511_813)"
                                        />
                                        <path
                                            d="M14.1416 18.515C14.0482 18.5033 13.9432 18.5033 13.8382 18.515C11.6916 18.445 9.97656 16.6833 9.97656 14.5133C9.98823 12.2967 11.7732 10.5 14.0016 10.5C16.2182 10.5 18.0149 12.2967 18.0149 14.5133C18.0032 16.6833 16.2999 18.445 14.1416 18.515Z"
                                            fill="url(#paint4_linear_15511_813)"
                                        />
                                        <path
                                            d="M10.3486 20.9301C8.58693 22.1084 8.58693 24.0451 10.3486 25.2117C12.3553 26.5534 15.6453 26.5534 17.6519 25.2117C19.4136 24.0334 19.4136 22.0967 17.6519 20.9301C15.6569 19.5884 12.3669 19.5884 10.3486 20.9301Z"
                                            fill="url(#paint5_linear_15511_813)"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_15511_813"
                                                x1="16.9648"
                                                y1="5.69884"
                                                x2="23.7082"
                                                y2="5.69884"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_15511_813"
                                                x1="19.3672"
                                                y1="14.9367"
                                                x2="25.6278"
                                                y2="14.9367"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_15511_813"
                                                x1="4.26953"
                                                y1="5.69884"
                                                x2="11.0012"
                                                y2="5.69884"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint3_linear_15511_813"
                                                x1="2.32812"
                                                y1="14.9417"
                                                x2="8.37729"
                                                y2="14.9417"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint4_linear_15511_813"
                                                x1="9.97656"
                                                y1="14.5075"
                                                x2="18.0149"
                                                y2="14.5075"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                            <linearGradient
                                                id="paint5_linear_15511_813"
                                                x1="9.02734"
                                                y1="23.0709"
                                                x2="18.9732"
                                                y2="23.0709"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Total Affiliate Income</p>
                                    <h3>257.122€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt_20">
                            <!-- details--card  -->
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="29"
                                        height="28"
                                        viewBox="0 0 29 28"
                                        fill="none"
                                    >
                                        <path
                                            d="M18.9087 2.33301H10.0887C5.6787 2.33301 4.58203 3.51134 4.58203 8.21301V21.3497C4.58203 24.453 6.28536 25.188 8.35036 22.9713L8.36203 22.9597C9.3187 21.9447 10.777 22.0263 11.6054 23.1347L12.7837 24.7097C13.7287 25.958 15.257 25.958 16.202 24.7097L17.3804 23.1347C18.2204 22.0147 19.6787 21.933 20.6354 22.9597C22.712 25.1763 24.4037 24.4413 24.4037 21.338V8.21301C24.4154 3.51134 23.3187 2.33301 18.9087 2.33301ZM10.9987 8.16634C11.6404 8.16634 12.1654 8.69134 12.1654 9.33301C12.1654 9.97467 11.652 10.4997 10.9987 10.4997C10.3454 10.4997 9.83203 9.97467 9.83203 9.33301C9.83203 8.69134 10.3454 8.16634 10.9987 8.16634ZM17.9987 16.333C17.3454 16.333 16.832 15.808 16.832 15.1663C16.832 14.5247 17.357 13.9997 17.9987 13.9997C18.6404 13.9997 19.1654 14.5247 19.1654 15.1663C19.1654 15.808 18.652 16.333 17.9987 16.333ZM19.0487 8.85467L11.197 16.7063C11.022 16.8813 10.8004 16.963 10.5787 16.963C10.357 16.963 10.1354 16.8813 9.96036 16.7063C9.62203 16.368 9.62203 15.808 9.96036 15.4697L17.812 7.61801C18.1504 7.27967 18.7104 7.27967 19.0487 7.61801C19.387 7.95634 19.387 8.51634 19.0487 8.85467Z"
                                            fill="url(#paint0_linear_15511_485)"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_15511_485"
                                                x1="4.58203"
                                                y1="13.9895"
                                                x2="24.4038"
                                                y2="13.9895"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F" />
                                                <stop offset="1" stop-color="#FFCF7E" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Profit Per user</p>
                                    <h3>114,19€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- top affiliates user  -->
                <div class="top--affiliates box--common mt_35">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Top Affiliates User</h3>
                        <a href="#" class="button">Sell All</a>
                    </div>
                    <!-- affiliates table  -->
                    <div class="affiliates--table--wrapper default--scrollbar">
                        <table class="affiliates--table">
                            <thead>
                            <tr>
                                <th>N0</th>
                                <th>Customers Name</th>
                                <th>Total sales</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="{{ asset('admin/images/profile.png') }}" alt="" />
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="sales">12 Sales</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="{{ asset('admin/images/profile.png') }}" alt="" />
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="sales">12 Sales</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="{{ asset('admin/images/profile.png') }}" alt="" />
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="sales">12 Sales</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="{{ asset('admin/images/profile.png') }}" alt="" />
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="sales">12 Sales</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection


@push('script')

    {{--    counry visitors geo chart--}}
    <script
        type="text/javascript"
        src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["geochart"],
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            let countryVisits = @json($countryVisits);
            countryVisits.unshift(["Country", "Visitors"])
            var data = google.visualization.arrayToDataTable(countryVisits);

            var options = {
                colorAxis: {colors: ["#e7711c", "#4374e0"]},
            };

            var chart = new google.visualization.GeoChart(
                document.getElementById("regions_div")
            );

            chart.draw(data, options);
        }
    </script>


    {{--    visitor pie chart--}}
    <script>
        // pie chart
        var pieChart = document.getElementById("pie--chart--visitors");
        var loginVisitors = Number.parseInt("{{$loginVisitors}}")
        var guestVisitors = Number.parseInt("{{$guestVisitors}}")
        var totalVisitors = loginVisitors + guestVisitors
        var loginPercent = (loginVisitors / totalVisitors
            ) *
            100;
        var guestPercent = (guestVisitors / totalVisitors
            ) *
            100;

        console.log(guestPercent)
        if (pieChart) {
            var options = {
                labels: ['Guest', 'Login'],
                series: [Number.parseFloat(guestPercent.toFixed(2)), Number.parseFloat(loginPercent.toFixed(2))],
                chart: {
                    type: "donut",
                    width: 240,
                    height: 240,
                },
                colors: ["#FFAC45", "#04BAFF"],
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200,
                            },
                            legend: {
                                position: "bottom",
                            },
                        },
                    },
                ],
            };

            var chart2 = new ApexCharts(pieChart, options);
            chart2.render();
        }
    </script>
    <script>
        $(document).ready(function () {
            function formatYLabel(value) {
                if (value >= 1e15) {
                    return (value / 1e15).toFixed(1) + 'Q';
                } else if (value >= 1e12) {
                    return (value / 1e12).toFixed(1) + 'T';
                } else if (value >= 1e9) {
                    return (value / 1e9).toFixed(1) + 'B';
                } else if (value >= 1e6) {
                    return (value / 1e6).toFixed(1) + 'M';
                } else if (value >= 1e3) {
                    return (value / 1e3).toFixed(1) + 'K';
                }
                return value.toFixed(2);
            }


            var SalesChart = document.getElementById("sales--chart-statistics");
            if (SalesChart) {
                var salesData = @json($salesData);
                var options = {
                    series: [
                        {
                            name: "Sales",
                            data: salesData,
                        },
                    ],
                    chart: {
                        height: 350,
                        type: "area",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth", // Smooth line
                        width: 2,
                    },
                    markers: {
                        size: 0,
                        hover: {
                            size: 6,
                        },
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.6,
                            opacityTo: 0.4,
                            stops: [0, 90, 100],
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return formatYLabel(value);
                            }
                        }
                    },
                    xaxis: {
                        type: "datetime",
                        // labels: {
                        //     format: "MMM", // Display month name on x-axis
                        // },
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return '€' + formatYLabel(value);
                            }
                        }
                    },
                };

                var chart1 = new ApexCharts(SalesChart, options);
                chart1.render();


                $("#sale--analytic-select").on('change', function () {
                    const range = $('#sale--analytic-select').val();
                    $.ajax({
                        url: "{{route('admin.statistics.index')}}" + "?slesDateRange=" + range,
                        method: 'GET',
                        success: function (response) {
                            chart1.updateSeries([{
                                name: 'Sales',
                                data: response.salesData
                            }])
                        },
                        error: function (error) {
                            console.error('Error fetching order data:', error);
                        }
                    });
                })
            }
        })
    </script>
@endpush


