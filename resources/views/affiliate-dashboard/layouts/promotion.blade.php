@extends('affiliate-dashboard.app')
@section('title', 'Affiliate Promotion')
@section('header_title')
    Affiliate Promotion
@endsection;
@push('style')
    <style>
        .tips--card .modarator--area button {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: 23.76px;
            letter-spacing: -0.36px;
            color: #04baff;
        }

        .modal-body {
            max-height: 75vh;
            overflow-y: auto;
        }

        .modal-content {
            max-height: 90vh;
            overflow: hidden;
        }

        img.img-fluid.mb-3 {
            max-height: 250px;
        }

        .tips--card .img--area {
            display: flex;
            justify-content: center;
        }

        @media only screen and (min-width: 200px) and (max-width: 479px) {
            .modal-body {
                max-height: 90vh;
            }

            .modal-content {
                max-height: 95vh;
            }

            img.img-fluid.mb-3 {
                max-height: 200px;
            }
        }
    </style>
@endpush
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
            <!-- affiliate--usefully--tips -->
            <div class="affiliate--usefull--tips box--common mt_35">
                <div class="top--title">
                    <h3>Useful Tips & Tricks</h3>
                </div>
                <div class="row">
                    @forelse($trips as $trip)
                        <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                            <!-- tips--card  -->
                            <div class="tips--card">
                                <div class="img--area">
                                    <img
                                        src="{{asset($trip->image)}}"
                                        alt="{{$trip['title_'.locale() ?? '']}}"
                                    />
                                </div>
                                <div class="details">
                                    <h4>
                                        {{strlen($trip['title_'.locale() ?? '']) > 100 ? substr($trip['title_'.locale() ?? ''],0,100).'...' : $trip['title_'.locale() ?? '']}}
                                    </h4>
                                    <div class="modarator--area">
                                        <!-- moderator  -->
                                        <div class="moderator">
                                            <img src="{{asset($trip->user->avatar ?? '/admin/images/user.png')}}"
                                                 alt="{{$trip->user->first_name.' '.$trip->user->last_name}}"/>
                                            <p>{{$trip->user->first_name.' '.$trip->user->last_name}}</p>
                                        </div>
                                        <button data-bs-toggle="modal"
                                                data-bs-target="#viewPostModal-{{$trip->id}}">
                                            Read
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Modal--}}
                        <div
                            class="modal fade"
                            id="viewPostModal-{{$trip->id}}"
                            tabindex="-1"
                            aria-labelledby="viewPostModalLabel-{{$trip->id}}"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- Full Title in Modal -->
                                        <h5 class="modal-title" id="viewPostModalLabel-{{$trip->id}}">
                                            {{$trip['title_'.locale() ?? '']}}
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <img
                                                src="{{asset($trip->image)}}"
                                                class="img-fluid mb-3"
                                                alt="{{$trip['title_'.locale() ?? '']}}"
                                            />
                                        </div>
                                        {!! $trip['description_'.locale() ?? ''] !!}
                                        <!-- Additional Content -->
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex mt-5 justify-content-center">
                            Not found!
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>
@endsection

