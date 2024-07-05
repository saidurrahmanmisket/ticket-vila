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
                        {!! !empty($hero_section) && !empty($hero_section['description_' . locale()]) ? substr($hero_section['description_' . locale()], 0, 300) . '...' : __('We are here to assist you with any inquiries or concerns you may have.')  !!}
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
                        <a href="mailto:{{env('mail_from_address')}}" class="btn--fill">
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

                    <form action="{{ route('frontend.contact.submit') }}" class="contact--form" method="POST">
                        @csrf
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="first-name">{{ __('First Name') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="first-name" id="first-name"
                                       placeholder="{{ __('Enter Your First Name') }}"
                                       class="form-control @error('first-name') is-invalid @enderror"
                                       value="{{ old('first-name') }}" />
                                @error('first-name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="single--input">
                                <label for="last-name">{{ __('Last Name') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="last-name" id="last-name"
                                       placeholder="{{ __('Enter Your Last Name') }}"
                                       class="form-control @error('last-name') is-invalid @enderror"
                                       value="{{ old('last-name') }}" />
                                @error('last-name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="email">{{ __('Email') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" id="email"
                                       placeholder="{{ __('Enter Your Email Address') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" />
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="single--input">
                                <label for="phone">{{ __('Phone') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="phone" id="phone"
                                       placeholder="{{ __('Enter Your Phone Number') }}"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}" />
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="company-name">{{ __('Company') }}</label>
                                <input type="text" name="company-name" id="company-name"
                                       placeholder="{{ __('Enter Your Company') }}"
                                       class="form-control @error('company-name') is-invalid @enderror"
                                       value="{{ old('company-name') }}" />
                                @error('company-name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="single--input">
                                <label for="project">{{ __('Project') }}</label>
                                <input type="text" name="project" id="project"
                                       placeholder="{{ __('Enter Your Project Name') }}"
                                       class="form-control @error('project') is-invalid @enderror"
                                       value="{{ old('project') }}" />
                                @error('project')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="dual--input">
                            <div class="single--input">
                                <label for="city">{{ __('City') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="city" id="city"
                                       placeholder="{{ __('City') }}"
                                       class="form-control @error('city') is-invalid @enderror"
                                       value="{{ old('city') }}" />
                                @error('city')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="single--input">
                                <label for="state">{{ __('State') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="state" id="state"
                                       placeholder="{{ __('State') }}"
                                       class="form-control @error('state') is-invalid @enderror"
                                       value="{{ old('state') }}" />
                                @error('state')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="single--input">
                                <label for="country">{{ __('Country') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="country" id="country"
                                       placeholder="{{ __('Country') }}"
                                       class="form-control @error('country') is-invalid @enderror"
                                       value="{{ old('country') }}" />
                                @error('country')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="single--input">
                            <label for="message">{{ __('Message') }}
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="message" id="message" placeholder="{{ __('Enter Your Message Here') }}"
                                      class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn--fill w-100 text-center justify-content-center" type="submit">
                            <span>{{ __('Submit') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15" fill="none">
                                <path d="M17.896 7.70296L1.646 7.70296" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.3423 1.17641L17.8965 7.70241L11.3423 14.2295" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </section>
    <!-- contact information area ends -->
@endsection
