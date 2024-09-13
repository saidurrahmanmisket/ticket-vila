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

        .affiliate--promotion--toolkit.box--common {
            max-height: 478px;
            overflow: auto;
        }

        @media only screen and (min-width: 1366px) and (max-width: 1439px) {
            .affiliate--promotion--toolkit.box--common {
                max-height: 395px;
            }

            .affiliate--promotion--toolkit {
                margin-top: 0 !important;
            }
        }

        @media only screen and (max-width: 1365px) {
            .affiliate--promotion--toolkit.box--common {
                margin-top: 20px;
            }
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
            <div class="affiliate--usefull--tips box--common mt_35">
                <div class="top--title">
                    <h3>Ebooks</h3>
                </div>
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-xxl-3 col-lg-4 col-md-6 mt_20">
                            <!-- tips--card  -->
                            <div class="tips--card">
                                <div class="img--area">
                                    <img
                                        src="{{asset($product->thumbnail)}}"
                                        alt="{{$product->titile}}"
                                    />
                                </div>
                                <div class="details">
                                    <h4>
                                        {{strlen($product->titile) > 100 ? substr($product->title,0,100).'...' : $product->title }}
                                    </h4>
                                    <div class="modarator--area">
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

