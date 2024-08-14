<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>
    @include('frontend.partials.styles')
    <!-- common css goes here -->
    <link rel="stylesheet" type="text/css" href="https://ticketvilla-landing.vercel.app/assets/css/helper.css"/>
    <link rel="stylesheet" type="text/css" href="https://ticketvilla-landing.vercel.app/assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="https://ticketvilla-landing.vercel.app/assets/css/responsive.css"/>

    <style>
        .landing-page .custom-dropdown {
            margin-top: 10px;
            margin-right: 10px;
        }

        @media only screen and (min-width: 320px) and (max-width: 479px) {
            .landing-page .dropdown-selected .lang-text {
                display: inline;
            }
        }
    </style>
</head>
<body>
<main class="landing-page">
    <div class="d-flex justify-content-end">
        <x-frontend.language-change/>
    </div>
    <section class="container top-section">
        <h1>
            {{ __('What would you say if I told you that, regardless of your current income, you too could own a 411 sqm detached house in the quietest part of Söchau for just €49... Sounds incredible, doesn\'t it?') }}
            <br/>
            <strong>{{ __('Then check this out....') }}</strong>
        </h1>
        <p>
            {!!__('Join the draw easily! <b>Buy an e-book</b> and be the one who <b>WINS THIS STUNNING 850.000 EURO HOUSE!</b> Special bonuses and a live draw await you, don\'t miss this once-in-a-lifetime opportunity!') !!}
        </p>
    </section>

    <section class="container common-section second-section">
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/house.png')}}" alt="" srcset=""/>
        </a>
        <p>
            {!! __('You too dream of a <b>new home of your own</b>, where you can live comfortably, raise a family or simply enjoy everyday life. But in reality, <b>house prices are often sky-high, borrowing is complicated and time-consuming,</b> and savings are not always enough to buy the home you want. This can leave those who want a safe place of their own to relax at the end of the day feeling frustrated and hopeless.') !!}
        </p>
        <a href="{{route('frontend.rules')}}" class="common-btn btn-1">{{ __('I WIN MY DREAM HOME') }}</a>
        <div class="section-text-container">
            <p>
                {!! __('Imagine no longer having to rent or share your home with strangers. Imagine not having to worry about rising house prices because you have a place to call your own. For many people, this dream seems out of reach because of high property prices and difficult financial circumstances. Traditional methods of buying a home are too expensive and complicated, and taking out a loan is a long and stressful process.') !!}
            </p>
            <h5 class="center-text">
                {!! __('But what if we told you that there is a simple and accessible way to get the chance to buy the home of your dreams?') !!}
            </h5>
            <h5>
                {!! __("All you need to do is buy an e-book and you'll be entered into a draw to win a house worth up to €850,000! This chance is now yours, and all you have to do is take one simple step to get closer to your dreams.") !!}

            </h5>
        </div>
    </section>

    <section class="container common-section third-section">
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Offers.png')}}" alt="" srcset=""/>
        </a>
        <h1>
            {!! __('This is exactly what TicketVilla.eu offers. By buying a simple e-book, you not only gain valuable knowledge, but also a lottery ticket to enter the draw. So you get a great read and a chance to win the home of your dreams.') !!}
        </h1>

        <a href="{{route('frontend.web-shop.buy-ebook')}}" class="common-btn btn-2">{{__('I\'LL BUY IT')}}</a>
        <h1>{{__('100% transparency')}}</h1>
        <p>
            {!! __('We, the TicketVilla team, are committed to full transparency and honesty. Yes, as a business, we make a profit from this sweepstakes, but we do it completely legally and with 100% transparency. Visit us in person! Once a month, anyone can come and visit us and can visit the property in person. This is not only a fantastic opportunity to see the house you could win, but also to meet us in person.') !!}
        </p>
    </section>

    <section class="container common-section third-section">
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Sale.png')}}" alt="" srcset=""/>
        </a>

        <a href="{{route('frontend.web-shop.buy-ebook')}}" class="common-btn btn-2"
           style="text-transform: uppercase">{{ __("Buy") }}</a>
        <h1>{{ __("Why is this important?") }}</h1>
        <p class="text-padding-x">
            {!! __('Transparency and honesty are among our core values. By showing ourselves and giving you the opportunity to meet us in person, we not only want to earn your trust, but also show our commitment to full transparency.') !!}
        </p>
        <h1>{{ __("What does it mean for you?") }}</h1>
        <p class="text-padding-x">
            {!! __('This means that you can be sure that with every e-book purchase, you have a real chance of winning and you can keep track of how the draw is made. Come and see the house, meet us in person and make sure TicketVilla is a real, trusted option.') !!}
        </p>

        <h1>{{ __("We are proud to be") }}</h1>
        <p class="text-padding-x">
            {!! __('We do this because we believe that this method can revolutionize the lottery market. We want you to be part of this exciting journey and we look forward to seeing you in person.') !!}
        </p>
        <h1 class="mt-lg-5">
            {{ __("Buy now and be part of this revolution - win the home of your dreams in a transparent and legal way!") }}
        </h1>
        <a href="{{route('frontend.web-shop.buy-ebook')}}" class="common-btn btn-2">{{ __("Buy Now") }}</a>
        <h1>
            {{ __("Special offer, only") }}
            <b class="text-uppercase text-orange">{{ __("RETIRED UNTIL NOW!") }}</b> <br/>
            <b class="text-uppercase text-blue">{{ __("DOUBLE YOUR CHANCES NOW") }}</b>
        </h1>
        <p class="text-padding-x">
            {!! __('For every e-book you buy, you will receive not one but 2 raffle tickets! This means you could be twice as likely to win an impressive €850,000 dream home. Buy one e-book and get two raffle tickets. So you have 2x the chance of being the winner!') !!}
        </p>

        <div class="tickets">
            <a href="#buy-section" class="book">
                <img src="{{asset('frontend/images/special-announcement.png')}}" alt="" srcset="">
            </a>
        </div>

        <a href="#buy-section" class="common-btn btn-2"
        >{{__("PLEASE DOUBLE CHANCE, TAKES YOU DOWN TO WHERE YOU CAN BUY")}}</a>

        <h1 class="mt-lg-5">{{ __("YOUR DREAM HOME") }}</h1>
        <p class="text-padding-x">
            {!! __('Imagine owning a stunning modern house in Söchau worth €850,000! The property is located near the thermal region of Styria, famous for its beautiful landscapes and wellness facilities.') !!}
        </p>
        <div class="image mt-5">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hz6dGhiNso0?si=Iy0FNPMsl1eH5jNS"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>

    <section class="container common-section location">
        <h1>{{ __("Location") }}</h1>
        <p>{{ __("Exclusive, quiet neighborhood, ideal for relaxing and recharging.") }}</p>
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Rectangle 268.png')}}" alt="" srcset=""/>
        </a>
    </section>

    <section class="container common-section location size">
        <h1>{{ __("Size") }}</h1>
        <p>
            {!! __('The house is 411 square meters with a plot of 1230 square meters, providing ample space for all members of the family.') !!}
        </p>
        <div class="size-images mt-4">
            <div class="size-box">
                <img src="{{asset('frontend/images/size-1.png')}}" alt="" srcset=""/>
            </div>
            <div class="size-box">
                <img src="{{asset('frontend/images/size-2.png')}}" alt="" srcset=""/>
            </div>
            <div class="size-box">
                <img src="{{asset('frontend/images/size-3.png')}}" alt="" srcset=""/>
            </div>
            <div class="size-box">
                <img src="{{asset('frontend/images/size-4.png')}}" alt="" srcset=""/>
            </div>
            <div class="size-box">
                <img src="{{asset('frontend/images/size-5.png')}}" alt="" srcset=""/>
            </div>
            <div class="size-box">
                <img src="{{asset('frontend/images/size-6.png')}}" alt="" srcset=""/>
            </div>
        </div>
    </section>
    <!-- slider section -->
    <section class="container common-section location facilities">
        <h1>{{ __("Facilities") }}</h1>
        <p>
            {{ __("Six bedrooms, four bathrooms, a modern kitchen and a spacious living room ensure comfort and luxury.") }}
        </p>
        <div class="card-slider mt-4 owl-carousel">
            @foreach ($giftRandomImages ?? [] as $item)
            <div class="card-item">
                <img src="{{ $item->image ? asset($item->image) : asset('frontend/images/single-chance1.png') }}"
                     alt="{{ $item->gift_image_type ?? '' }}"
                     srcset=""/>
                <div class="text">
              <span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="34"
                    height="26"
                    viewBox="0 0 34 26"
                    fill="none"
                >
                  <path
                      d="M21.2592 22.364C20.781 22.364 20.3661 22.0086 20.3041 21.5219C20.2371 20.9938 20.6106 20.5114 21.1384 20.4441C24.184 20.056 26.9113 19.2308 28.8179 18.1199C30.5616 17.1041 31.5216 15.9099 31.5216 14.7573C31.5216 13.487 30.3982 12.4476 29.4554 11.799C29.017 11.4974 28.906 10.8975 29.2077 10.4587C29.5094 10.0203 30.1095 9.90937 30.548 10.211C32.4461 11.5167 33.4493 13.0887 33.4493 14.7576C33.4493 16.6516 32.1835 18.3902 29.7885 19.7855C27.6327 21.0415 24.7259 21.9305 21.3821 22.3564C21.3408 22.3614 21.2996 22.364 21.2592 22.364ZM16.7651 20.9832L14.1949 18.4131C13.8184 18.0365 13.2082 18.0365 12.8317 18.4131C12.4555 18.7893 12.4555 19.3997 12.8317 19.776L13.5827 20.527C10.7033 20.2295 8.08743 19.5591 6.06192 18.585C3.7846 17.4899 2.47843 16.0946 2.47843 14.7573C2.47843 13.623 3.41366 12.4442 5.11159 11.4377C5.56973 11.1663 5.72073 10.575 5.44944 10.1172C5.1779 9.6591 4.5865 9.50803 4.12875 9.77932C1.17148 11.5323 0.550781 13.4539 0.550781 14.7573C0.550781 16.8958 2.21138 18.8722 5.22661 20.3224C7.56683 21.4476 10.5941 22.2013 13.8922 22.493L12.8317 23.5534C12.4555 23.9297 12.4555 24.5401 12.8317 24.9166C12.9212 25.0062 13.0275 25.0772 13.1445 25.1256C13.2615 25.174 13.3869 25.1988 13.5135 25.1987C13.7599 25.1987 14.0066 25.1046 14.1949 24.9166L16.7651 22.3464C17.1413 21.9699 17.1413 21.3595 16.7651 20.9832Z"
                      fill="white"
                  />
                  <path
                      d="M11.0948 10.346L10.0022 10.8486L11.1291 11.2688C11.4257 11.3794 11.6486 11.5327 11.7983 11.7298C11.9445 11.9224 12.049 12.1937 12.049 12.5949V12.8269C12.049 13.7018 11.7546 14.2352 11.3364 14.5644C10.898 14.9094 10.2516 15.0861 9.4603 15.0861C8.5159 15.0861 7.92227 14.8005 7.56764 14.4575C7.20735 14.1091 7.05469 13.6648 7.05469 13.2787C7.05469 13.194 7.06219 13.1454 7.06831 13.1203C7.08054 13.1161 7.09971 13.1106 7.12804 13.1052C7.19975 13.0914 7.30454 13.0827 7.45805 13.0827C7.63852 13.0827 7.76409 13.0928 7.85096 13.1086C7.88779 13.1153 7.91316 13.1222 7.9298 13.1277C7.9326 13.1482 7.93472 13.1773 7.93472 13.2177C7.93472 13.4421 7.98832 13.6535 8.1046 13.8375C8.21987 14.0199 8.37802 14.1458 8.54179 14.2307C8.85323 14.3923 9.2231 14.4258 9.52128 14.4258C9.97537 14.4258 10.4256 14.3469 10.7463 14.0291C11.0685 13.7098 11.1447 13.2637 11.1447 12.8269V12.5949C11.1447 12.0773 10.9787 11.6491 10.5912 11.3862C10.2491 11.154 9.82282 11.1183 9.47251 11.1183C9.4687 11.1183 9.46542 11.1182 9.46262 11.1181C9.45605 11.1054 9.44672 11.0825 9.43868 11.0463C9.42894 11.0025 9.42313 10.9481 9.42313 10.8859C9.42313 10.8236 9.42894 10.7692 9.4387 10.7253C9.44674 10.6891 9.45607 10.6662 9.46265 10.6535C9.46544 10.6533 9.46871 10.6532 9.47251 10.6532C9.69641 10.6532 10.0985 10.6491 10.4279 10.3951C10.7862 10.1188 10.9248 9.66585 10.9248 9.10331C10.9248 8.65432 10.7934 8.26521 10.474 8.00854C10.1774 7.7702 9.81106 7.7243 9.52121 7.7243C9.20612 7.7243 8.85561 7.75783 8.57676 7.93536C8.24386 8.1473 8.11792 8.4881 8.11792 8.84706C8.11792 8.91665 8.10987 8.95472 8.10391 8.9726C8.1024 8.97712 8.10117 8.97991 8.10046 8.98136C8.09998 8.98173 8.09933 8.98222 8.09848 8.98281C8.09643 8.98423 8.09296 8.98644 8.08766 8.98922C8.07699 8.99481 8.05853 9.00288 8.02931 9.0111C7.96908 9.02803 7.873 9.04282 7.72663 9.04282C7.51904 9.04282 7.38483 9.03155 7.2978 9.01443C7.27789 9.01051 7.26243 9.00666 7.25069 9.00328C7.24334 8.96109 7.23794 8.89157 7.23794 8.77355C7.23794 8.41213 7.36803 8.00061 7.69321 7.67997C8.01307 7.36458 8.57178 7.08837 9.52121 7.08837C10.2509 7.08837 10.8095 7.22307 11.1741 7.48252C11.5081 7.72016 11.7438 8.10812 11.7438 8.7981C11.7438 9.18614 11.6714 9.54469 11.5464 9.82355C11.4205 10.1045 11.2579 10.271 11.0948 10.346ZM15.3697 10.5681V11.8554L16.2386 10.9056C16.4864 10.6347 16.8578 10.531 17.396 10.531C18.0297 10.531 18.5346 10.6714 18.8759 10.9614C19.2017 11.2383 19.4596 11.7215 19.4596 12.5949V12.7049C19.4596 13.646 19.1714 14.2115 18.7715 14.5524C18.3572 14.9054 17.743 15.0861 16.9686 15.0861C16.1941 15.0861 15.5761 14.9054 15.1583 14.5514C14.7554 14.21 14.4651 13.6445 14.4651 12.7049V9.46956C14.4651 8.53462 14.7612 7.971 15.1794 7.62823C15.6153 7.27097 16.2629 7.08837 17.0785 7.08837C18.0022 7.08837 18.5906 7.37252 18.9452 7.71539C19.3061 8.06432 19.4597 8.50653 19.4597 8.88349C19.4597 8.9932 19.4461 9.05293 19.4359 9.08138C19.4315 9.09345 19.4282 9.09872 19.4274 9.09984C19.4263 9.10071 19.4218 9.10392 19.4118 9.10849C19.3999 9.11387 19.3806 9.12102 19.351 9.12796C19.2895 9.14239 19.199 9.1525 19.0683 9.1525C18.83 9.1525 18.6908 9.11855 18.6251 9.08102C18.6019 9.06774 18.5971 9.0593 18.5956 9.05663L18.5955 9.05643C18.5935 9.05287 18.5795 9.02717 18.5795 8.95675C18.5795 8.51749 18.3362 8.19365 18.0254 8.00272C17.7302 7.8214 17.366 7.74865 17.0175 7.74865C16.574 7.74865 16.1385 7.86613 15.8172 8.19235C15.4971 8.51738 15.3697 8.96926 15.3697 9.4695V10.5681ZM15.3697 12.8392C15.3697 13.3358 15.4921 13.7833 15.8023 14.1059C16.1157 14.4319 16.5408 14.5477 16.9686 14.5477C17.3965 14.5477 17.8206 14.4316 18.1315 14.1029C18.4376 13.7792 18.5551 13.3321 18.5551 12.8392V12.7293C18.5551 12.2191 18.441 11.7611 18.1285 11.4334C17.8111 11.1005 17.3795 10.9961 16.9562 10.9961C16.5542 10.9961 16.1371 11.0926 15.8211 11.3933C15.5004 11.6985 15.3697 12.1315 15.3697 12.6193V12.8392ZM21.9368 12.7049V9.46956C21.9368 8.52838 22.2249 7.96288 22.6248 7.62206C23.0391 7.269 23.6533 7.08837 24.4279 7.08837C25.2024 7.08837 25.8203 7.26902 26.238 7.62297C26.6408 7.96438 26.9311 8.52989 26.9311 9.46956V12.7049C26.9311 13.6445 26.6408 14.2101 26.238 14.5515C25.8203 14.9054 25.2024 15.0861 24.4279 15.0861C23.6533 15.0861 23.0391 14.9054 22.6248 14.5524C22.2249 14.2116 21.9368 13.646 21.9368 12.7049ZM26.0265 9.46956C26.0265 8.9729 25.9042 8.52444 25.5967 8.19957C25.285 7.87012 24.8599 7.74872 24.4279 7.74872C23.9955 7.74872 23.5716 7.87037 23.2623 8.2025C22.9588 8.52836 22.8413 8.97649 22.8413 9.46956V12.7049C22.8413 13.198 22.9588 13.6461 23.2623 13.9719C23.5716 14.3041 23.9955 14.4257 24.4279 14.4257C24.8599 14.4257 25.2849 14.3043 25.5967 13.9749C25.9042 13.65 26.0265 13.2015 26.0265 12.7049V9.46956ZM29.7448 6.07982C28.4263 6.07982 27.3533 5.00654 27.3533 3.68835C27.3533 2.37016 28.4263 1.29688 29.7448 1.29688C31.0629 1.29688 32.1362 2.3702 32.1362 3.68835C32.1362 5.0065 31.0629 6.07982 29.7448 6.07982ZM29.7448 2.22452C28.9369 2.22452 28.2809 2.8809 28.2809 3.68835C28.2809 4.49605 28.937 5.15217 29.7448 5.15217C30.5522 5.15217 31.2086 4.49614 31.2086 3.68835C31.2086 2.88082 30.5523 2.22452 29.7448 2.22452Z"
                      fill="white"
                      stroke="white"
                  />
                </svg>
              </span>
                    <span>{{ $item->gift_image_type ?? '' }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- special features -->

    <section class="container common-section location special-features">
        <h1>{{ __("Special features") }}</h1>
        <p>
            {{ __("Spacious terrace with barbecue, private garden and garage for two cars.") }}
        </p>
        <div class="feature-images mt-4">
            <a href="#buy-section" class="feature-box">
                <img src="{{asset('frontend/images/Rectangle 268.png')}}" alt="" srcset=""/>
            </a>
            <a href="#buy-section" class="feature-box">
                <img src="{{asset('frontend/images/home-image.png')}}" alt="" srcset=""/>
            </a>
        </div>
        <h1 class="special-feature-h1 text-padding-x">
            {!! __('This dream home can now be yours with a simple e-book purchase. Don\'t miss this unique opportunity to win the home of your dreams!') !!}
        </h1>

        <a href="{{route('frontend.web-shop.buy-ebook')}}"
           class="common-btn btn-2 mt-2 text-padding-x">{{ __("Buy") }}</a>
        <h1 class="special-feature-h2 mt-5">
            {!! __('Just 3 simple steps to be the happy owner of a property worth €850,000.') !!}
        </h1>
        <h4 class="mt-lg-5">{{ __("Simple and quick!") }}</h4>
        <p class="font-26 mt-2 text-padding-x">
            {!! __('Select the e-book on TicketVilla.eu and buy it. This e-book not only contains valuable information, it is also your ticket to the prize draw.') !!}
        </p>
    </section>
    <section class="container common-section prize">
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Rectangle 271.png')}}" alt=""/>
        </a>
        <div class="prize-text">
            {!! __('Automatically get a lottery ticket Immediately after purchase you will receive a lottery ticket in your name. No need to register or take any additional steps. All e-book buyers are automatically entered into the draw. Take part in the live draw Excitement and transparency! Follow the live draw to find out who will win a house worth €850,000. The live stream will give you the chance to be part of the big moment') !!}
        </div>
    </section>
    <section class="container common-section winner">
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Rectangle 272.png')}}" alt=""/>
        </a>
        <h1>{{ __("Why should you participate?") }}</h1>
        <p class="text-padding-x">
            {!! __('This process offers you the chance to win a luxury home with the purchase of a single e-book. Don\'t miss this once-in-a-lifetime opportunity! Buy NOW and take the first step towards your dream home!') !!}
        </p>
        <a href="{{route('frontend.web-shop.buy-ebook')}}" class="common-btn btn-2">{{ __("Get tickets") }}</a>
        <h3>
            {!! __('This is not just a simple prize game. This is YOUR CHANCE to change your life.') !!}
        </h3>
        <div class="winner-text">
            {!! __("Imagine being able to own this stunning €850,000 home with just the purchase of an e-book. This is a unique opportunity not to be missed! Now you won't believe this, but it's true You can win more than just the house! When you buy an e-book, you also have the chance to win other fantastic bonuses, such as a A €20,000 furniture voucher to personalize your new home, 60,000 euros worth of house extension to give you even more space.") !!}
        </div>
        <a href="#buy-section" class="image">
            <img src="{{asset('frontend/images/Rectangle 273.png')}}" alt=""/>
        </a>
    </section>
</main>
<!-- Modal -->
<div class="house--tour--area--wrapper">
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header"> --}}
                {{-- </div> --}}

                <div class="modal-body text-center">
                    <div class="d-flex justify-content-end">

                        <button type="button" class="close btn btn-outline-dark text-light" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img src="" id="modalImage" class="img-fluid" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container footer-video-section">
        <h1>{{ __("YOUR DREAM HOME") }}</h1>
        <div class="footer-image">
            <iframe width="560" height="315"
                    src="{{locale() === 'hu' ? 'https://www.youtube.com/embed/Y1mYsNYV4u8?si=tLXOJf9KAixHhRT0' : (locale()==='de' ? 'https://www.youtube.com/embed/AypYwVveK5U?si=zKgf_mN3E1KHyZFD' : 'https://www.youtube.com/embed/CiYA4uQLtUs?si=BkJYqdWbypxq98vV')}}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    @if(!empty($campaign))
        <div class="container ebook-section">
            <div class="left">
                <div class="ticket-box">
                    <img
                        width="100%"
                        style="border-radius: 5px"
                        src="{{$campaign->thumbnail ?? asset('admin/images/ticket.png')}}"
                        alt="{{$campaign->name_en}}"
                    />
                </div>
                <div class="ebook-counter">
                    <h1>{{ !empty($campaign) ? $campaign['name_'.locale()] : __('E-Book')}}</h1>
                    <p><span>{{__("Price")}}:</span> <span> {{number_format($campaign->price,2)}}€</span></p>
                    <div class="ticket--purchase--amount--wrapper">
                        <button type="button" class="minus" id="decrement-button">-</button>
                        <input type="number" id="quantity-value" readonly value="1"/>
                        <button type="button" class="plus" id="increment-button">+</button>
                    </div>
                </div>
            </div>
            <div class="right">
                @if($campaign->how_many_buy && $campaign->how_many_free)
                    <p>
                        #{{ __("x Tickets left until you get x for free",['buy'=>$campaign->how_many_buy,'free' => $campaign->how_many_free]) }}
                        🎉</p>
                @endif
                <form
                    action="{{Auth::check() ? route('user.checkout') : route('frontend.web-shop.checkout')}}"
                    method="GET">
                    <input type="hidden" name="quantity" class="quantity" value="1">
                    <button type="submit" class="buy-ticket">
                        {{ __("Buy ticket") }}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="21"
                            height="18"
                            viewBox="0 0 21 18"
                            fill="none"
                        >
                            <path
                                d="M19.679 9.20393L1.89062 9.20393"
                                stroke="white"
                                stroke-width="2.37179"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M12.5039 2.05882L19.6786 9.20265L12.5039 16.3477"
                                stroke="white"
                                stroke-width="2.37179"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg
                        >
                    </button>
                </form>
            </div>
        </div>
    @endif
    <div id="buy-section"></div>
    <p class="copyright">
        © Copyright 2024, All Rights Reserved by TicketVilla
    </p>
</footer>

<!-- ==== All Js Links ==== -->
@include('frontend.partials.scripts')
<script>
    //quantity value set to hidden input

    let quantity = 1;
    $("#increment-button").on('click', function () {
        if (quantity < 9) {
            quantity++
            $(".quantity").each(function () {
                $(this).val(quantity)
            })
        }

    })
    $("#decrement-button").on('click', function () {
        if (quantity > 1) {
            quantity--
            $(".quantity").each(function () {
                $(this).val(quantity)
            })
        }
    })


    window.addEventListener('DOMContentLoaded', function () {
        $("#change_locale").on("change", function () {
            let code = $(this).val();
            var url = '{{ route('setLocale', ':code') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':code', code),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (resp) {
                    location.reload();
                }, // success end
                error: function (error) {
                    flasher.error(error?.responseJson?.message);
                } // Error
            })
        })
    })
</script>
<script>
    $(document).ready(function () {
        function isMobileDevice() {
            return window.innerWidth <= 600;
        }

        // make image big on click
        $('.card-item').on('click', function (e) {
            e.preventDefault();
            if (!isMobileDevice()) {
                var imgSrc = $(this).find('img').attr('src');
                $('#modalImage').attr('src', imgSrc);
                $('#imageModal').modal('show');
            }
        });

        // Handle modal close button click event
        $('.close').on('click', function () {
            $('#imageModal').modal('hide');
        });
    });
</script>
<script src="https://ticketvilla-landing.vercel.app/assets/js/main.js"></script>
</body>
</html>

