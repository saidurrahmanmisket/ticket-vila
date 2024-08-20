@extends('user.app')

@section('title', 'Dashboard')
@section('header_title')
{{ __("Dashboard") }}
@endsection;

@section('content')
    <!-- start app content area  -->
    {{-- <section class="app--content--main user--portal "> --}}
    {{-- active if user is before buy  --}}
    @if ($data['userTickets'] && $data['userTickets']->count() > 0)
        <section class="app--content--main user--portal ">
            <!-- live statistics  -->
            <x-user.live-ticket-statistics />

            <div class="row">
                <div class="col-md-5 mt_35 pr_17">
                    <div class="user--ticketslider--wrapper">
                        <h4 class="common--title">{{ __("Your Ticket") }}</h4>
                        <p class="total--tickets">{{ __("Total Ticket") }} : {{ $data['userTickets']->count() ?? 0 }}</p>
                        <!-- user ticket slider  -->
                        <div class="owl-carousel ticket-slider">
                            @foreach ($data['userTickets'] as $ticket)
                                <div class="item">
                                    <div class="user--ticket--slider">
                                        <div class="img--area">
                                            <img src="{{ asset($data['campaign']->thumbnail ?? 'user/images/ticket.png') }}"
                                                alt="" />
                                        </div>
                                        <p class="ticket--id">{{ __("Ticket ID") }}: {{ $ticket->ticket_number }}</p>

                                        <!-- ticket--details  -->
                                        <div class="ticket--details">
                                            <!-- user--profile  -->
                                            <div class="details user--profile">
                                                <img src="{{ asset('user/images/profile.png') }}" alt="" />
                                                <p>{{ $ticket->user->first_name }} {{ $ticket->user->last_name }}</p>
                                            </div>
                                            <div class="details">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M12.5646 2.67V1.5C12.5646 1.1925 12.3096 0.9375 12.0021 0.9375C11.6946 0.9375 11.4396 1.1925 11.4396 1.5V2.625H6.56463V1.5C6.56463 1.1925 6.30963 0.9375 6.00213 0.9375C5.69463 0.9375 5.43963 1.1925 5.43963 1.5V2.67C3.41463 2.8575 2.43213 4.065 2.28213 5.8575C2.26713 6.075 2.44713 6.255 2.65713 6.255H15.3471C15.5646 6.255 15.7446 6.0675 15.7221 5.8575C15.5721 4.065 14.5896 2.8575 12.5646 2.67Z"
                                                            fill="#E8880F" />
                                                        <path
                                                            d="M15 7.37988H3C2.5875 7.37988 2.25 7.71738 2.25 8.12988V12.7499C2.25 14.9999 3.375 16.4999 6 16.4999H12C14.625 16.4999 15.75 14.9999 15.75 12.7499V8.12988C15.75 7.71738 15.4125 7.37988 15 7.37988ZM6.9075 13.6574C6.87 13.6874 6.8325 13.7249 6.795 13.7474C6.75 13.7774 6.705 13.7999 6.66 13.8149C6.615 13.8374 6.57 13.8524 6.525 13.8599C6.4725 13.8674 6.4275 13.8749 6.375 13.8749C6.2775 13.8749 6.18 13.8524 6.09 13.8149C5.9925 13.7774 5.9175 13.7249 5.8425 13.6574C5.7075 13.5149 5.625 13.3199 5.625 13.1249C5.625 12.9299 5.7075 12.7349 5.8425 12.5924C5.9175 12.5249 5.9925 12.4724 6.09 12.4349C6.225 12.3749 6.375 12.3599 6.525 12.3899C6.57 12.3974 6.615 12.4124 6.66 12.4349C6.705 12.4499 6.75 12.4724 6.795 12.5024C6.8325 12.5324 6.87 12.5624 6.9075 12.5924C7.0425 12.7349 7.125 12.9299 7.125 13.1249C7.125 13.3199 7.0425 13.5149 6.9075 13.6574ZM6.9075 11.0324C6.765 11.1674 6.57 11.2499 6.375 11.2499C6.18 11.2499 5.985 11.1674 5.8425 11.0324C5.7075 10.8899 5.625 10.6949 5.625 10.4999C5.625 10.3049 5.7075 10.1099 5.8425 9.96738C6.0525 9.75738 6.3825 9.68988 6.66 9.80988C6.7575 9.84738 6.84 9.89988 6.9075 9.96738C7.0425 10.1099 7.125 10.3049 7.125 10.4999C7.125 10.6949 7.0425 10.8899 6.9075 11.0324ZM9.5325 13.6574C9.39 13.7924 9.195 13.8749 9 13.8749C8.805 13.8749 8.61 13.7924 8.4675 13.6574C8.3325 13.5149 8.25 13.3199 8.25 13.1249C8.25 12.9299 8.3325 12.7349 8.4675 12.5924C8.745 12.3149 9.255 12.3149 9.5325 12.5924C9.6675 12.7349 9.75 12.9299 9.75 13.1249C9.75 13.3199 9.6675 13.5149 9.5325 13.6574ZM9.5325 11.0324C9.495 11.0624 9.4575 11.0924 9.42 11.1224C9.375 11.1524 9.33 11.1749 9.285 11.1899C9.24 11.2124 9.195 11.2274 9.15 11.2349C9.0975 11.2424 9.0525 11.2499 9 11.2499C8.805 11.2499 8.61 11.1674 8.4675 11.0324C8.3325 10.8899 8.25 10.6949 8.25 10.4999C8.25 10.3049 8.3325 10.1099 8.4675 9.96738C8.535 9.89988 8.6175 9.84738 8.715 9.80988C8.9925 9.68988 9.3225 9.75738 9.5325 9.96738C9.6675 10.1099 9.75 10.3049 9.75 10.4999C9.75 10.6949 9.6675 10.8899 9.5325 11.0324ZM12.1575 13.6574C12.015 13.7924 11.82 13.8749 11.625 13.8749C11.43 13.8749 11.235 13.7924 11.0925 13.6574C10.9575 13.5149 10.875 13.3199 10.875 13.1249C10.875 12.9299 10.9575 12.7349 11.0925 12.5924C11.37 12.3149 11.88 12.3149 12.1575 12.5924C12.2925 12.7349 12.375 12.9299 12.375 13.1249C12.375 13.3199 12.2925 13.5149 12.1575 13.6574ZM12.1575 11.0324C12.12 11.0624 12.0825 11.0924 12.045 11.1224C12 11.1524 11.955 11.1749 11.91 11.1899C11.865 11.2124 11.82 11.2274 11.775 11.2349C11.7225 11.2424 11.67 11.2499 11.625 11.2499C11.43 11.2499 11.235 11.1674 11.0925 11.0324C10.9575 10.8899 10.875 10.6949 10.875 10.4999C10.875 10.3049 10.9575 10.1099 11.0925 9.96738C11.1675 9.89988 11.2425 9.84738 11.34 9.80988C11.475 9.74988 11.625 9.73488 11.775 9.76488C11.82 9.77238 11.865 9.78738 11.91 9.80988C11.955 9.82488 12 9.84738 12.045 9.87738C12.0825 9.90738 12.12 9.93738 12.1575 9.96738C12.2925 10.1099 12.375 10.3049 12.375 10.4999C12.375 10.6949 12.2925 10.8899 12.1575 11.0324Z"
                                                            fill="#E8880F" />
                                                    </svg>
                                                </div>
                                                <p>{{ $ticket->created_at }}</p>
                                            </div>
                                            <div class="details">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M16.5 15.9375C16.5 16.245 16.245 16.5 15.9375 16.5H2.0625C1.755 16.5 1.5 16.245 1.5 15.9375C1.5 15.63 1.755 15.375 2.0625 15.375H15.9375C16.245 15.375 16.5 15.63 16.5 15.9375Z"
                                                            fill="#E8880F" />
                                                        <path
                                                            d="M11.5406 3.39031L3.48562 11.4453C3.17812 11.7528 2.68312 11.7528 2.38312 11.4453H2.37562C1.33313 10.3953 1.33313 8.70031 2.37562 7.65781L7.73812 2.29531C8.78812 1.24531 10.4831 1.24531 11.5331 2.29531C11.8406 2.58781 11.8406 3.09031 11.5406 3.39031Z"
                                                            fill="#E8880F" />
                                                        <path
                                                            d="M15.6131 6.36773L13.3256 4.08023C13.0181 3.77273 12.5231 3.77273 12.2231 4.08023L4.16813 12.1352C3.86063 12.4352 3.86063 12.9302 4.16813 13.2377L6.45562 15.5327C7.50562 16.5752 9.20063 16.5752 10.2506 15.5327L15.6056 10.1702C16.6706 9.12023 16.6706 7.41773 15.6131 6.36773ZM9.56813 13.1402L8.66062 14.0552C8.47312 14.2427 8.16563 14.2427 7.97062 14.0552C7.78312 13.8677 7.78312 13.5602 7.97062 13.3652L8.88563 12.4502C9.06563 12.2702 9.38063 12.2702 9.56813 12.4502C9.75563 12.6377 9.75563 12.9602 9.56813 13.1402ZM12.5456 10.1627L10.7156 12.0002C10.5281 12.1802 10.2206 12.1802 10.0256 12.0002C9.83813 11.8127 9.83813 11.5052 10.0256 11.3102L11.8631 9.47273C12.0431 9.29273 12.3581 9.29273 12.5456 9.47273C12.7331 9.66773 12.7331 9.97523 12.5456 10.1627Z"
                                                            fill="#E8880F" />
                                                    </svg>
                                                </div>
                                                <p>{{ $ticket->order->payment_method }}</p>
                                            </div>
                                            <div class="details">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M14.8689 6.52485L11.4714 3.12735C10.7589 2.41485 9.77644 2.03235 8.77144 2.08485L5.02144 2.26485C3.52144 2.33235 2.32894 3.52485 2.25394 5.01735L2.07394 8.76735C2.02894 9.77235 2.40394 10.7549 3.11644 11.4674L6.51394 14.8649C7.90894 16.2599 10.1739 16.2599 11.5764 14.8649L14.8689 11.5724C16.2714 10.1849 16.2714 7.91985 14.8689 6.52485ZM7.12144 9.28485C5.93644 9.28485 4.96144 8.31735 4.96144 7.12485C4.96144 5.93235 5.93644 4.96485 7.12144 4.96485C8.30644 4.96485 9.28144 5.93235 9.28144 7.12485C9.28144 8.31735 8.30644 9.28485 7.12144 9.28485ZM13.1439 10.1474L10.1439 13.1474C10.0314 13.2599 9.88894 13.3124 9.74644 13.3124C9.60394 13.3124 9.46144 13.2599 9.34894 13.1474C9.13144 12.9299 9.13144 12.5699 9.34894 12.3524L12.3489 9.35235C12.5664 9.13485 12.9264 9.13485 13.1439 9.35235C13.3614 9.56985 13.3614 9.92985 13.1439 10.1474Z"
                                                            fill="#E8880F" />
                                                    </svg>
                                                </div>
                                                <p>{{ $data['campaign']->price }}€</p>
                                            </div>
                                        </div>
                                        <!-- no ticket  -->
                                        <div class="no--ticket d-none text-center">
                                            <p>{{ __("Currently, you don’t own a ticket.") }}</p>
                                            <a href="{{ route('user.buy-tickets') }}" class="user--common--btn">{{ __("Buy Now") }}</a>
                                        </div>
                                        <div class="button--area text-center">
                                            <a href="{{ route('user.buy-tickets') }}" class="user--common--btn mt_45">{{ __("Buy more E-Book to get more Ticket") }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt_35 pl_17">
                    <div class="news--wrapper ">
                        <!-- top title  -->
                        <div class="top--title mb_25">
                            <h3 class="common--title">{{ __("News") }}</h3>
                            <a href="#" class="button">{{ __("See All") }}</a>
                        </div>
                        <div class="all--news default--scrollbar">
                            @if(isset($data['news']) && $data['news'])
                                @foreach($data['news'] as $item)
                                    <!-- single card  -->
                                    <div class="ticket--post--card">
                                        <!-- top -->
                                        <div class="top">
                                            <div class="ticket--info">
                                                <!-- icon  -->
                                                <div class="icon">
                                                    @if(!empty($item->image))
                                                        <img class="img-fluid object-fit-cover rounded rounded-circle h-100" src="{{ asset($item->image) }}" alt="">
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M19.5 3.67C19.5 3.66 19.5 3.65 19.48 3.64C19.26 3.36 18.97 3.21 18.63 3.21C18.1 3.21 17.46 3.56 16.77 4.3C15.95 5.18 14.69 5.11 13.97 4.15L12.96 2.81C12.56 2.27 12.03 2 11.5 2C10.97 2 10.44 2.27 10.04 2.81L9.02 4.16C8.31 5.11 7.06 5.18 6.24 4.31L6.23 4.3C5.1 3.09 4.09 2.91 3.52 3.64C3.5 3.65 3.5 3.66 3.5 3.67C3.14 4.44 3 5.52 3 7.04V16.96C3 18.48 3.14 19.56 3.5 20.33C3.5 20.34 3.51 20.36 3.52 20.37C4.1 21.09 5.1 20.91 6.23 19.7L6.24 19.69C7.06 18.82 8.31 18.89 9.02 19.84L10.04 21.19C10.44 21.73 10.97 22 11.5 22C12.03 22 12.56 21.73 12.96 21.19L13.97 19.85C14.69 18.89 15.95 18.82 16.77 19.7C17.46 20.44 18.1 20.79 18.63 20.79C18.97 20.79 19.26 20.65 19.48 20.37C19.49 20.36 19.5 20.34 19.5 20.33C19.86 19.56 20 18.48 20 16.96V7.04C20 5.52 19.86 4.44 19.5 3.67ZM14 14.5H8C7.59 14.5 7.25 14.16 7.25 13.75C7.25 13.34 7.59 13 8 13H14C14.41 13 14.75 13.34 14.75 13.75C14.75 14.16 14.41 14.5 14 14.5ZM16 11H8C7.59 11 7.25 10.66 7.25 10.25C7.25 9.84 7.59 9.5 8 9.5H16C16.41 9.5 16.75 9.84 16.75 10.25C16.75 10.66 16.41 11 16 11Z" fill="#FEC054"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <p>{{$item['title_'.locale()]}}</p>
                                            </div>
                                            <!-- date and actions  -->
                                            <div class="date--and--actions">
                                                <p class="date">{{$item->created_at ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="message">
                                            {!!
                                                $item['description_' . locale()]
                                                    ? (strlen($item['description_' . locale()]) > 150
                                                        ? substr($item['description_' . locale()], 0, 150) . "..."
                                                        : $item['description_' . locale()])
                                                    : "12,500 tickets sold. Thanks to everyone. We wish you the best of luck. 👍"
                                            !!}

                                        </div>
                                        <div class="moderator--area">
                                            <!-- moderator  -->
                                            <div class="moderator">
                                                <img src="{{ $item->user->avatar ? asset($item->user->avatar) : asset('user/images/profile.png') }}" alt="" />
                                                <p>{{$item->user->first_name ?? ""}} {{$item->user->last_name ?? ""}}</p>
                                            </div>

                                            @if (!empty($item['description_' . locale()]) && strlen($item['description_' . locale()]) > 150)

                                                <a href="#" class="read--more" data-bs-toggle="modal" data-bs-target="#readmoreModal{{$item->id}}">
                                                    Read More
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                                         viewBox="0 0 18 15" fill="none">
                                                        <path d="M16.75 7.72607L1.75 7.72607" stroke="#04BAFF" stroke-width="2"
                                                              stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M10.7031 1.70149L16.7531 7.72549L10.7031 13.7505" stroke="#04BAFF"
                                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>



                                                @endif
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="readmoreModal{{$item->id}}" tabindex="-1" aria-labelledby="readmoreModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $item['description_' . locale()] ?? " "  !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

                <!-- user ranking statistics components  -->
                <x-user.user-ranking-statistics />

                @if(empty(auth()->user()->load('affiliate')->affiliate))
                <div class="col-md-3 pl_17 mt_35">
                    <div class="affiliate--box h-100 text-center">
                        <h3>{{ __("Join Affiliate Program") }}</h3>
                        <p>{{ __("Become an affiliates partner and earn extra money.") }}</p>
                        <form action="{{route('affiliate.join')}}" method="POST">
                            @csrf
                            <button type="submit" class="user--common--btn">{{ __("Join Now") }}</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </section>
    @endif
    <!-- end app content area  -->
@endsection
