@extends('affiliate-dashboard.app')
@section('title', 'Affiliate Dashboard')
@section('header_title')
    Affiliate Dashboard
@endsection;
@section('content')
    <section class="app--content--main">
        <div class="row">
            <div class="col-xxl-7">
                <!-- referral--link--box  -->
                <div class="referral--link--box">
                    <h2>Your Referral Link</h2>
                    <div class="input--group">
                        <input
                            type="text"
                            placeholder="httpt-ticketvilla.com/ref=34412343"
                        />
                        <!-- copy link  -->
                        <div class="copy--link">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="34"
                                height="34"
                                viewBox="0 0 34 34"
                                fill="none"
                            >
                                <path
                                    d="M15.5859 27.6237H23.6609C23.2419 28.6707 22.5184 29.568 21.5839 30.1994C20.6494 30.8308 19.547 31.1673 18.4192 31.1653H8.50258C7.75837 31.1655 7.02141 31.0191 6.3338 30.7344C5.6462 30.4497 5.02143 30.0323 4.49519 29.5061C3.96895 28.9798 3.55156 28.3551 3.26686 27.6675C2.98216 26.9799 2.83573 26.2429 2.83594 25.4987V14.1653C2.83761 12.7854 3.34189 11.4533 4.25445 10.4182C5.16702 9.38311 6.42539 8.71586 7.79423 8.54124V19.832C7.79423 24.1245 11.2934 27.6237 15.5859 27.6237ZM27.6276 8.85282H30.6309C30.5438 8.72514 30.4441 8.60651 30.3334 8.49868L25.5026 3.66762C25.3983 3.55733 25.2791 3.46212 25.1484 3.38473V6.37368C25.1516 7.03022 25.4138 7.65899 25.878 8.12324C26.3423 8.5875 26.971 8.84969 27.6276 8.85282ZM27.6276 10.9778C26.4072 10.9755 25.2375 10.4896 24.3746 9.6267C23.5116 8.76376 23.0258 7.59405 23.0234 6.37368V2.83203H15.5859C14.8417 2.83182 14.1048 2.97825 13.4171 3.26295C12.7295 3.54765 12.1048 3.96504 11.5785 4.49128C11.0523 5.01752 10.6349 5.64229 10.3502 6.32989C10.0655 7.0175 9.91903 7.75446 9.91923 8.49868V19.832C9.91903 20.5762 10.0655 21.3132 10.3502 22.0008C10.6349 22.6884 11.0523 23.3132 11.5785 23.8394C12.1048 24.3656 12.7296 24.783 13.4172 25.0677C14.1048 25.3524 14.8417 25.4989 15.5859 25.4987H25.5026C26.2468 25.4989 26.9838 25.3524 27.6714 25.0677C28.3589 24.783 28.9837 24.3656 29.51 23.8394C30.0362 23.3132 30.4536 22.6884 30.7383 22.0008C31.023 21.3132 31.1694 20.5762 31.1692 19.832V10.9778H27.6276Z"
                                    fill="#868A9B"
                                />
                            </svg>
                        </div>
                        <a href="#" class="share--btn btn--common-affiliate">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="25"
                                viewBox="0 0 24 25"
                                fill="none"
                            >
                                <g clip-path="url(#clip0_18664_6480)">
                                    <path
                                        d="M21.2499 4.49994C21.2499 6.29492 19.7949 7.75006 17.9999 7.75006C16.205 7.75006 14.75 6.29492 14.75 4.49994C14.75 2.70514 16.205 1.25 17.9999 1.25C19.7949 1.25 21.2499 2.70514 21.2499 4.49994Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M17.9999 8.50006C15.7939 8.50006 14 6.70602 14 4.49994C14 2.29405 15.7939 0.5 17.9999 0.5C20.206 0.5 21.9999 2.29405 21.9999 4.49994C21.9999 6.70602 20.206 8.50006 17.9999 8.50006ZM17.9999 2C16.621 2 15.5 3.12209 15.5 4.49994C15.5 5.87797 16.621 7.00006 17.9999 7.00006C19.3789 7.00006 20.4999 5.87797 20.4999 4.49994C20.4999 3.12209 19.3789 2 17.9999 2ZM21.2499 20.5001C21.2499 22.2949 19.7949 23.75 17.9999 23.75C16.205 23.75 14.75 22.2949 14.75 20.5001C14.75 18.7051 16.205 17.2499 17.9999 17.2499C19.7949 17.2499 21.2499 18.7051 21.2499 20.5001Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M18 24.4999C15.7939 24.4999 14.0001 22.7059 14.0001 20.5C14.0001 18.2939 15.794 16.4999 18 16.4999C20.206 16.4999 21.9999 18.2939 21.9999 20.5C21.9999 22.7059 20.206 24.4999 18 24.4999ZM18 17.9999C16.621 17.9999 15.5001 19.122 15.5001 20.5C15.5001 21.8779 16.621 22.9999 18 22.9999C19.379 22.9999 20.4999 21.8778 20.4999 20.5C20.4999 19.122 19.379 17.9999 18 17.9999ZM7.25006 12.4999C7.25006 14.2949 5.79492 15.7499 3.99994 15.7499C2.20514 15.7499 0.75 14.2949 0.75 12.4999C0.75 10.705 2.20514 9.25 3.99994 9.25C5.79492 9.25 7.25006 10.705 7.25006 12.4999Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M3.99994 16.4999C1.79405 16.4999 0 14.706 0 12.4999C0 10.2939 1.79405 8.5 3.99994 8.5C6.20602 8.5 8.00006 10.2939 8.00006 12.4999C8.00006 14.706 6.20602 16.4999 3.99994 16.4999ZM3.99994 10C2.62097 10 1.5 11.1219 1.5 12.4999C1.5 13.878 2.62097 14.9999 3.99994 14.9999C5.37909 14.9999 6.50006 13.878 6.50006 12.4999C6.50006 11.1219 5.37909 10 3.99994 10Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M6.36037 12.0198C6.01228 12.0198 5.67426 11.8387 5.49028 11.5148C5.21723 11.0358 5.38533 10.4247 5.86434 10.1507L15.1432 4.86072C15.6222 4.58571 16.2332 4.7538 16.5073 5.23464C16.7804 5.71361 16.6123 6.32467 16.1332 6.59875L6.8542 11.8887C6.70384 11.9747 6.5336 12.0199 6.36037 12.0198ZM15.6383 20.2698C15.4702 20.2698 15.3003 20.2277 15.1443 20.1387L5.86533 14.8488C5.38626 14.5758 5.2184 13.9647 5.4914 13.4846C5.76328 13.0047 6.37528 12.8357 6.85537 13.1107L16.1344 18.4007C16.6134 18.6737 16.7813 19.2847 16.5083 19.7648C16.3234 20.0887 15.9854 20.2698 15.6384 20.2698H15.6383Z"
                                        fill="white"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="clip0_18664_6480">
                                        <rect
                                            width="24"
                                            height="24"
                                            fill="white"
                                            transform="translate(0 0.5)"
                                        />
                                    </clipPath>
                                </defs>
                            </svg>
                            Share
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5">
                <div class="box--common profit--details--wrap--affiliate">
                    <div class="row">
                        <div class="col-lg-6">
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
                                        <g clip-path="url(#clip0_18664_6493)">
                                            <path
                                                d="M21.0622 9.89844C16.9912 9.89844 13.6795 13.2101 13.6795 17.2811C13.6795 21.3522 16.9911 24.6638 21.0622 24.6638C25.1332 24.6638 28.4996 21.3522 28.4996 17.2811C28.4996 13.2101 25.1333 9.89844 21.0622 9.89844ZM21.9041 21.2344C21.897 21.2371 21.8895 21.2359 21.8824 21.2383V22.203C21.8824 22.6564 21.5155 23.0233 21.0621 23.0233C20.6087 23.0233 20.2418 22.6564 20.2418 22.203V21.2327C19.7015 21.0502 19.1839 20.7038 18.7413 20.1762C18.4498 19.8294 18.4946 19.3119 18.8423 19.0211C19.1892 18.7295 19.7083 18.7743 19.9975 19.122C20.4316 19.6387 20.9227 19.8438 21.3425 19.6932C21.6653 19.5754 21.8824 19.2654 21.8824 18.9218C21.8824 18.4692 21.5147 18.1015 21.0621 18.1015C19.7051 18.1015 18.6012 16.9975 18.6012 15.6406C18.6006 15.1568 18.7428 14.6836 19.01 14.2803C19.2772 13.877 19.6575 13.5616 20.1033 13.3736C20.1485 13.3544 20.1963 13.3555 20.2419 13.3392V12.3594C20.2419 11.906 20.6088 11.5391 21.0622 11.5391C21.5156 11.5391 21.8825 11.906 21.8825 12.3594V13.3407C22.3072 13.4842 22.7214 13.7123 23.0913 14.0705C23.4165 14.3853 23.4246 14.9044 23.1089 15.2305C22.7941 15.5557 22.2742 15.5629 21.9489 15.2481C21.55 14.8612 21.1086 14.7282 20.7433 14.8844C20.5945 14.9471 20.4676 15.0523 20.3784 15.1868C20.2892 15.3213 20.2417 15.4792 20.2418 15.6406C20.2418 16.0932 20.6095 16.4609 21.0621 16.4609C22.4191 16.4609 23.523 17.5649 23.523 18.9218C23.5231 19.9527 22.8726 20.882 21.9041 21.2344ZM1.32031 18.1015C0.866898 18.1015 0.5 18.4684 0.5 18.9218V27.1795C0.5 27.6329 0.866898 27.9998 1.32031 27.9998H3.7812V18.1015H1.32031Z"
                                                fill="url(#paint0_linear_18664_6493)"
                                            />
                                            <path
                                                d="M19.9552 5.12009L14.2131 0.19827C13.9071 -0.0660898 13.4521 -0.0660898 13.146 0.19827L7.40395 5.12009C7.27651 5.22891 7.18558 5.37424 7.14345 5.53643C7.10133 5.69862 7.11004 5.86984 7.16841 6.02692C7.22635 6.18422 7.33116 6.31995 7.46869 6.41579C7.60622 6.51162 7.76985 6.56296 7.93748 6.56286H10.3984V28.0001H16.1405C16.5939 28.0001 16.9608 27.6332 16.9608 27.1798V25.3087C14.0437 23.8119 12.039 20.7795 12.039 17.2815C12.039 13.7835 14.0437 10.751 16.9608 9.2543V6.56291H19.4217C19.5893 6.56301 19.7529 6.51167 19.8905 6.41583C20.028 6.31999 20.1328 6.18427 20.1908 6.02697C20.2492 5.86989 20.2579 5.69866 20.2158 5.53645C20.1736 5.37425 20.0827 5.2289 19.9552 5.12009Z"
                                                fill="url(#paint1_linear_18664_6493)"
                                            />
                                            <path
                                                d="M6.29687 11.5391C5.84346 11.5391 5.47656 11.906 5.47656 12.3594V27.9997H8.75776V11.5391H6.29687Z"
                                                fill="url(#paint2_linear_18664_6493)"
                                            />
                                        </g>
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_18664_6493"
                                                x1="0.5"
                                                y1="18.9491"
                                                x2="28.4996"
                                                y2="18.9491"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F"/>
                                                <stop offset="1" stop-color="#FFCF7E"/>
                                            </linearGradient>
                                            <linearGradient
                                                id="paint1_linear_18664_6493"
                                                x1="7.11719"
                                                y1="14"
                                                x2="20.242"
                                                y2="14"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F"/>
                                                <stop offset="1" stop-color="#FFCF7E"/>
                                            </linearGradient>
                                            <linearGradient
                                                id="paint2_linear_18664_6493"
                                                x1="5.47656"
                                                y1="19.7694"
                                                x2="8.75776"
                                                y2="19.7694"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F"/>
                                                <stop offset="1" stop-color="#FFCF7E"/>
                                            </linearGradient>
                                            <clipPath id="clip0_18664_6493">
                                                <rect
                                                    width="28"
                                                    height="28"
                                                    fill="white"
                                                    transform="translate(0.5)"
                                                />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Todays Profit</p>
                                    <h3>180€ <span>(6 Ticket)</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details--card">
                                <!-- icon  -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="29"
                                        height="29"
                                        viewBox="0 0 29 29"
                                        fill="none"
                                    >
                                        <path
                                            d="M18.9087 2.83203H10.0887C5.6787 2.83203 4.58203 4.01036 4.58203 8.71203V21.8487C4.58203 24.952 6.28536 25.687 8.35036 23.4704L8.36203 23.4587C9.3187 22.4437 10.777 22.5254 11.6054 23.6337L12.7837 25.2087C13.7287 26.457 15.257 26.457 16.202 25.2087L17.3804 23.6337C18.2204 22.5137 19.6787 22.432 20.6354 23.4587C22.712 25.6754 24.4037 24.9404 24.4037 21.837V8.71203C24.4154 4.01036 23.3187 2.83203 18.9087 2.83203ZM10.9987 8.66536C11.6404 8.66536 12.1654 9.19036 12.1654 9.83203C12.1654 10.4737 11.652 10.9987 10.9987 10.9987C10.3454 10.9987 9.83203 10.4737 9.83203 9.83203C9.83203 9.19036 10.3454 8.66536 10.9987 8.66536ZM17.9987 16.832C17.3454 16.832 16.832 16.307 16.832 15.6654C16.832 15.0237 17.357 14.4987 17.9987 14.4987C18.6404 14.4987 19.1654 15.0237 19.1654 15.6654C19.1654 16.307 18.652 16.832 17.9987 16.832ZM19.0487 9.3537L11.197 17.2054C11.022 17.3804 10.8004 17.462 10.5787 17.462C10.357 17.462 10.1354 17.3804 9.96036 17.2054C9.62203 16.867 9.62203 16.307 9.96036 15.9687L17.812 8.11703C18.1504 7.7787 18.7104 7.7787 19.0487 8.11703C19.387 8.45536 19.387 9.01536 19.0487 9.3537Z"
                                            fill="url(#paint0_linear_18929_1777)"
                                        />
                                        <defs>
                                            <linearGradient
                                                id="paint0_linear_18929_1777"
                                                x1="4.58203"
                                                y1="14.4885"
                                                x2="24.4038"
                                                y2="14.4885"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop stop-color="#E8880F"/>
                                                <stop offset="1" stop-color="#FFCF7E"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <p>Profit Per user</p>
                                    <h3>29€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-large mt_35">
                <!-- Earning Overview box  -->
                <div
                    class="sale--analytic analytic--box box--common affiliates-earning--overview"
                >
                    <!-- title  -->
                    <div class="top--title">
                        <div>
                            <h3>Earning Overview</h3>
                            <!-- progress -->
                            <div class="progress">
                                <!-- icon -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="12"
                                        height="8"
                                        viewBox="0 0 12 8"
                                        fill="none"
                                    >
                                        <path
                                            d="M10.5913 1.29492L5.94581 5.94038L4.17611 3.28583L0.636719 6.82522"
                                            stroke="#36B37E"
                                            stroke-width="1.24432"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8.37891 1.29492H10.591V3.50704"
                                            stroke="#36B37E"
                                            stroke-width="1.24432"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                                <p><span>+60% </span>more in 2022</p>
                            </div>
                        </div>
                        <select>
                            <option value="1" selected>Day</option>
                            <option value="2">Week</option>
                            <option value="3">Month</option>
                            <option value="4">Since Start</option>
                        </select>
                    </div>
                    <div class="chart">
                        <div id="sales--chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-small mt_35">
                <!-- affiliates--customer--list  -->
                <div class="top--affiliates box--common affiliates--customer--list">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Customer List</h3>
                        <select>
                            <option value="1" selected>Day</option>
                            <option value="2">Week</option>
                            <option value="3">Month</option>
                            <option value="4">Since Start</option>
                        </select>
                    </div>
                    <!-- affiliates table  -->
                    <div class="affiliates--table--wrapper default--scrollbar">
                        <table class="affiliates--table">
                            <thead>
                            <tr>
                                <th>N0</th>
                                <th>Customers Name</th>
                                <th>Customers Email</th>
                                <th>Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="affiliates--profile">
                                        <img src="../assets/images/profile.png" alt=""/>
                                        <p>Max Musternann</p>
                                    </div>
                                </td>
                                <td class="email">max****@gmail.com</td>
                                <td class="sales">15%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-large mt_35">
                <!-- Affiliate Reward List  -->
                <div class="top--affiliates box--common affiliate--reward--list">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Affiliate Reward List</h3>
                        <p>Your Rank <span>#1</span></p>
                    </div>
                    <!-- affiliates table  -->
                    <div class="affiliates--table--wrapper default--scrollbar">
                        <table class="affiliates--table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ranks</th>
                                <th>Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>
                                    <div class="reward--rank">
                                        <div class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                    stroke="url(#paint0_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M4.33203 14.668H11.6654"
                                                    stroke="url(#paint1_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M6.33203 9.33203H9.66536"
                                                    stroke="url(#paint2_linear_18929_360)"
                                                    stroke-width="1.3"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <defs>
                                                    <linearGradient
                                                        id="paint0_linear_18929_360"
                                                        x1="1.27734"
                                                        y1="6.98922"
                                                        x2="14.6706"
                                                        y2="6.98922"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint1_linear_18929_360"
                                                        x1="4.33203"
                                                        y1="15.168"
                                                        x2="11.6654"
                                                        y2="15.168"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                    <linearGradient
                                                        id="paint2_linear_18929_360"
                                                        x1="6.33203"
                                                        y1="9.83203"
                                                        x2="9.66536"
                                                        y2="9.83203"
                                                        gradientUnits="userSpaceOnUse"
                                                    >
                                                        <stop offset="0.83" stop-color="#E8880F"/>
                                                        <stop offset="1" stop-color="#FFCF7E"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p>First <span>(#1)</span> Rank</p>
                                    </div>
                                </td>
                                <td class="sales">1500.00€</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-small mt_35">
                <!-- affiliate--invite--people  -->
                <div class="affiliate--invite--people box--common h-100">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Invite People</h3>
                    </div>
                    <div class="invite--form">
                        <form action="#">
                            <input
                                type="email"
                                placeholder="Enter Email Address"
                                required
                            />
                            <button class="send--btn btn--common-affiliate">
                                Send
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="25"
                                    viewBox="0 0 24 25"
                                    fill="none"
                                >
                                    <path
                                        d="M22.101 11.0622L2.753 1.62319C2.56707 1.53258 2.36114 1.49077 2.15459 1.5017C1.94805 1.51263 1.74768 1.57593 1.57235 1.68565C1.39702 1.79538 1.25248 1.9479 1.15236 2.12889C1.05223 2.30987 0.999799 2.51335 1 2.72019V2.75519C1.0001 2.9187 1.02025 3.08158 1.06 3.24019L2.916 10.6642C2.94088 10.7631 2.9954 10.852 3.07226 10.919C3.14912 10.9861 3.24464 11.028 3.346 11.0392L11.503 11.9462C11.6387 11.9625 11.7638 12.028 11.8545 12.1303C11.9452 12.2325 11.9952 12.3645 11.9952 12.5012C11.9952 12.6379 11.9452 12.7698 11.8545 12.8721C11.7638 12.9744 11.6387 13.0399 11.503 13.0562L3.346 13.9632C3.24464 13.9744 3.14912 14.0163 3.07226 14.0833C2.9954 14.1504 2.94088 14.2393 2.916 14.3382L1.06 21.7612C1.02025 21.9198 1.0001 22.0827 1 22.2462V22.2812C0.999969 22.4879 1.05252 22.6913 1.15272 22.8721C1.25292 23.053 1.39747 23.2054 1.57277 23.315C1.74808 23.4246 1.94838 23.4878 2.15484 23.4987C2.36131 23.5096 2.56714 23.4678 2.753 23.3772L22.1 13.9382C22.3694 13.8067 22.5965 13.6022 22.7554 13.348C22.9142 13.0937 22.9985 12.8 22.9985 12.5002C22.9985 12.2004 22.9142 11.9066 22.7554 11.6524C22.5965 11.3981 22.3704 11.1936 22.101 11.0622Z"
                                        fill="white"
                                    />
                                </svg>
                            </button>
                        </form>
                        <p>Separate multiple entries with a comma, space, or line break</p>
                    </div>
                    <!-- email box  -->
                    <div class="email--box">
                        <h3>We’ll include this message from you in the email:</h3>
                        <p>Hi there! I’d like to introduce you to Ticketvilla.
                            Ticketvilla can help you convert more of your visitors into actively engaged. Confirmed,
                            Leads, delivered straight into your marketing funnel. Where you need them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

