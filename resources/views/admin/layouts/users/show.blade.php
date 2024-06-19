@extends('admin.app')
@section('title', 'User')
@section('header_title')
    User
@endsection;
@push('style')
    <style>
        .action--btn-modified {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            gap: 10px;
            padding: 10px 26px;
            border: 2px solid #f2f2f2;
            border-radius: 60px;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            color: var(--heading-color);
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main">
    <div class="user--area tickets--area">
        <!-- top title  -->
        <div class="top--title">
            <h3>User : {{$user->first_name}} {{$user->last_name}}</h3>
            <a href="{{url()->previous()}}" class="action--btn">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="17"
                    height="15"
                    viewBox="0 0 17 15"
                    fill="none"
                >
                    <path
                        d="M0.75 7.72559L15.75 7.72559"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M6.79687 1.701L0.746875 7.725L6.79688 13.75"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                Back
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- information--box  -->
                <div class="user--information information--box">
                    <h4 class="common--title">User Information</h4>
                    <div class="informations">
                        <img src="{{!empty($user->avatar) ? asset($user->avatar) : asset('admin/images/user.png') }}" alt="" />
                        <p class="common--pair--text">
                            First Name : <span>{{$user->first_name}}</span>
                        </p>
                        <p class="common--pair--text">
                            Last Name : <span>{{$user->last_name}}</span>
                        </p>
                        <p class="common--pair--text">
                            Email Address : <span>{{$user->email}}</span>
                        </p>
                        <p class="common--pair--text">Tickets : <span>{{$user->tickets_count}}</span></p>
                        <p class="common--pair--text">
                            Total spend : <span class="text--green">{{number_format($totalSpent,2)}} €</span>
                        </p>
                        <p class="common--pair--text">Role : <span>{{$user->role}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="more--informations information--box">
                    <!-- general info  -->
                    <div class="general--info">
                        <div>
                            <h4 class="common--title">General Information</h4>
                            <p class="common--pair--text">
                                Account Created : <span>{{date('d/m/Y - g:i A',strtotime($user->created_at))}}</span>
                            </p>
                            <p class="common--pair--text">
                                Last Login : <span>{{ !empty($user->last_login_at) ? date('d/m/Y - g:i A',strtotime($user->created_at)) : 'N/A' }}</span>
                            </p>
                            <p class="common--pair--text">
                                IP Address : <span> {{!empty($user->ip_address) ? $user->ip_address : 'N/A'}}</span>
                            </p>
                        </div>
                        <a href="#" class="action--btn" id="ban-user">Ban User</a>
                    </div>

                    <!-- payment information  -->
                    <div class="payment--information mt_25">
                        <h4 class="common--title">Payment Information</h4>
                        <p class="common--pair--text">
                            Name : <span>{{$user->first_name}} {{$user->last_name}}</span>
                        </p>
                        <p class="common--pair--text">
                            Address 01 : <span> {{!empty($user->address_1) ? $user->address_1 : 'N/A'}}</span>
                        </p>
                        <p class="common--pair--text">
                            IP Address : <span> {{!empty($user->ip_address) ? $user->ip_address : 'N/A'}}</span>
                        </p>
                        <p class="common--pair--text">
                            Address 02 : <span>{{!empty($user->address_2) ? $user->address_2 : 'N/A'}}</span>
                        </p>
                        <p class="common--pair--text">City : <span> {{!empty($user->city) ? $user->city : 'N/A'}}</span></p>
                        <p class="common--pair--text">
                            State : <span> {{!empty($user->state) ? $user->state : 'N/A'}}</span>
                        </p>
                        <p class="common--pair--text">
                            Zip Code : <span>{{!empty($user->zip_code) ? $user->zip_code : 'N/A'}}</span>
                        </p>
{{--                        <p class="common--pair--text">--}}
{{--                            Payment Method : <span class="text-orange">Stripe</span>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- tickets  -->
        <div class="tickets default--scrollbar mt_35">
            @forelse($orders as $order)
                <!-- ticket--single  -->
                <div class="ticket--single">
                    <!-- ticket & name  -->
                    <div class="ticket--and--name">
                        <!-- ticket box  -->
                        <div class="ticket--box">
                            <img src="{{ $order->campaign->thumbnail ? asset($order->campaign->thumbnail) : asset('admin/images/ticket.png')}}"
                                 alt=""/>
                            <span>#{{$loop->iteration}}</span>
                        </div>
                        <div>
                            <p class="common--pair--text">
                                Name :
                                <span>{{$order->user->first_name}} {{$order->user->last_name}}</span>
                            </p>
                            <p class="common--pair--text">
                                Email :
                                <span>{{$order->user->email}}</span>
                            </p>
                            <p class="common--pair--text">
                                Gift :
                                <span class="text-orange">No Gift</span>
                            </p>
                        </div>
                    </div>
                    <!-- payment--and--actions  -->
                    <div class="payment--and--actions">
                        <!-- payment informations  -->
                        <div class="payment--informations">
                            <p class="common--pair--text">
                                Payment Method :
                                <span>{{ ucfirst($order->payment_method) }}</span>
                            </p>
                            <p class="common--pair--text">
                                Payment Status :
                                <span style="{{$order->payment_status === \App\Enums\Status::COMPLETED ? 'color:green' : 'color:red'}}">{{ ucfirst($order->payment_status) }}</span>
                            </p>
                            <p class="common--pair--text">
                                Payment Date :
                                <span>{{date('d.m.Y - H:i:s',strtotime($order->created_at))}}</span>
                            </p>
                            <p class="common--pair--text">
                                Amount :
                                <span class="text-green">{{number_format($order->total_price,2)}} €</span>
                            </p>
                            <p class="common--pair--text">
                                Payment ID : <span>{{$order->transaction_id}}</span>
                            </p>
                        </div>
                        <!-- ticket actions  -->
                        <div class="ticket--actions">
                            {{--                            <a href="{{route('admin.ticket.download',$ticket->id)}}" class="action--btn download">--}}
                            {{--                                <svg--}}
                            {{--                                    xmlns="http://www.w3.org/2000/svg"--}}
                            {{--                                    width="24"--}}
                            {{--                                    height="24"--}}
                            {{--                                    viewBox="0 0 24 24"--}}
                            {{--                                    fill="none"--}}
                            {{--                                >--}}
                            {{--                                    <path--}}
                            {{--                                        d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"--}}
                            {{--                                        stroke="#141414"--}}
                            {{--                                        stroke-width="1.5"--}}
                            {{--                                        stroke-miterlimit="10"--}}
                            {{--                                        stroke-linecap="round"--}}
                            {{--                                        stroke-linejoin="round"--}}
                            {{--                                    />--}}
                            {{--                                    <path--}}
                            {{--                                        d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"--}}
                            {{--                                        stroke="#141414"--}}
                            {{--                                        stroke-width="1.5"--}}
                            {{--                                        stroke-miterlimit="10"--}}
                            {{--                                        stroke-linecap="round"--}}
                            {{--                                        stroke-linejoin="round"--}}
                            {{--                                    />--}}
                            {{--                                </svg>--}}
                            {{--                                Download--}}
                            {{--                            </a>--}}
                            <form action="{{route('admin.payment.refund',$order->id)}}" method="POST">@csrf
                                <button type="submit" class="action--btn-modified action--btnv2 mt_20">
                                    Refund
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                    >
                                        <path
                                                d="M2 8.5H14.5"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M6 16.5H8"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M10.5 16.5H14.5"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M22 14.03V16.11C22 19.62 21.11 20.5 17.56 20.5H6.44C2.89 20.5 2 19.62 2 16.11V7.89C2 4.38 2.89 3.5 6.44 3.5H14.5"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M20 9.5V3.5L22 5.5"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M20 3.5L18 5.5"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="mx-auto">Ticket not found!</div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-2">
            {{$orders->links()}}
        </div>
    </div>
    </section>
    <!-- warning popup  -->
    <div class="warning--popup" id="ban--popup">
        <img src="{{asset('admin/images/ban.png')}}" alt="" />
        <h3>Are you Sure!!</h3>
        <p>Do you want to Ban this User on this app?</p>
        <div class="buttons">
            <a href="#" class="popup-close">Yes</a>
            <a href="#" class="danger popup-close">No</a>
        </div>
        <div class="pop--close popup-close">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="37"
                height="37"
                viewBox="0 0 37 37"
                fill="none"
            >
                <path
                    d="M18.4986 16.3204L26.1295 8.68945L28.3098 10.8697L20.6788 18.5006L28.3098 26.1314L26.1295 28.3116L18.4986 20.6808L10.8678 28.3116L8.6875 26.1314L16.3184 18.5006L8.6875 10.8697L10.8678 8.68945L18.4986 16.3204Z"
                    fill="#141414"
                />
            </svg>
        </div>
    </div>
    <!-- warning popup  -->
    {{--    <div class="warning--popup" id="refund--popup">--}}
    {{--        <img src="{{asset('admin/images/refund.png')}}" alt="" />--}}
    {{--        <h3>Are you Sure!!</h3>--}}
    {{--        <p>Do you want to Refund this Payments?</p>--}}
    {{--        <div class="buttons">--}}
    {{--            <a href="{{}}" class="">Yes</a>--}}
    {{--            <a href="#" class="danger popup-close">No</a>--}}
    {{--        </div>--}}
    {{--        <div class="pop--close popup-close">--}}
    {{--            <svg--}}
    {{--                xmlns="http://www.w3.org/2000/svg"--}}
    {{--                width="37"--}}
    {{--                height="37"--}}
    {{--                viewBox="0 0 37 37"--}}
    {{--                fill="none"--}}
    {{--            >--}}
    {{--                <path--}}
    {{--                    d="M18.4986 16.3204L26.1295 8.68945L28.3098 10.8697L20.6788 18.5006L28.3098 26.1314L26.1295 28.3116L18.4986 20.6808L10.8678 28.3116L8.6875 26.1314L16.3184 18.5006L8.6875 10.8697L10.8678 8.68945L18.4986 16.3204Z"--}}
    {{--                    fill="#141414"--}}
    {{--                />--}}
    {{--            </svg>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- overlay  -->
    <div class="overlay"></div>
@endsection




