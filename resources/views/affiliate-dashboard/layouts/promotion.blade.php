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
                        <a href="{{route('affiliate.download-file',\App\Enums\ToolkitType::IMAGE)}}" class="button">Images</a>
                        <a href="{{route('affiliate.download-file',\App\Enums\ToolkitType::VIDEO)}}" class="button">Videos</a>
                        <a href="{{route('affiliate.download-file',\App\Enums\ToolkitType::TEXT)}}"
                           class="button">Texts</a>
                        <a href="{{route('affiliate.download-file','all')}}" class="button download--btn">Download
                            All</a>
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
                    @forelse($toolkits as $toolkit)
                        <div class="tool">
                            <!-- icon  -->
                            <div class="icon">
                                <img width="30" height="30" src="{{asset($toolkit->icon)}}"
                                     alt="{{$toolkit['title_'.locale() ?? '']}}">
                            </div>
                            <p>{{$toolkit['title_'.locale() ?? '']}}</p>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-items-center mt-5">
                            <span>Not found.</span>
                        </div>
                    @endforelse
                    <!-- tool  -->

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
                                        <img src="{{asset('/admin/images/moderator.png')}}" alt=""/>
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

