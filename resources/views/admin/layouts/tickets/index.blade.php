@extends('admin.app')
@section('title', 'Tickets')
@section('header_title')
    Tickets
@endsection;
@push('style')
    <style>
        span.current {
            display: block;
            padding-top: 0 !important;
            left: 17px;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main">
    <!-- tickets area  -->
    <div class="tickets--area">
        <h4 class="common--title">Filter</h4>
        <!-- filter--and--search  -->
        <div class="filter--and--search">
            <form action="{{route('admin.ticket.index')}}" method="GET">
                <!-- select  -->
                <div class="d-flex gap-3 align-items-center">
                    <input type="date" value="{{request('start_date')}}" name="start_date" class="form-control">
                    <span>To</span>
                    <input type="date" name="end_date" value="{{request('end_date')}}" class="form-control">
                </div>
                {{--select by campaign--}}
                <div class="select">
                    <select id="sortby-campaign" name="campaign">
                        <option value="" selected>Select campaign</option>
                        @foreach($campaigns as $campaign)
                            <option @if(request('campaign') == $campaign->id) selected
                                    @endif value="{{$campaign->id}}">{{substr($campaign->name_en,0,20)}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- search  -->
                <div class="search">
                    <input type="search" name="search" value="{{request('search')}}"
                           placeholder="Search Ticket using user name/email"/>
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
                <button class="btn btn-primary" type="submit">Filter</button>
            </form>
        </div>
        <!-- tickets  -->
        <div class="tickets default--scrollbar">
            @forelse($tickets as $ticket)
                <!-- ticket--single  -->
                <div class="ticket--single">
                    <!-- ticket & name  -->
                    <div class="ticket--and--name">
                        <!-- ticket box  -->
                        <div class="ticket--box">
                            <img src="{{ isset($ticket->campaign->thumbnail ) ? asset($ticket->campaign->thumbnail) : asset('admin/images/ticket.png') }}"
                                alt="" />
                            <p>Ticket ID: #{{ $ticket->ticket_number }}</p>
                            <span>#@index($tickets)</span>
                        </div>
                        <div>
                            <p class="common--pair--text">
                                Name :
                                <span>{{ $ticket->user->first_name }} {{ $ticket->user->last_name }}</span>
                            </p>
                            <p class="common--pair--text">
                                Email :

                                <span>{{ $ticket->user->email }}</span>
                            </p>
{{--                            <p class="common--pair--text">--}}
{{--                                Gift :--}}
{{--                                <span class="text-orange">No Gift</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                    <!-- payment--and--actions  -->
                    <div class="payment--and--actions">
                        <!-- payment informations  -->
                        <div class="payment--informations">
                            <p class="common--pair--text">
                                Payment Method :
                                <span>{{ ucfirst($ticket->order->payment_method) }}</span>
                            </p>
                            <p class="common--pair--text">
                                Payment Date :
                                <span>{{ date('d.m.Y - H:i:s', strtotime($ticket->order->created_at)) }}</span>
                            </p>
                            <p class="common--pair--text">
                                Amount :
                                <span class="text-green">{{ $ticket->campaign->price ?? ''}} €</span>
                            </p>
                            <p class="common--pair--text">
                                Payment ID : <span>{{ $ticket->order->transaction_id }}</span>
                            </p>
                        </div>
                        <!-- ticket actions  -->
                        <div class="ticket--actions">
                            <a href="{{ route('admin.ticket.download', $ticket->id) }}" class="action--btns">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
                                        stroke="#141414" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
                                        stroke="#141414" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Download
                            </a>
                            @can('user view')
                                <a href="{{ route('admin.user.show', $ticket->user_id) }}"
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

                            {{--                            <a href="{{ route('admin.invoice.download', $ticket->order->id) }}" class="action--btns justify-content-center mt-3 ">--}}

{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                    <path d="M9 11V17L11 15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    <path d="M9 17L7 15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                </svg>--}}

{{--                                Invoice--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="mx-auto">Ticket not found!</div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center pt-2">
            {{ $tickets->links() }}
        </div>
    </div>
    </section>
@endsection
