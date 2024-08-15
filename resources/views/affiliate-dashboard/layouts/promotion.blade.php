@extends('affiliate-dashboard.app')
@section('title', 'Affiliate Promotion')
@section('header_title')
    Affiliate Promotion
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
                <!-- download promotion toolkit  -->
                <div class="download--promotion--toolkit box--common mt_35">
                    <p>
                        Download our promotional toolkit, pocked with images, videos,
                        and texts, to boost your affiliate success.
                    </p>
                    <div class="buttons">
                        <a href="#" class="button">Images</a>
                        <a href="#" class="button">Videos</a>
                        <a href="#" class="button">Texts</a>
                        <a href="#" class="button download--btn">Download All</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5">
                <!-- affiliate--promotion--toolkit  -->
                <div class="affiliate--promotion--toolkit box--common">
                    <!-- title  -->
                    <div class="top--title">
                        <h3>Promotion Toolkit</h3>
                    </div>
                    <!-- tool  -->
                    <div class="tool">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 30 30"
                                fill="none"
                            >
                                <path
                                    d="M27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M3.14844 8.88672H26.8484"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M10.6484 2.63672V8.71172"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M19.3516 2.63672V8.14922"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M12.1875 18.0631V16.5631C12.1875 14.6381 13.55 13.8506 15.2125 14.8131L16.5125 15.5631L17.8125 16.3131C19.475 17.2756 19.475 18.8506 17.8125 19.8131L16.5125 20.5631L15.2125 21.3131C13.55 22.2756 12.1875 21.4881 12.1875 19.5631V18.0631V18.0631Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <p>3 x 4K HDR Videos</p>
                    </div>
                    <!-- tool  -->
                    <div class="tool">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 30 30"
                                fill="none"
                            >
                                <path
                                    d="M11.25 12.5C12.6307 12.5 13.75 11.3807 13.75 10C13.75 8.61929 12.6307 7.5 11.25 7.5C9.86929 7.5 8.75 8.61929 8.75 10C8.75 11.3807 9.86929 12.5 11.25 12.5Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V13.75"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M20.1501 6.38726C19.7376 5.08725 20.2251 3.47475 21.5751 3.03725C22.2876 2.81225 23.1751 2.99975 23.6751 3.68725C24.1501 2.97475 25.0626 2.79975 25.7751 3.03725C27.1376 3.47475 27.6251 5.08725 27.2126 6.38726C26.5626 8.43726 24.3126 9.51226 23.6876 9.51226C23.0501 9.51226 20.8126 8.46226 20.1501 6.38726Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M3.33594 23.6867L9.49844 19.5492C10.4859 18.8867 11.9109 18.9617 12.7984 19.7242L13.2109 20.0867C14.1859 20.9242 15.7609 20.9242 16.7359 20.0867L21.9359 15.6242C22.9109 14.7867 24.4859 14.7867 25.4609 15.6242L27.4984 17.3742"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <p>15 x 4K HDR Images</p>
                    </div>
                    <!-- tool  -->
                    <div class="tool">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 30 30"
                                fill="none"
                            >
                                <path
                                    d="M8.75 15C3.75 15 3.75 17.2375 3.75 20V21.25C3.75 24.7 3.75 27.5 10 27.5H20C25 27.5 26.25 24.7 26.25 21.25V20C26.25 17.2375 26.25 15 21.25 15C20 15 19.65 15.2625 19 15.75L17.725 17.1C16.25 18.675 13.75 18.675 12.2625 17.1L11 15.75C10.35 15.2625 10 15 8.75 15Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M23.75 15V7.5C23.75 4.7375 23.75 2.5 18.75 2.5H11.25C6.25 2.5 6.25 4.7375 6.25 7.5V15"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M13.1875 11.5371H17.35"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M12.1484 7.78711H18.3984"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <p>15 X Conversion Optimized Texts</p>
                    </div>
                    <!-- tool  -->
                    <div class="tool">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 30 30"
                                fill="none"
                            >
                                <path
                                    d="M14.9993 26.7621H7.42431C3.08681 26.7621 1.27431 23.6621 3.37431 19.8746L7.27431 12.8496L10.9493 6.24961C13.1743 2.23711 16.8243 2.23711 19.0493 6.24961L22.7243 12.8621L26.6243 19.8871C28.7243 23.6746 26.8993 26.7746 22.5743 26.7746H14.9993V26.7621Z"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M26.7992 25.0008L14.9992 16.7383L3.19922 25.0008"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15 3.75V16.7375"
                                    stroke="#E8880F"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <p>3D House Tour</p>
                    </div>
                    <!-- tool  -->
                    <div class="tool">
                        <!-- icon  -->
                        <div class="icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 30 30"
                                fill="none"
                            >
                                <line
                                    x1="0.708042"
                                    y1="6.83311"
                                    x2="7.26865"
                                    y2="0.68254"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M9.73737 29.3855L16.0329 22.7886"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M24.0171 18.6893L29.3477 13.5637"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M0.695312 12.5977L12.5512 0.850712"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M19.9258 18.6875L29.3567 8.84659"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M0.65625 18.6875L17.8426 0.694273"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M0.65625 23.4043L22.7983 0.852215"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M0.855469 27.9141L27.7129 0.807526"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <path
                                    d="M4.54297 29.3516L29.1452 4.32724"
                                    stroke="#FFDBAB"
                                    stroke-width="1.02509"
                                />
                                <mask id="path-10-inside-1_18664_6812" fill="white">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M29.7727 3.10659C29.7727 1.52139 28.4877 0.236328 26.9025 0.236328H3.12027C1.53506 0.236328 0.25 1.52139 0.25 3.1066V26.8888C0.25 28.474 1.53506 29.7591 3.12027 29.7591H13.743C15.3282 29.7591 16.6133 28.474 16.6133 26.8888V22.1095C16.6133 20.5243 17.8983 19.2393 19.4835 19.2393H26.9025C28.4877 19.2393 29.7727 17.9542 29.7727 16.369V3.10659Z"
                                    />
                                </mask>
                                <path
                                    d="M3.12027 1.26142H26.9025V-0.788767H3.12027V1.26142ZM1.27509 26.8888V3.1066H-0.775095V26.8888H1.27509ZM13.743 28.734H3.12027V30.7842H13.743V28.734ZM17.6384 26.8888V22.1095H15.5882V26.8888H17.6384ZM19.4835 20.2644H26.9025V18.2142H19.4835V20.2644ZM28.7476 3.10659V16.369H30.7978V3.10659H28.7476ZM26.9025 20.2644C29.0538 20.2644 30.7978 18.5203 30.7978 16.369H28.7476C28.7476 17.3881 27.9215 18.2142 26.9025 18.2142V20.2644ZM17.6384 22.1095C17.6384 21.0905 18.4645 20.2644 19.4835 20.2644V18.2142C17.3322 18.2142 15.5882 19.9582 15.5882 22.1095H17.6384ZM13.743 30.7842C15.8944 30.7842 17.6384 29.0401 17.6384 26.8888H15.5882C15.5882 27.9079 14.7621 28.734 13.743 28.734V30.7842ZM-0.775095 26.8888C-0.775095 29.0401 0.968917 30.7842 3.12027 30.7842V28.734C2.10121 28.734 1.27509 27.9079 1.27509 26.8888H-0.775095ZM26.9025 1.26142C27.9215 1.26142 28.7476 2.08754 28.7476 3.10659H30.7978C30.7978 0.955244 29.0538 -0.788767 26.9025 -0.788767V1.26142ZM3.12027 -0.788767C0.968916 -0.788767 -0.775095 0.95525 -0.775095 3.1066H1.27509C1.27509 2.08754 2.10121 1.26142 3.12027 1.26142V-0.788767Z"
                                    fill="#E8880F"
                                    mask="url(#path-10-inside-1_18664_6812)"
                                />
                            </svg>
                        </div>
                        <p>Floor Plan</p>
                    </div>
                </div>
            </div>
            <!-- affiliate--usefull--tips -->
            <div class="affiliate--usefull--tips box--common mt_35">
                <div class="top--title">
                    <h3>Useful Tipps & Tricks</h3>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                        <!-- tips--card  -->
                        <div class="tips--card">
                            <div class="img--area">
                                <img
                                    class="w-100"
                                    src="../assets/images/tips1.png"
                                    alt=""
                                />
                            </div>
                            <div class="details">
                                <h4>
                                    Affiliate Marketing for Beginners What it is + How to
                                    Succeed
                                </h4>
                                <div class="modarator--area">
                                    <!-- moderator  -->
                                    <div class="moderator">
                                        <img src="../assets/images/moderator.png" alt="" />
                                        <p>Henrik</p>
                                    </div>
                                    <a href="#">
                                        Read
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="15"
                                            viewBox="0 0 18 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M16.25 7.72461L1.25 7.72461"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.1992 1.701L16.2492 7.725L10.1992 13.75"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                        <!-- tips--card  -->
                        <div class="tips--card">
                            <div class="img--area">
                                <img
                                    class="w-100"
                                    src="../assets/images/tips2.png"
                                    alt=""
                                />
                            </div>
                            <div class="details">
                                <h4>
                                    Affiliate Marketing for Beginners What it is + How to
                                    Succeed
                                </h4>
                                <div class="modarator--area">
                                    <!-- moderator  -->
                                    <div class="moderator">
                                        <img src="../assets/images/moderator.png" alt="" />
                                        <p>Henrik</p>
                                    </div>
                                    <a href="#">
                                        Read
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="15"
                                            viewBox="0 0 18 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M16.25 7.72461L1.25 7.72461"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.1992 1.701L16.2492 7.725L10.1992 13.75"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                        <!-- tips--card  -->
                        <div class="tips--card">
                            <div class="img--area">
                                <img
                                    class="w-100"
                                    src="../assets/images/tips3.png"
                                    alt=""
                                />
                            </div>
                            <div class="details">
                                <h4>
                                    Affiliate Marketing for Beginners What it is + How to
                                    Succeed
                                </h4>
                                <div class="modarator--area">
                                    <!-- moderator  -->
                                    <div class="moderator">
                                        <img src="../assets/images/moderator.png" alt="" />
                                        <p>Henrik</p>
                                    </div>
                                    <a href="#">
                                        Read
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="15"
                                            viewBox="0 0 18 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M16.25 7.72461L1.25 7.72461"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.1992 1.701L16.2492 7.725L10.1992 13.75"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                        <!-- tips--card  -->
                        <div class="tips--card">
                            <div class="img--area">
                                <img
                                    class="w-100"
                                    src="../assets/images/tips4.png"
                                    alt=""
                                />
                            </div>
                            <div class="details">
                                <h4>
                                    Affiliate Marketing for Beginners What it is + How to
                                    Succeed
                                </h4>
                                <div class="modarator--area">
                                    <!-- moderator  -->
                                    <div class="moderator">
                                        <img src="../assets/images/moderator.png" alt="" />
                                        <p>Henrik</p>
                                    </div>
                                    <a href="#">
                                        Read
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="15"
                                            viewBox="0 0 18 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M16.25 7.72461L1.25 7.72461"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.1992 1.701L16.2492 7.725L10.1992 13.75"
                                                stroke="#04BAFF"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

