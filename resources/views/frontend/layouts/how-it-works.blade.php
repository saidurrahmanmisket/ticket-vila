@extends('frontend.app')

@section('title', 'How it Works')
@push('style')
    <style>
        .single--process .text--area .main--text {
            font-size: 37px;
            line-height: 55.16px;
        }

        .single--process.with--btn:nth-child(odd) .text--area .featured--content {
            bottom: -105%;
        }

        .single--process.extra--content .text--area .featured--content {
            bottom: -100% !important;
        }

        .single--process.extra--content.extra--more--over--content .text--area .featured--content {
            bottom: -82% !important;
        }
    </style>
@endpush
@section('content')
    <!-- banner area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap how--it--works">
        <div class="container">
            <div class="about--us--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                        {{ !empty($hero_section) ? $hero_section['title_' . locale()] : __('Discover the Process') }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {!! !empty($hero_section) && !empty($hero_section['description_' . locale()]) ? substr($hero_section['description_' . locale()], 0, 300) . '...' :__('Learn how you can win your dream house with just one ticket!')  !!}
                    </p>
                    @if (
                    !empty($hero_section) &&
                        !empty($hero_section['description_' . locale()]) &&
                        strlen($hero_section['description_' . locale()]) > 300)
                        <a href="#" class="btn--normal border blank mt-4" data-bs-toggle="modal"
                           data-bs-target="#exampleModal">Read More</a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $hero_section['description_' . locale()] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img
                        src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/how-it-work-banner.png') }}"
                        alt=""/>
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- the process area starts -->
    <x-frontend.the-process :theProcess="$theProcess"/>
    <!-- the process area ends -->

    <!-- faq area starts -->
    <section data-aos="fade-up" data-aos-duration="800" class="faq--area--wrapper section--bottom--gap">
        <div class="container mb-5">
            <div class="house--tour--area--content">
                <h3 class="title">{{ __('3D Street View') }}</h3>
                <div class="area--wrapper">
                    @if (!empty($houseTour) && !empty($houseTour->link))
                        <iframe src="{{ $houseTour->link }}" width="600" height="450" style="border: 0"
                                allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @elseif(empty($houseTour))
                        <iframe src="https://www.youtube.com/embed/xVTF4M3I1-w?si=V9ESVFiRGqjvtKTh" width="600"
                                height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe width="560" height="315" src="{{ $houseTour['link_' . locale()] ?? '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @endif


                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt=""/>
                            </div>
                            <p>{{ __('Click to start') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="house--tour--area--content">
                <h3 class="title">{{ __('Video presentation of our programme') }}</h3>
                <div class="area--wrapper">
                    @if (!empty($videoPresentationOne) && !empty($videoPresentationOne->link))
                        <iframe src="{{ $videoPresentationOne->link }}" width="600" height="450" style="border: 0"
                                allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @elseif(empty($videoPresentationOne))
                        <iframe src="https://www.youtube.com/embed/xVTF4M3I1-w?si=V9ESVFiRGqjvtKTh" width="600"
                                height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe width="560" height="315" src="{{ $videoPresentationOne['link_' . locale()] ?? '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @endif


                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt=""/>
                            </div>
                            <p>{{ __('Click to start') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="house--tour--area--content">
                <div class="area--wrapper">


                    @if (!empty($videoPresentationTwo) && !empty($videoPresentationTwo->link))
                        <iframe src="{{ $videoPresentationTwo->link }}" width="600" height="450" style="border: 0"
                                allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @elseif(empty($videoPresentationTwo))
                        <iframe src="https://www.youtube.com/embed/xVTF4M3I1-w?si=V9ESVFiRGqjvtKTh" width="600"
                                height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe width="560" height="315" src="{{ $videoPresentationTwo['link_' . locale()] ?? '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @endif


                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt=""/>
                            </div>
                            <p>{{ __('Click to start') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text--area">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    {{ __('Frequently Asked Questions') }}
                </h3>
                <p data-aos="fade-up" data-aos-duration="800" class="subtext">
                    {{ __('FAQs and answers on a particular topic you product on Residence') }}
                </p>
            </div>
            {{-- this is daynamic faq component --}}
            <x-faq></x-faq>
        </div>
    </section>
    <!-- faq area ends -->
@endsection
