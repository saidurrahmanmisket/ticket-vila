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
    @if(session('payment_success'))
        <section class="app--content--main user--portal buy-ebook container section--bottom--gap banner--top--gap">
            <div class="checkout--area">
                <div class="success--popup checkout--popup" id="success--popup">
                    <div class="step successful">
                        <div class="img--area text-center">
                            <img src="{{asset('user/images/congra.png')}}" alt=""/>
                        </div>
                        <h4>{{ __("Congratulation!!!") }}</h4>
                        <p>
                            {{ __("You have bought") }} {{session('buy_ticket')}}{{__("x eBook and got")}} {{session('free_ticket')}}{{ __("x free house ticket at TicketVilla on") }} {{date('d M Y \a\t h:i A',strtotime(session('buy_time')))}}
                        </p>
                        <div class="buttons">
                            <a class='user--common--btn'
                               href='{{route('user.dashboard')}}'>{{ __("Back to Dashboard") }}</a
                            >
                            <a class='user--common--btn' href='{{route('user.tickets')}}'>
                                {{ __("View Ticket") }}
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M5.25 7.4999C5.25 9.27768 6.70528 10.7241 8.50203 10.7241C10.2907 10.7241 11.7459 9.27768 11.7459 7.4999C11.7459 5.71404 10.2907 4.26758 8.50203 4.26758C6.70528 4.26758 5.25 5.71404 5.25 7.4999ZM13.2818 2.53806C14.7046 3.63705 15.9159 5.24513 16.7859 7.25725C16.8509 7.41078 16.8509 7.58856 16.7859 7.73402C15.046 11.7583 11.9485 14.1663 8.5013 14.1663H8.49317C5.05415 14.1663 1.95659 11.7583 0.216749 7.73402C0.151709 7.58856 0.151709 7.41078 0.216749 7.25725C1.95659 3.23301 5.05415 0.833008 8.49317 0.833008H8.5013C10.2249 0.833008 11.859 1.43099 13.2818 2.53806ZM8.50127 9.50986C9.61509 9.50986 10.5257 8.60481 10.5257 7.49774C10.5257 6.38259 9.61509 5.47754 8.50127 5.47754C8.40371 5.47754 8.30615 5.48562 8.21672 5.50178C8.1842 6.39067 7.45249 7.10178 6.55005 7.10178H6.5094C6.48501 7.23107 6.46875 7.36037 6.46875 7.49774C6.46875 8.60481 7.37932 9.50986 8.50127 9.50986Z"
                                        fill="white"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection


@push('scripts')
    {{--    for facebook pixel buy trac --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // for purchase tracking
            let totalPrice = {{ session('total_price') ?? 0 }};
            fbq('track', 'Purchase', {currency: "EUR", value: totalPrice});
        });
    </script>
@endpush
