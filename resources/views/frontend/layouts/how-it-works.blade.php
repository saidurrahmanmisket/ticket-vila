@extends('frontend.app')

@section('title', 'How it Works')

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
                        {{ !empty($hero_section) ? $hero_section['description_' . locale()] : __('Learn how you can win your dream house with just one ticket!') }}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/how-it-work-banner.png') }}"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- the process area starts -->
    <x-frontend.the-process :theProcess="$theProcess" />
    <!-- the process area ends -->

    <!-- faq area starts -->
    <section data-aos="fade-up" data-aos-duration="800" class="faq--area--wrapper section--bottom--gap">
        <div class="container mb-5">
            <div class="house--tour--area--content">

                <div class="area--wrapper">
                    @if (!empty($houseTour) && !empty($houseTour->link))
                        <iframe src="{{ $houseTour->link }}" width="600" height="450" style="border: 0"
                            allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt="" />
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

                    <iframe
                        src="{{ locale() == 'hu'
                            ? 'https://www.youtube.com/embed/iG-1us9DFj0?si=yQtALyxEa2OCD2J-'
                            : (locale() == 'de'
                                ? 'https://www.youtube.com/embed/pDfKaeL4Ldk?si=LB-7UIQBTvjCxuUY'
                                : 'https://www.youtube.com/embed/9bk9pgn0cgw?si=Ss31NRiLejbxELzH') }}"
                        width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>



                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt="" />
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
                     

                    <iframe
                        src="https://www.youtube.com/embed/mHQH014k0Y8?si=5OSHtZdGPQLRNFGY"
                        width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>


                    <div class="overlay">
                        <div class="instruction--text">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/icon-360.png') }}" alt="" />
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
