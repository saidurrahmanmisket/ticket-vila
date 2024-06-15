@extends('frontend.app')

@section('title', 'How it Works')

@section('content')
    <!-- banner area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap how--it--works">
        <div class="container">
            <div class="about--us--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                      {{!empty($hero_section) ? $hero_section["title_".locale()] : __('Discover the Process')}}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{!empty($hero_section) ? $hero_section["description_".locale()] : __('Learn how you can win your dream house with just one ticket!')}}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset(!empty($hero_section) ? $hero_section->image : 'frontend/images/how-it-work-banner.png') }}" alt="" />
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
        <div class="container">
            <div class="text--area">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    {{__("Frequently Asked Questions")}}
                </h3>
                <p data-aos="fade-up" data-aos-duration="800" class="subtext">
                    {{ __("FAQs and answers on a particular topic you product on Residence") }}
                </p>
            </div>
            {{-- this is daynamic faq component --}}
            <x-faq></x-faq>
        </div>
    </section>
    <!-- faq area ends -->
@endsection
