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
        <div class="user--details-box mt_35 position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29"
                                    fill="none">
                                    <path
                                        d="M19.8385 26.1665H8.17188C7.69354 26.1665 7.29688 25.7698 7.29688 25.2915C7.29688 24.8132 7.69354 24.4165 8.17188 24.4165H19.8385C20.3169 24.4165 20.7135 24.8132 20.7135 25.2915C20.7135 25.7698 20.3169 26.1665 19.8385 26.1665Z"
                                        fill="url(#paint0_linear_15294_103)" />
                                    <path
                                        d="M23.7429 6.93988L19.0762 10.2766C18.4579 10.7199 17.5712 10.4516 17.3029 9.73988L15.0979 3.85988C14.7246 2.84488 13.2896 2.84488 12.9162 3.85988L10.6996 9.72822C10.4312 10.4516 9.55623 10.7199 8.9379 10.2649L4.27123 6.92822C3.3379 6.27488 2.10123 7.19655 2.48623 8.28155L7.33957 21.8732C7.5029 22.3399 7.94623 22.6432 8.43623 22.6432H19.5546C20.0446 22.6432 20.4879 22.3282 20.6512 21.8732L25.5046 8.28155C25.9012 7.19655 24.6646 6.27488 23.7429 6.93988ZM16.9179 17.7082H11.0846C10.6062 17.7082 10.2096 17.3116 10.2096 16.8332C10.2096 16.3549 10.6062 15.9582 11.0846 15.9582H16.9179C17.3962 15.9582 17.7929 16.3549 17.7929 16.8332C17.7929 17.3116 17.3962 17.7082 16.9179 17.7082Z"
                                        fill="url(#paint1_linear_15294_103)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_15294_103" x1="7.29688" y1="25.2915"
                                            x2="20.7135" y2="25.2915" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_15294_103" x1="2.41406" y1="12.8709"
                                            x2="25.5807" y2="12.8709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>Winning Chance</p>
                                <h3>0,023 %</h3>
                            </div>
                        </div>
                        <p class="mt_40">
                            Based on the amount of your current tickets.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29"
                                    fill="none">
                                    <path
                                        d="M7.77646 16.8335H4.66146C3.37813 16.8335 2.32812 17.8835 2.32812 19.1668V25.0002C2.32812 25.6418 2.85313 26.1668 3.49479 26.1668H7.77646C8.41813 26.1668 8.94313 25.6418 8.94313 25.0002V18.0002C8.94313 17.3585 8.41813 16.8335 7.77646 16.8335Z"
                                        fill="url(#paint0_linear_15294_549)" />
                                    <path
                                        d="M15.5499 12.1665H12.4349C11.1516 12.1665 10.1016 13.2165 10.1016 14.4998V24.9998C10.1016 25.6415 10.6266 26.1665 11.2682 26.1665H16.7166C17.3582 26.1665 17.8832 25.6415 17.8832 24.9998V14.4998C17.8832 13.2165 16.8449 12.1665 15.5499 12.1665Z"
                                        fill="url(#paint1_linear_15294_549)" />
                                    <path
                                        d="M23.3285 20.3335H20.2135C19.5719 20.3335 19.0469 20.8585 19.0469 21.5002V25.0002C19.0469 25.6418 19.5719 26.1668 20.2135 26.1668H24.4952C25.1369 26.1668 25.6619 25.6418 25.6619 25.0002V22.6668C25.6619 21.3835 24.6119 20.3335 23.3285 20.3335Z"
                                        fill="url(#paint2_linear_15294_549)" />
                                    <path
                                        d="M17.511 6.15823C17.8727 5.79656 18.0127 5.3649 17.896 4.99156C17.7794 4.61823 17.4177 4.3499 16.9044 4.26823L15.7844 4.08156C15.7377 4.08156 15.6327 3.9999 15.6094 3.95323L14.991 2.71656C14.5244 1.77156 13.4627 1.77156 12.996 2.71656L12.3777 3.95323C12.366 3.9999 12.261 4.08156 12.2144 4.08156L11.0944 4.26823C10.581 4.3499 10.231 4.61823 10.1027 4.99156C9.98603 5.3649 10.126 5.79656 10.4877 6.15823L11.351 7.03323C11.3977 7.06823 11.4327 7.20823 11.421 7.2549L11.176 8.32823C10.9894 9.13323 11.2927 9.4949 11.491 9.6349C11.6894 9.7749 12.121 9.96156 12.8327 9.54156L13.8827 8.92323C13.9294 8.88823 14.081 8.88823 14.1277 8.92323L15.166 9.54156C15.4927 9.7399 15.761 9.79823 15.971 9.79823C16.216 9.79823 16.391 9.7049 16.496 9.6349C16.6944 9.4949 16.9977 9.13323 16.811 8.32823L16.566 7.2549C16.5544 7.19656 16.5894 7.06823 16.636 7.03323L17.511 6.15823Z"
                                        fill="url(#paint3_linear_15294_549)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_15294_549" x1="2.32812" y1="21.5002"
                                            x2="8.94313" y2="21.5002" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_15294_549" x1="10.1016" y1="19.1665"
                                            x2="17.8832" y2="19.1665" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_15294_549" x1="19.0469" y1="23.2502"
                                            x2="25.6619" y2="23.2502" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_15294_549" x1="10.0625" y1="5.90373"
                                            x2="17.9362" y2="5.90373" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>your Current Rank</p>
                                <h3>#456</h3>
                            </div>
                        </div>
                        <p class="mt_40">
                            Your amount of tickets compared to other Users.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="19"
                                    viewBox="0 0 26 19" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.8529 5.10483C17.8529 7.84613 15.6675 10.0442 12.9421 10.0442C10.2166 10.0442 8.03125 7.84613 8.03125 5.10483C8.03125 2.36248 10.2166 0.166504 12.9421 0.166504C15.6675 0.166504 17.8529 2.36248 17.8529 5.10483ZM12.9445 18.8333C8.94149 18.8333 5.52344 18.1987 5.52344 15.6602C5.52344 13.1206 8.91955 12.4629 12.9445 12.4629C16.9476 12.4629 20.3656 13.0975 20.3656 15.6371C20.3656 18.1756 16.9695 18.8333 12.9445 18.8333ZM19.9566 5.19412C19.9566 6.59156 19.5398 7.89339 18.8085 8.97562C18.7333 9.08699 18.8002 9.23724 18.9328 9.26036C19.1156 9.29188 19.3047 9.30974 19.4969 9.31499C21.4138 9.36543 23.1344 8.12454 23.6097 6.25638C24.3138 3.48146 22.2464 0.990234 19.6139 0.990234C19.3277 0.990234 19.054 1.0207 18.7876 1.07534C18.7511 1.08375 18.7124 1.10056 18.6915 1.13313C18.6665 1.17306 18.6853 1.22664 18.7103 1.26132C19.5011 2.37612 19.9566 3.73573 19.9566 5.19412ZM23.1345 11.2647C24.4225 11.5179 25.2697 12.0349 25.6207 12.7861C25.9174 13.4029 25.9174 14.1184 25.6207 14.7342C25.0838 15.8994 23.3528 16.2734 22.6801 16.3701C22.5412 16.3911 22.4294 16.2703 22.444 16.1306C22.7877 12.9017 20.0539 11.3708 19.3467 11.0189C19.3164 11.0031 19.3101 10.9789 19.3132 10.9642C19.3153 10.9537 19.3279 10.9369 19.3508 10.9338C20.8812 10.9054 22.5265 11.1155 23.1345 11.2647ZM6.51779 9.31451C6.71 9.30925 6.89803 9.29244 7.08189 9.25987C7.21456 9.23675 7.28142 9.0865 7.2062 8.97513C6.47496 7.8929 6.05815 6.59107 6.05815 5.19363C6.05815 3.73525 6.51361 2.37563 7.3044 1.26083C7.32947 1.22616 7.34723 1.17257 7.3232 1.13264C7.30231 1.10112 7.26261 1.08326 7.22709 1.07485C6.95967 1.02022 6.68597 0.989746 6.39974 0.989746C3.76726 0.989746 1.69992 3.48097 2.40505 6.25589C2.88036 8.12405 4.60088 9.36494 6.51779 9.31451ZM6.70164 10.9634C6.70477 10.9791 6.6985 11.0022 6.66925 11.0191C5.96099 11.371 3.22718 12.9019 3.57086 16.1297C3.58549 16.2705 3.47475 16.3903 3.33582 16.3703C2.66307 16.2736 0.932109 15.8996 0.395166 14.7344C0.0974446 14.1176 0.0974446 13.4031 0.395166 12.7863C0.746164 12.0351 1.59232 11.5181 2.88036 11.2639C3.48938 11.1157 5.13364 10.9056 6.66507 10.9339C6.68806 10.9371 6.69955 10.9539 6.70164 10.9634Z"
                                        fill="url(#paint0_linear_15294_409)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_15294_409" x1="0.171875" y1="9.49992"
                                            x2="25.8433" y2="9.49992" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>Total Users</p>
                                <h3>7.471 + You</h3>
                            </div>
                        </div>
                        <p class="mt_40">
                            Based on the amount of your current tickets.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="facts--card">
                        <div class="details--card">
                            <!-- icon  -->
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29"
                                    viewBox="0 0 28 29" fill="none">
                                    <g clip-path="url(#clip0_15302_3569)">
                                        <path
                                            d="M17.6626 10.669C26.7722 10.669 26.0992 10.6671 26.2395 10.6726C26.1547 10.3477 25.9848 10.0513 25.7472 9.81411L23.2496 7.31656C22.7099 6.77682 21.8813 6.61991 21.1876 6.92632C20.8151 7.09091 20.3712 7.00785 20.0831 6.71972C19.795 6.43165 19.7119 5.98777 19.8764 5.61526C20.1828 4.92168 20.026 4.09299 19.4862 3.5532L16.9887 1.05565C16.2484 0.315462 15.044 0.315407 14.3037 1.05565L11.179 4.18034L17.6626 10.669ZM10.0143 5.34503L4.69033 10.669H15.3333C15.314 10.6497 14.9067 10.242 10.0143 5.34503ZM26.8179 19.4807C27.5249 19.207 28 18.5101 28 17.7467V14.2147C28 13.1678 27.1483 12.3161 26.1014 12.3161H22.2353V28.4996H26.1014C27.1483 28.4996 28 27.6479 28 26.601V23.069C28 22.3057 27.525 21.6088 26.8179 21.335C26.4381 21.1878 26.1829 20.8153 26.1829 20.4078C26.1829 20.0004 26.4381 19.6278 26.8179 19.4807ZM0 14.2147V17.7467C0 18.5101 0.475067 19.207 1.18209 19.4807C1.56191 19.6278 1.81704 20.0004 1.81704 20.4078C1.81704 20.8153 1.56185 21.1878 1.18204 21.335C0.475012 21.6088 0 22.3056 0 23.069V26.601C0 27.6479 0.851749 28.4996 1.89862 28.4996H20.5882V12.3161H1.89862C0.851749 12.3161 0 13.1678 0 14.2147ZM5.76471 16.1467H18.1176V17.7937H5.76471V16.1467ZM5.76471 19.4408H18.1176V21.0878H5.76471V19.4408ZM5.76471 22.7349H18.1176V24.382H5.76471V22.7349Z"
                                            fill="url(#paint0_linear_15302_3569)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_15302_3569" x1="0" y1="14.5"
                                            x2="28" y2="14.5" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E8880F" />
                                            <stop offset="1" stop-color="#FFCF7E" />
                                        </linearGradient>
                                        <clipPath id="clip0_15302_3569">
                                            <rect width="28" height="28" fill="white"
                                                transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <p>Your Tickets</p>
                                <h3>05</h3>
                            </div>
                        </div>
                        <p class="mt_40">
                            Based on the amount of your current tickets.
                        </p>
                    </div>
                </div>
            </div>
            <div class="blur--box">
                <p>
                    You can't see this section, buy a ticket to get full data
                    access
                </p>
                <a href="buy-ticket.html" class="user--common--btn">Buy a E-Book</a>
            </div>
        </div>

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
                                You can't see this section, buy a ticket to get full data
                                access
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 details--area">
                    <!-- tickets box  -->
                    <div class="tickets--box w-100 position-relative">
                        <img src="{{ asset('user/images/tickets.png') }}" alt="" />
                        <h3>178 Tickets</h3>
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
                                You can't see this section, buy a ticket to get full data
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
                                <p>Tickets :</p>
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
                                You can't see this section, buy a ticket to get full data
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
                                You can't see this section, buy a ticket to get full data
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
