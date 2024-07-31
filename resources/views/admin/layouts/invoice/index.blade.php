@extends('admin.app')
@section('title', 'invoices')
@section('header_title')
    Invoices
@endsection;
@section('content')
    <section class="app--content--main">
    <!-- Invoices area  -->
    <div class="tickets--area">
        <h4 class="common--title">Filter</h4>
        <!-- filter--and--search  -->
        <div class="filter--and--search">
            <form action="#">
                <!-- select  -->
                <div class="select">
                    <select id="sortby-date">
                        <option selected disabled>Sort by Date</option>
                        <option value="1">11.052024</option>
                        <option value="2">11.052024</option>
                        <option value="3">11.052024</option>
                        <option value="4">11.052024</option>
                        <option value="5">11.052024</option>
                    </select>
                    <div class="sort--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                            fill="none">
                            <path d="M2.25 5.25H15.75" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M4.5 9H13.5" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M7.5 12.75H10.5" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <!-- search  -->
                <div class="search">
                    <input type="search" placeholder="Search Invoice" />
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                            fill="none">
                            <ellipse cx="8.80687" cy="8.80592" rx="7.49047" ry="7.45533" stroke="#868A9B"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.0156 14.3789L16.9523 17.2942" stroke="#868A9B" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <!-- Invoices  -->
        <div class="tickets default--scrollbar">
            @forelse($orders as $order)
                <!-- invoice--single  -->
                <div class="ticket--single">
                    <!-- invoice & name  -->
                    <div class="ticket--and--name">
                        <!-- ticket box  -->
                        <div class="ticket--box">
                            <img src="{{ isset($order->campaign->thumbnail ) ? asset($order->campaign->thumbnail) : asset('admin/images/ticket.png') }}"
                                alt="" />
                            <p>invoice ID: #{{ $order->id.'/'.date('Y',strtotime($order->created_at)) }}</p>
                            <span>#{{ $loop->iteration }}</span>
                        </div>
                        <div>
                            <p class="common--pair--text">
                                Name :
                                <span>{{ $order->user->first_name }} {{ $order->user->last_name }}</span>
                            </p>
                            <p class="common--pair--text">
                                Email :
                                <span>{{ $order->user->email }}</span>
                            </p>
                            <p class="common--pair--text">
                                Gift :
                                <span class="text-orange">{{$order->discount_quantity ?? '0'}} Tickets</span>
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
                                Payment Date :
                                <span>{{ date('d.m.Y - H:i:s', strtotime($order->created_at)) }}</span>
                            </p>
                            <p class="common--pair--text">
                                Amount :
                                <span class="text-green">{{ $order->total_price  ?? ''}} €</span>
                            </p>
                            <p class="common--pair--text">
                                Payment ID : <span>{{ $order->transaction_id }}</span>
                            </p>
                        </div>
                        <!-- invoice actions  -->
                        <div class="ticket--actions">
                            @can('invoice download')
                                <a href="{{ route('admin.invoice.download', $order->id) }}"
                                   class="action--btns justify-content-center mt-3 ">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path d="M9 11V17L11 15" stroke="#292D32" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 17L7 15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14"
                                              stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#292D32" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    Download
                                </a>
                            @endcan
                            @can('user view')
                                <a href="{{ route('admin.user.show', $order->user_id) }}"
                                   class="action--btns action--btnv2 mt_20">
                                    View User
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                         fill="none">
                                        <path d="M16.25 7.72559L1.25 7.72559" stroke="#04BAFF" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.1992 1.701L16.2492 7.725L10.1992 13.75" stroke="#04BAFF"
                                              stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <div class="mx-auto">invoice not found!</div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center pt-2">
            {{ $orders->links() }}
        </div>
    </div>
    </section>
@endsection
