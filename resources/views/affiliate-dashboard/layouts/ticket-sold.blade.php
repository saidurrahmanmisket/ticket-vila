@extends('affiliate-dashboard.app')
@section('title', 'Ticket Sold')
@section('header_title')
    Ticket Sold
@endsection;
@section('content')
    <section class="app--content--main">
        <div class="row">
            <div class="col-xxl-7">
                <!-- referral--link--box  -->
                <x-affiliate.referral-link-box/>
            </div>
            <div class="col-xxl-5">
                <x-affiliate.profit-details :profitDetails="$profitDetails" :todayProfitDetails="$toDayProfitDetails"/>
            </div>
            <div class="col-12">
                <!-- users table  -->
                <div class="users--table--wrapper affiliate--ticket--tabel">
                    <h4 class="common--title">Ticket Sold</h4>
                    <div class="users--table">
                        <table>
                            <thead>
                            <tr>
                                <th class="no">No</th>
                                <th class="ticket">Tickets</th>
                                <th class="ticket-sold-date">Date</th>
                                <th class="ticket-sold-price">Price</th>
                                <th class="ticket-sold-total--price">Total Price</th>
                                <th class="ticket-sold-income">Income</th>
                                <th class="ticket-sold-id">ID</th>
                                <th class="ticket-sold-status">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tickets as $ticket)
                                <tr>
                                    <td class="ticket-sold-no">{{$loop->iteration}}</td>
                                    <td class="ticket">
                                        <div class="user--tickets">
                                            <p>{{$ticket->order->tickets_count}}</p>
                                            <img src="{{asset('user/images/ticket.png')}}" alt="ticket">
                                        </div>
                                    </td>
                                    <td class="ticket-sold-date">{{$ticket->created_at->format('d.m.Y - H:i:s')}}</td>
                                    <td class="ticket-sold-price">{{number_format($ticket->order->total_price,2)}}€
                                    </td>
                                    <td class="ticket-sold-total--price">{{number_format($ticket->order->total_price,2)}}
                                        €
                                    </td>
                                    <td class="ticket-sold-income">{{number_format($ticket->amount,2)}} €</td>
                                    <td class="ticket-sold-id">#{{$ticket->id}}</td>
                                    <td class="{{$ticket->order->payment_status == \App\Enums\Status::COMPLETED ? 'ticket-sold-confirmed' : ($ticket->order->payment_status == \App\Enums\Status::REFUND ? 'ticket-sold-refund' : 'ticket-sold-pending')}}">{{$ticket->order->payment_status}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" rowspan="3">Not found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

