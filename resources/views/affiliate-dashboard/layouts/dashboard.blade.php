@extends('affiliate-dashboard.app')
@section('title', 'Affiliate Dashboard')
@section('header_title')
    Affiliate Dashboard
@endsection;
@push('style')
    <link rel="stylesheet" href="{{asset('user/css/bootstrap-tagsinput.css')}}">
    <style>
        .bootstrap-tagsinput {
            margin: 0;
            width: 100%;
            padding: 0.5rem 0.75rem 0;
            font-size: 1rem;
            line-height: 1.25;
            transition: border-color 0.15s ease-in-out;

            &.has-focus {
                background-color: #fff;
                border-color: #5cb3fd;
            }

            .label-info {
                display: inline-block;
                background-color: #636c72;
                padding: 0 .4em .15em;
                border-radius: .25rem;
                margin-bottom: 0.4em;
            }

            input {
                margin-bottom: 0.5em;
            }
        }

        .bootstrap-tagsinput .tag [data-role="remove"]:after {
            content: '\00d7';
        }

        .affiliate--invite--people input {
            height: 44px !important;
        }

        .invite--form > div {
            display: flex;
            column-gap: 20px;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main">
        <div class="row">
            <div class="col-xxl-7">
                <!-- referral--link--box  -->
                <x-affiliate.referral-link-box/>
            </div>
            <div class="col-xxl-5">
                {{--profit details --}}
                <x-affiliate.profit-details :profitDetails="$profitDetails" :todayProfitDetails="$toDayProfitDetails"/>
            </div>
            <div class="col-lg-6 custom--width-large mt_35">
                <!-- Earning Overview box  -->
                <div
                    class="sale--analytic analytic--box box--common affiliates-earning--overview"
                >
                    <!-- title  -->
                    <div class="top--title">
                        <div>
                            <h3>Earning Overview</h3>
                            <!-- progress -->
                            <div class="progress">
                                <!-- icon -->
                                <div class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="12"
                                        height="8"
                                        viewBox="0 0 12 8"
                                        fill="none"
                                    >
                                        <path
                                            d="M10.5913 1.29492L5.94581 5.94038L4.17611 3.28583L0.636719 6.82522"
                                            stroke="#36B37E"
                                            stroke-width="1.24432"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8.37891 1.29492H10.591V3.50704"
                                            stroke="#36B37E"
                                            stroke-width="1.24432"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                                <p><span>+60% </span>more in 2022</p>
                            </div>
                        </div>
                        <select>
                            <option value="1" selected>Day</option>
                            <option value="2">Week</option>
                            <option value="3">Month</option>
                            <option value="4">Since Start</option>
                        </select>
                    </div>
                    <div class="chart">
                        <div id="sales--chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-small mt_35">
                <!-- affiliates--customer--list  -->
                <div class="top--affiliates box--common affiliates--customer--list">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Customer List</h3>
                        <select>
                            <option value="1" selected>Day</option>
                            <option value="2">Week</option>
                            <option value="3">Month</option>
                            <option value="4">Since Start</option>
                        </select>
                    </div>
                    <!-- affiliates table  -->
                    <div class="affiliates--table--wrapper default--scrollbar">
                        <table class="affiliates--table">
                            <thead>
                            <tr>
                                <th>N0</th>
                                <th>Customers Name</th>
                                <th>Customers Email</th>
                                <th>Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($userWithTotalCommissions as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="affiliates--profile">
                                            <img
                                                src="{{!empty($user->referralUser?->avatar) ? asset($user->referralUser->avatar) : asset('admin/images/user.png')}}"
                                                alt="{{$user->referralUser?->first_name}}"/>
                                            <p>{{$user->referralUser?->first_name.' '.$user->referralUser?->last_name}}</p>
                                        </div>
                                    </td>
                                    <td class="email">{{mask_email($user->referralUser?->email)}}</td>
                                    <td class="sales">{{number_format($user->total_amount,2)}}€</td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="2" rowspan="2">Not have any user.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-large mt_35">
                <!-- Affiliate Reward List  -->
                <div class="top--affiliates box--common affiliate--reward--list">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Affiliate Reward List</h3>
                        <p>Your Rank <span>#{{$rank?->user_rank ?? 0}}</span></p>
                    </div>
                    <!-- affiliates table  -->
                    <div class="affiliates--table--wrapper default--scrollbar">
                        <table class="affiliates--table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ranks</th>
                                <th>Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rankList as $rank)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="reward--rank">
                                            <div class="icon">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    viewBox="0 0 16 16"
                                                    fill="none"
                                                >
                                                    <path
                                                        d="M11.1315 12.6542H4.86485C4.58485 12.6542 4.27151 12.4342 4.17818 12.1676L1.41818 4.44755C1.02485 3.34089 1.48485 3.00089 2.43151 3.68089L5.03151 5.54089C5.46485 5.84089 5.95818 5.68755 6.14485 5.20089L7.31818 2.07422C7.69151 1.07422 8.31151 1.07422 8.68485 2.07422L9.85818 5.20089C10.0448 5.68755 10.5382 5.84089 10.9648 5.54089L13.4048 3.80089C14.4448 3.05422 14.9448 3.43422 14.5182 4.64089L11.8248 12.1809C11.7248 12.4342 11.4115 12.6542 11.1315 12.6542Z"
                                                        stroke="url(#paint0_linear_18929_360)"
                                                        stroke-width="1.3"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M4.33203 14.668H11.6654"
                                                        stroke="url(#paint1_linear_18929_360)"
                                                        stroke-width="1.3"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M6.33203 9.33203H9.66536"
                                                        stroke="url(#paint2_linear_18929_360)"
                                                        stroke-width="1.3"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <defs>
                                                        <linearGradient
                                                            id="paint0_linear_18929_360"
                                                            x1="1.27734"
                                                            y1="6.98922"
                                                            x2="14.6706"
                                                            y2="6.98922"
                                                            gradientUnits="userSpaceOnUse"
                                                        >
                                                            <stop offset="0.83" stop-color="#E8880F"/>
                                                            <stop offset="1" stop-color="#FFCF7E"/>
                                                        </linearGradient>
                                                        <linearGradient
                                                            id="paint1_linear_18929_360"
                                                            x1="4.33203"
                                                            y1="15.168"
                                                            x2="11.6654"
                                                            y2="15.168"
                                                            gradientUnits="userSpaceOnUse"
                                                        >
                                                            <stop offset="0.83" stop-color="#E8880F"/>
                                                            <stop offset="1" stop-color="#FFCF7E"/>
                                                        </linearGradient>
                                                        <linearGradient
                                                            id="paint2_linear_18929_360"
                                                            x1="6.33203"
                                                            y1="9.83203"
                                                            x2="9.66536"
                                                            y2="9.83203"
                                                            gradientUnits="userSpaceOnUse"
                                                        >
                                                            <stop offset="0.83" stop-color="#E8880F"/>
                                                            <stop offset="1" stop-color="#FFCF7E"/>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <p><span>{{$rank->first_name.' '.$rank->last_name }}(#{{$rank?->user_rank ?? 0}})</span>
                                                Rank</p>
                                        </div>
                                    </td>
                                    <td class="sales">{{number_format($rank->balance ?? 0,2)}}€</td>
                                </tr>
                            @empty
                                <tr>
                                    <td rowspan="2" colspan="2">Not found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 custom--width-small mt_35">
                <!-- affiliate--invite--people  -->
                <div class="affiliate--invite--people box--common h-100">
                    <!-- top title  -->
                    <div class="top--title mb_20">
                        <h3>Invite People</h3>
                    </div>
                    <div class="invite--form">
                        <div>
                            <input
                                type="text"
                                name="emails"
                                placeholder="enter emails"
                            />
                            <button id="send_invitation" class="send--btn btn--common-affiliate">
                                Send
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="25"
                                    viewBox="0 0 24 25"
                                    fill="none"
                                >
                                    <path
                                        d="M22.101 11.0622L2.753 1.62319C2.56707 1.53258 2.36114 1.49077 2.15459 1.5017C1.94805 1.51263 1.74768 1.57593 1.57235 1.68565C1.39702 1.79538 1.25248 1.9479 1.15236 2.12889C1.05223 2.30987 0.999799 2.51335 1 2.72019V2.75519C1.0001 2.9187 1.02025 3.08158 1.06 3.24019L2.916 10.6642C2.94088 10.7631 2.9954 10.852 3.07226 10.919C3.14912 10.9861 3.24464 11.028 3.346 11.0392L11.503 11.9462C11.6387 11.9625 11.7638 12.028 11.8545 12.1303C11.9452 12.2325 11.9952 12.3645 11.9952 12.5012C11.9952 12.6379 11.9452 12.7698 11.8545 12.8721C11.7638 12.9744 11.6387 13.0399 11.503 13.0562L3.346 13.9632C3.24464 13.9744 3.14912 14.0163 3.07226 14.0833C2.9954 14.1504 2.94088 14.2393 2.916 14.3382L1.06 21.7612C1.02025 21.9198 1.0001 22.0827 1 22.2462V22.2812C0.999969 22.4879 1.05252 22.6913 1.15272 22.8721C1.25292 23.053 1.39747 23.2054 1.57277 23.315C1.74808 23.4246 1.94838 23.4878 2.15484 23.4987C2.36131 23.5096 2.56714 23.4678 2.753 23.3772L22.1 13.9382C22.3694 13.8067 22.5965 13.6022 22.7554 13.348C22.9142 13.0937 22.9985 12.8 22.9985 12.5002C22.9985 12.2004 22.9142 11.9066 22.7554 11.6524C22.5965 11.3981 22.3704 11.1936 22.101 11.0622Z"
                                        fill="white"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div id="responseMessage"></div>
                        <p>Separate multiple entries with a comma, space, or line break</p>
                    </div>
                    <!-- email box  -->
                    <div class="email--box">
                        <h3>We’ll include this message from you in the email:</h3>
                        <p>Hi there! I’d like to introduce you to Ticketvilla.
                            Ticketvilla can help you convert more of your visitors into actively engaged. Confirmed,
                            Leads, delivered straight into your marketing funnel. Where you need them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{asset('user/js/bootstrap-tagsinput.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var emailsInput = $('input[name="emails"]').tagsinput({
                trimValue: true,
                confirmKeys: [13, 44, 32],
                focusClass: 'my-focus-class'
            });

            $('.bootstrap-tagsinput input').on('focus', function () {
                $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
            }).on('blur', function () {
                $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
            });


            $("#send_invitation").on('click', function () {
                $("#responseMessage").html('')
                var emails = $('input[name="emails"]').val()
                $.ajax({
                    url: "{{ route('affiliate.send-invitation') }}", // Route for the request
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        'emails': emails?.split(',')
                    },
                    success: function (response) {
                        if (response.success) {
                            $("#responseMessage").html(`<div class="alert alert-success mt-3" role="alert">
                                   ${response.message}
                            </div>`)
                            $('input[name="emails"]').tagsinput('removeAll')
                        } else {
                            $("#responseMessage").html(`<div class="alert alert-danger mt-3" role="alert">
                                   ${response.message}
                            </div>`)
                        }

                    },
                    error: function (xhr) {
                        $("#responseMessage").html(`<div class="alert alert-danger mt-3" role="alert">
                           ${xhr.responseJSON?.message}
                    </div>`)
                    }
                });
            })
        });

    </script>
@endpush



