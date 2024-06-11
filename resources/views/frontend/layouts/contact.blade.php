@php
use App\Models\SystemSetting;

$systemSetting = SystemSetting::first();

@endphp

@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
    <!-- banner area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap contact--us">
        <div class="container">
            <div class="about--us--banner--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                        {{ !empty($hero_section) ? $hero_section['title_'.locale()] : __('Get in Touch') }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{ !empty($hero_section) ? $hero_section['description_'.locale()] : __('We are here to assist you with any inquiries or concerns you may have.') }}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset( !empty($hero_section) ? $hero_section->image : 'frontend/images/contact-us-banner.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- contact information area starts -->
    <section class="contact--information--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="contact--information--area--content">
                <div class="left">
                    <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                        {{ __('Contact Information') }}
                    </h3>

                    <ul data-aos="fade-up" data-aos-duration="800" class="contact--info--list">
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/images/contact-info-icon1.svg') }}" alt="" />
                            </div>

                            <p>{{ $systemSetting->email ?? 'info@housevilla.com' }}</p>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/images/contact-info-icon2.svg') }}" alt="" />
                            </div>

                            <p>{{ $systemSetting->company_open_hour ?? 'Monday - Friday : 8AM - 5PM PST' }}</p>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('frontend/images/contact-info-icon3.svg') }}" alt="" />
                            </div>

                            <p>
                                {{ $systemSetting->address ?? 'HouseVilla, Musterstreet 434543 Muster' }}
                            </p>
                        </li>
                    </ul>

                    <div data-aos="fade-up" data-aos-duration="600" class="other--info">
                        <p class="title">{{ __('Other Information') }}</p>
                        <p class="subtitle">{{ __('Place For Additional Information') }}</p>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="700" class="send--message">
                        <a href="#" class="btn--fill">
                            <span>{{ __('Send A Message') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                fill="none">
                                <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="700" class="right">
                    <h3 class="form--title">{{ __('Feel Free To Leave Us A Message') }}</h3>

                    <form action="#" class="contact--form">
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="first-name">{{ __('First Name') }}</label>
                                <input type="text" name="first-name" id="first-name" required
                                    placeholder="{{ __('Enter Your First Name') }}" />
                            </div>
                            <div class="single--input">
                                <label for="last-name">{{ __('Last Name') }}</label>
                                <input type="text" name="last-name" id="last-name" required
                                    placeholder="{{ __('Enter Your Last Name') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" required
                                    placeholder="{{ __('Enter Your Email Address') }}" />
                            </div>
                            <div class="single--input">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="number" name="phone" id="phone" required
                                    placeholder="{{ __('Enter Your Phone Number') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="company-name">{{ __('Company') }}</label>
                                <input type="text" name="company-name" id="company-name" required
                                    placeholder="{{ __('Enter Your Company') }}" />
                            </div>
                            <div class="single--input">
                                <label for="project">{{ __('Project') }}</label>
                                <input type="text" name="project" id="project" required
                                    placeholder="{{ __('Enter Your Project Name') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="city">{{ __('City') }}</label>
                                <input type="text" name="city" id="city" required placeholder="{{ __('City') }}" />
                            </div>
                            <div class="single--input">
                                <label for="state">{{ __('State') }}</label>
                                <input type="text" name="state" id="state" required placeholder="{{ __('State') }}" />
                            </div>
                            <div class="single--input">
                                <label for="country">{{ __('Country') }}</label>
                                <input type="text" name="country" id="country" required placeholder="{{ __('Country') }}" />
                            </div>
                        </div>
                        <div class="single--input">
                            <label for="message">{{ __('Message') }}</label>
                            <textarea name="message" id="message" placeholder="{{ __('Enter Your Message Here') }}"></textarea>
                        </div>

                        <button class="btn--fill submit">
                            <span>{{ __('Submit') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15"
                                fill="none">
                                <path d="M17.896 7.70296L1.646 7.70296" stroke="#fff" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.3423 1.17641L17.8965 7.70241L11.3423 14.2295" stroke="#fff"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact information area ends -->
@endsection
