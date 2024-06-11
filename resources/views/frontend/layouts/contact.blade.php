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
                        {{ __('contact-page.contact_information') }}
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
                        <p class="title">{{ __('contact-page.other_information') }}</p>
                        <p class="subtitle">{{ __('contact-page.place_for_additional_information') }}</p>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="700" class="send--message">
                        <a href="#" class="btn--fill">
                            <span>{{ __('contact-page.send_a_message') }}</span>
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
                    <h3 class="form--title">{{ __('contact-page.feel_free_to_leave_us_a_message') }}</h3>

                    <form action="#" class="contact--form">
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="first-name">{{ __('contact-page.first_name') }}</label>
                                <input type="text" name="first-name" id="first-name" required
                                    placeholder="{{ __('contact-page.enter_your_first_name') }}" />
                            </div>
                            <div class="single--input">
                                <label for="last-name">{{ __('contact-page.last_name') }}</label>
                                <input type="text" name="last-name" id="last-name" required
                                    placeholder="{{ __('contact-page.enter_your_last_name') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="email">{{ __('contact-page.email') }}</label>
                                <input type="email" name="email" id="email" required
                                    placeholder="{{ __('contact-page.enter_your_email_address') }}" />
                            </div>
                            <div class="single--input">
                                <label for="phone">{{ __('contact-page.phone') }}</label>
                                <input type="number" name="phone" id="phone" required
                                    placeholder="{{ __('contact-page.enter_your_phone_number') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="company-name">{{ __('contact-page.company') }}</label>
                                <input type="text" name="company-name" id="company-name" required
                                    placeholder="{{ __('contact-page.enter_your_company') }}" />
                            </div>
                            <div class="single--input">
                                <label for="project">{{ __('contact-page.project') }}</label>
                                <input type="text" name="project" id="project" required
                                    placeholder="{{ __('contact-page.enter_your_project_name') }}" />
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="city">{{ __('contact-page.city') }}</label>
                                <input type="text" name="city" id="city" required placeholder="{{ __('contact-page.city') }}" />
                            </div>
                            <div class="single--input">
                                <label for="state">{{ __('contact-page.state') }}</label>
                                <input type="text" name="state" id="state" required placeholder="{{ __('contact-page.state') }}" />
                            </div>
                            <div class="single--input">
                                <label for="country">{{ __('contact-page.country') }}</label>
                                <input type="text" name="country" id="country" required placeholder="{{ __('contact-page.country') }}" />
                            </div>
                        </div>
                        <div class="single--input">
                            <label for="message">{{ __('contact-page.message') }}</label>
                            <textarea name="message" id="message" placeholder="{{ __('contact-page.enter_your_message_here') }}"></textarea>
                        </div>

                        <button class="btn--fill submit">
                            <span>{{ __('contact-page.submit') }}</span>
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
