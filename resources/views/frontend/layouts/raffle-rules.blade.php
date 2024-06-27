@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
    <section class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap raffle--rules">
        <div class="container">
            <div class="imprint--banner--area--content">
                <div class="left">
                    <h3 data-aos="fade-down" data-aos-duration="600" class="banner--main--text">
                        {{ !empty($hero_section) && !empty($hero_section['title_' . locale()]) ? $hero_section['title_' . locale()] : __('Raffle Rules') }}
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                        {{ !empty($hero_section) && !empty($hero_section['description_' . locale()]) ? substr($hero_section['description_' . locale()], 0, 300) . '...' : __('Step into Your Future Home: Dive Deep into the Details with Our Comprehensive Guide to the Raffle Rules and Regulations.') }}
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
                                        {{ $hero_section['description_' . locale()] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <div data-aos="fade-left" data-aos-duration="600" class="right">
                    <img src="{{ asset(!empty($hero_section) && !empty($hero_section['image']) ? $hero_section['image'] : 'frontend/images/raffle-rules-bg.png') }}"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- banner area ends -->

    <!-- raffle rules content starts -->
    <section class="raffle--rules--content--wrapper section--bottom--gap">
        <div class="container">
            <div class="raffle--rules--content">
                @foreach ($raffleRules as $rule)
                    <div class="single--raffle--rule">
                        <div class="left">
                            <img src="{{ asset(!empty($rule->image) ? $rule->image : 'frontend/images/raffle1.png') }}"
                                alt="{{ $rule['title_' . locale()] ?? '' }}" />
                        </div>
                        <div class="right">
                            <h3 class="main--text">{{ $rule['title_' . locale()] ?? '' }}</h3>
                            <p class="sub--text">
                                {{ $rule['description_' . locale()] ? substr($rule['description_' . locale()], 0, 300) . '...' : '' }}
                            </p>
                            <div class="d-flex gap-4 align-items-center">
                                @if (!empty($rule) && !empty($rule['description_' . locale()]) && strlen($rule['description_' . locale()]) > 300)
                                    <div class="btn--wrapper">
                                        <a href="#" class="btn--normal border blank mt-4" data-bs-toggle="modal"
                                            data-bs-target="#ruleSection{{ $rule->id }}">Read More</a>
                                    </div>
                                @endif
                                @if ($rule->button_type === \App\Enums\ButtonType::BUY_NOW)
                                    <div class="btn--wrapper mt-4">
                                        <a href="{{ route('user.buy-tickets') }}" class="btn--fill blue--btn">
                                            <span>{{ __('Buy Now') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15"
                                                viewBox="0 0 17 15" fill="none">
                                                <path d="M16.25 7.72607L1.25 7.72607" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.2002 1.70149L16.2502 7.72549L10.2002 13.7505" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="ruleSection{{ $rule->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $rule['description_' . locale()] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- raffle rules content ends -->

    <!-- our commitment area starts -->
    <section data-aos="fade-up" data-aos-duration="600" class="our--commitment--area--wrapper section--bottom--gap">
        <div class="container">
            <div class="our--commitment--area--content">
                <h3 data-aos="fade-up" data-aos-duration="600" class="common--heading--title">
                    {{ !empty($the_transparency) && !empty($the_transparency['title_' . locale()]) ? $the_transparency['title_' . locale()] : __('Our Commitment To Transparency, Security, And Fairness In The Raffle Process') }}
                </h3>

                <p data-aos="fade-up" data-aos-duration="700" class="sub--text">
                    {{ !empty($the_transparency) && !empty($the_transparency['description_' . locale()]) ? $the_transparency['description_' . locale()] : __('At House Villa, we prioritize transparency, security, and fairness throughout the entire raffle process. We believe in providing our participants with a trustworthy and reliable experience, ensuring that every ticket purchased has an equal chance of winning the house.') }}
                </p>

                @if (empty(Auth::user()))
                    <a href="{{ route('register') }}" class="btn--fill">
                        <span>Join now</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                            fill="none">
                            <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <!-- our commitment area ends -->
@endsection
