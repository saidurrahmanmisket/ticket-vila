@if(count($theProcess) > 0)
    <section class="the--process--area--wrapper section--bottom--gap">
        <div class="container">
            <h3
                data-aos="fade-up"
                data-aos-duration="600"
                class="common--heading--title"
            >
                {{ __('The Process') }}
            </h3>

            <div class="the--process--area--content">
                @forelse($theProcess as $process)
                    <div
                        class="single--process with--btn {{ (strlen($process['description_'.locale()] ?? '')  > 200 && strlen( $process['title_'.locale()] ?? '')  > 21) && ($process->button_type != \App\Enums\ButtonType::NONE) ? 'extra--content' : '' }} {{ (strlen( $process['title_'.locale()] ?? '') > 50 && strlen($process['description_'.locale()] ?? '') > 280) && ($process->button_type != \App\Enums\ButtonType::NONE) ? 'over--text' : '' }} {{ (strlen($process['description_'.locale()] ?? '')  > 380 && strlen( $process['title_'.locale()] ?? '')  > 20) && ($process->button_type != \App\Enums\ButtonType::NONE) ? 'extra--more--over--content' : '' }}">
                        <div class="img--container">
                            <img src="{{ asset(!empty($process->image) ? $process->image :'frontend/images/single-process.png') }}" alt="" />
                        </div>
                        <div class="text--area">
                            <h3 class="main--text">
                                {{$process['title_'.locale()] ?? ''}}
                            </h3>
                            <p class="subtext">
                                {{$process['description_'.locale()]?? ''}}
                            </p>

                            @if($process->button_type == \App\Enums\ButtonType::BUY_NOW)
                                <a href="{{route('frontend.web-shop.buy-ebook')}}" class="btn--fill blue--btn">
                                    <span>{{ __('Buy Now') }}</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="17"
                                        height="15"
                                        viewBox="0 0 17 15"
                                        fill="none"
                                    >
                                        <path
                                            d="M15.75 7.72607L0.75 7.72607"
                                            stroke="white"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                            stroke="white"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>
                            @elseif($process->button_type == \App\Enums\ButtonType::LEARN_MORE)
                                <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                    <span>{{ __('Learn More') }}</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="17"
                                        height="15"
                                        viewBox="0 0 17 15"
                                        fill="none"
                                    >
                                        <path
                                            d="M15.75 7.72559L0.75 7.72559"
                                            stroke="#010C0F"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                            stroke="#010C0F"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>
                            @elseif($process->button_type == \App\Enums\ButtonType::BOTH)
                                <div class="btn--wrapper">
                                    <a href="{{route('frontend.web-shop.buy-ebook')}}" style="margin-top: 0"
                                       class="btn--fill blue--btn">
                                        <span>{{ __('Buy Now') }}</span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="17"
                                            height="15"
                                            viewBox="0 0 17 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M15.75 7.72607L0.75 7.72607"
                                                stroke="white"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505"
                                                stroke="white"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                    <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                        <span>{{ __('Learn More') }}</span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="17"
                                            height="15"
                                            viewBox="0 0 17 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M15.75 7.72559L0.75 7.72559"
                                                stroke="#010C0F"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                                stroke="#010C0F"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            @endif


                            <!-- featured content -->
                            <div class="featured--content {{!empty($process->icon_bottom_text_en) ? 'bonus' : ''}}">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                @if($process['icon_top_text_'.locale()])
                                    <p class="text">{{$process['icon_top_text_'.locale()]}}</p>
                                @endif
                                <img src="{{ asset(!empty($process->icon) ? $process->icon :'frontend/images/process-icon1.png') }}" alt="" />
                                @if($process['icon_bottom_text_'.locale()])
                                    <p class="bonus--text">{{ $process['icon_bottom_text_'.locale()] }}</p>
                                @endif

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="single--process">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-right">
                            <img src="{{asset('frontend/images/home-process-1.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-left">
                            <h3 class="main--text">
                                {{ __('We Are Officially Starting To Sell The e-Book') }}
                            </h3>
                            <p class="subtext">
                                {{ __("The eBooks are now on sale worldwide, accepting a wide range of payment methods including methods including Euros, Dollars and many other currencies to suit everyone's preferences. Each e-book comes with a free numbered entry ticket for the Dream House prize draw.") }}
                            </p>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">{{ __('E-BOOK SALE STARTS') }}</p>
                                <img src="{{asset('frontend/images/process-icon1.png')}}" alt="">

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-left">
                            <img src="{{asset('frontend/images/home-process-2.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-right">
                            <h3 class="main--text">
                                {{ __("One insider dashboard for all your needs.") }}
                            </h3>
                            <p class="subtext">
                                {{ __('Explore exposés, buy tickets, join our affiliate programme to earn money, view live statistics, news updates and more. Our dedicated dashboard streamlines the entire process for seamless management.') }}
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>{{ __('Buy Now') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">{{ __('All your needs') }}</p>
                                <img src="{{asset('frontend/images/process-icon2.png')}}" alt="">

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn extra--content">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-right">
                            <img src="{{asset('frontend/images/home-process-3.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-left">
                            <h3 class="main--text">
                                {{ __('We have reached our goal, the raffle is about to start!') }}
                            </h3>
                            <p class="subtext">
                                {{ __('We have reached our goal and the raffle can begin. But wait, there is more! If we reach our goal within the target time frame of 6 months, the lucky winner will receive substantial bonuses. Bonus milestones are at 17,000 and 20,000 tickets sold. Keep scrolling') }}
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>{{ __('Buy Now') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">{{ __('E-book sold',['number'=>'15.000']) }}</p>
                                <img src="{{asset('frontend/images/process-icon3.png')}}" alt="">

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-left">
                            <img src="{{asset('frontend/images/home-process-4.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-right">
                            <h3 class="main--text">{{ __('€20,000 extra furniture voucher.') }}</h3>
                            <p class="subtext">
                                {{ __('At this point, the lucky winner will receive an extra €20,000 furniture voucher to go with the house! You might think there is nothing left to be desired. A luxurious house for just €99, plus a €20,000 furniture voucher or the winner can choose the €20,000 cash. What more could you ask for?') }}
                            </p>

                            <a href="#" class="btn--fill blue--btn">
                                <span>{{ __('Buy Now') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72607L0.75 7.72607" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70149L15.7502 7.72549L9.7002 13.7505" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content bonus">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">{{ __('tickets sold',['number'=>'17.000']) }}</p>
                                <img src="{{asset('frontend/images/process-icon4.png')}}" alt="">
                                <p class="bonus--text">{{ __('bonus') }}</p>

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn less--content">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-right">
                            <img src="{{asset('frontend/images/home-process-5.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-left">
                            <h3 class="main--text">{{ __('Proven fair, legally secure') }}</h3>
                            <p class="subtext">
                                {{ __('Experience peace of mind with our raffle: proven fair and legally secure. Enter for a chance to win your dream home!') }}
                            </p>

                            <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                <span>{{ __('Learn More') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">{{ __('Good to Know') }}</p>
                                <img src="{{asset('frontend/images/process-icon5.png')}}" alt="">

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn over--text extra--content">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-left">
                            <img src="{{asset('frontend/images/home-process-6.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-right">
                            <h3 class="main--text">
                                Installation of an additional solar-heated indoor pool.
                            </h3>
                            <p class="subtext">
                                {{ __('Yes! When we reach 20,000 tickets sold, the winner will not
                                only receive the house and the €20,000 voucher, but also a
                                solar heated, fully indoor swimming pool for you, your family
                                and friends to enjoy. The value of this is €60,000.00 or the
                                winner can choose to claim the cash price instead.') }}
                            </p>

                            <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content bonus">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">20.000 tickets sold</p>
                                <img src="{{asset('frontend/images/process-icon4.png')}}" alt="">
                                <p class="bonus--text">bonus</p>

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-right">
                            <img src="{{asset('frontend/images/home-process-7.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-left">
                            <h3 class="main--text">
                                The odds are <span class="gold-span">9332</span> times better
                                than the lottery
                            </h3>
                            <p class="subtext">
                                Experience peace of mind with our raffle: proven fair and
                                legally secure. Enter for a chance to win your dream home!
                            </p>

                            <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                <span>Learn More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                    <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- featured content -->
                            <div class="featured--content">
                                <div class="left--arrow"></div>
                                <div class="top--arrow"></div>
                                <p class="text">Live drawing</p>
                                <img src="{{asset('frontend/images/process-icon6.png')}}" alt="">

                                <div class="bottom--arrow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single--process with--btn">
                        <div class="img--container aos-init aos-animate" data-aos-duration="600" data-aos="fade-left">
                            <img src="{{asset('frontend/images/home-process-8.jpg')}}" alt="">
                        </div>
                        <div class="text--area aos-init aos-animate" data-aos-duration="800" data-aos="fade-right">
                            <h3 class="main--text">
                                We guarantee 100% transparency! The winner is drawn live.
                            </h3>
                            <p class="subtext">
                                Pledge complete transparency with us! Our commitment to
                                fairness means that the winner will be drawn live on YouTube
                                by a Cypriot Notary Public so that the excitement can be
                                viewed by all. Don't miss your chance to win big!
                            </p>

                            <div class="btn--wrapper">
                                <a href="{{route('frontend.rules')}}" class="btn--fill">
                                    <span>Learn More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                        <path d="M15.75 7.72559L0.75 7.72559" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                                <a href="{{route('frontend.rules')}}" class="btn--normal border blank">
                                    <span>Learn More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                        <path d="M15.75 7.72559L0.75 7.72559" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke="#010C0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endif

