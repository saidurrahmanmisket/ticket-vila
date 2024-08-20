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
                <x-affiliate.referral-link-box/>
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

