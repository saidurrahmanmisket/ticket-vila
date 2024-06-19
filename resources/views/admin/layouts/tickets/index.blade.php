@extends('admin.app')
@section('title', 'Tickets')
@section('header_title')
    Tickets
@endsection;
@section('content')
    <section class="app--content--main">
    <!-- tickets area  -->
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
                    <input type="search" placeholder="Search Ticket" />
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
                            <span>#{{ $loop->iteration }}</span>
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
                            <a href="{{ route('admin.ticket.download', $ticket->id) }}" class="action--btn">
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
                            <a href="{{ route('admin.user.show', $ticket->user_id) }}"
                                class="action--btn action--btnv2 mt_20">
                                View User
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"
                                    fill="none">
                                    <path d="M16.25 7.72559L1.25 7.72559" stroke="#04BAFF" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.1992 1.701L16.2492 7.725L10.1992 13.75" stroke="#04BAFF" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
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
