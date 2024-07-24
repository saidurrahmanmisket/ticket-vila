@extends('frontend.app')

@section('title', 'Ticket Villa')

@push('style')
    {{--    Success Message Style--}}
    <style>

        :root {
            --primary--gradient: linear-gradient(
                177deg,
                rgba(223, 241, 247, 1) 30%,
                rgba(245, 232, 220, 1) 100%
            );
            --heading-color: #141414;
            --sidebar-color: #010c0f;
            --body-color: #f5f7fb;
            --white: #ffffff;
            --border-color: #eee;
            --para-color: #868a9b;
            --green: #12af6c;
            --orange: #fc9719;
            --sky-blue: #04baff;
            --skyblue-light: rgba(59, 171, 255, 0.2);
        }

        .user--common--btn {
            display: inline-block;
            padding: 16px 47px;
            background-color: var(--sky-blue);
            border-radius: 60px;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            letter-spacing: -0.36px;
            color: var(--white);
            border: 1px solid transparent;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

    </style>
@endpush
@section('content')
    {{--    Payment Success Message--}}
        <section class="app--content--main user--portal buy-ebook container section--bottom--gap banner--top--gap">
            <div class="checkout--area">
                <div class="success--popup checkout--popup" id="success--popup">
                    <div class="step successful">
                        <div class="img--area text-center">
                            <img src="{{asset('user/images/cancelled.png')}}" alt=""/>
                        </div>
                        <h4 class="text-danger">{{ __("Payment Cancel") }} !!!</h4>
                        <div class="buttons mt-5">
                            <a class='user--common--btn'
                               href='{{route('frontend.web-shop.buy-ebook')}}'>{{ __("Back to Web Shop") }}</a
                            >
                            <a class='user--common--btn' href='{{route('user.dashboard')}}'>
                                {{ __("Dashboard") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
