@extends('admin.app')

@section('title', 'Notification')
@section('header_title')
    Notification
@endsection;
@section('content')
    <section class="app--content--main">
        <div class="notification--area">
            @if(!empty($unreadNotifications) && $unreadNotifications && $unreadNotifications->count() > 0)
                <div class="top--title">
                    <h3>You have {{$unreadNotifications->count()}} unread message</h3>
                    <form action="{{ route('admin.notifications.markAllAsRead') }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        <button type="submit" class="button">Mark All as Read</button>
                    </form>
                </div>
            @endif
            <div class="notification--wrapper">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="pills-all-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-all"
                            type="button"
                            role="tab"
                            aria-controls="pills-all"
                            aria-selected="true"
                        >
                            All
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pills-new-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-new"
                            type="button"
                            role="tab"
                            aria-controls="pills-new"
                            aria-selected="false"
                        >
                            New
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pills-unread-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-unread"
                            type="button"
                            role="tab"
                            aria-controls="pills-unread"
                            aria-selected="false"
                        >
                            Unread
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="pills-all"
                        role="tabpanel"
                        aria-labelledby="pills-all-tab"
                        tabindex="0"
                    >
                        <div class="notifications default--scrollbar pr_20">
                            @foreach($notifications as $notification)
                                <!-- single notification--card  -->
                                <div class="notification--card">
                                    <!-- message  -->
                                    <div class="message">
                                        <!-- icon  -->
                                        @if(!empty($notification->data['type']))
                                            @if($notification->data['type'] == \App\Enums\NotificationType::PURCHASE)
                                                <img src="{{asset('user/images/notification-icon (3).png')}}" alt="">
                                            @elseif($notification->data['type'] == \App\Enums\NotificationType::REGISTRATION)
                                                <img src="{{asset('user/images/notification-icon (2).png')}}" alt="">
                                            @elseif($notification->data['type'] == \App\Enums\NotificationType::ERROR)
                                                <img src="{{asset('user/images/notification-icon (4).png')}}" alt="">
                                            @elseif($notification->data['type'] == \App\Enums\NotificationType::INFO)
                                                <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                            @else
                                                <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                            @endif
                                        @else
                                            <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                        @endif
                                        <div class="text">
                                            <h4>{{$notification->data['subject'] ?? '' }}</h4>
                                            <p>
                                                {{$notification->data['message'] ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="status text-green">{{ $notification->read_at == null ? "New" : $notification->created_at->format('d-m-Y (h:i )') }}</p>
                                    <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" class="d-flex align-items-center">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="action--btn">Delete
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="25"
                                                height="24"
                                                viewBox="0 0 25 24"
                                                fill="none"
                                            >
                                                <path
                                                    d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                                    stroke="#FF5630"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                                    stroke="#FF5630"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                                    stroke="#FF5630"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M10.8281 16.5H14.1581"
                                                    stroke="#FF5630"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M10 12.5H15"
                                                    stroke="#FF5630"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </button>


                                    </form>


                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-new"
                        role="tabpanel"
                        aria-labelledby="pills-new-tab"
                        tabindex="0"
                    >

                        @foreach($newNotification as $notification)
                            <!-- single notification--card  -->
                            <div class="notification--card">
                                <!-- message  -->
                                <div class="message">
                                    <!-- icon  -->
                                    @if(!empty($notification->data['type']))
                                        @if($notification->data['type'] == \App\Enums\NotificationType::PURCHASE)
                                            <img src="{{asset('user/images/notification-icon (3).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::REGISTRATION)
                                            <img src="{{asset('user/images/notification-icon (2).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::ERROR)
                                            <img src="{{asset('user/images/notification-icon (4).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::INFO)
                                            <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                        @else
                                            <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                        @endif
                                    @else
                                        <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                    @endif
                                    <div class="text">
                                        <h4>{{$notification->data['subject'] ?? '' }}</h4>
                                        <p>
                                            {{$notification->data['message'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <p class="status text-green">{{ $notification->read_at == null ? "New" : $notification->created_at->format('d-m-Y (h:i )') }}</p>
                                <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" class="d-flex align-items-center">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="action--btn">Delete
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="25"
                                            height="24"
                                            viewBox="0 0 25 24"
                                            fill="none"
                                        >
                                            <path
                                                d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.8281 16.5H14.1581"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10 12.5H15"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>


                                </form>


                            </div>
                        @endforeach

                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-unread"
                        role="tabpanel"
                        aria-labelledby="pills-unread-tab"
                        tabindex="0"
                    >


                        @foreach($unreadNotifications as $notification)
                            <!-- single notification--card  -->
                            <div class="notification--card">
                                <!-- message  -->
                                <div class="message">
                                    <!-- icon  -->
                                    @if(!empty($notification->data['type']))
                                        @if($notification->data['type'] == \App\Enums\NotificationType::PURCHASE)
                                            <img src="{{asset('user/images/notification-icon (3).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::REGISTRATION)
                                            <img src="{{asset('user/images/notification-icon (2).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::ERROR)
                                            <img src="{{asset('user/images/notification-icon (4).png')}}" alt="">
                                        @elseif($notification->data['type'] == \App\Enums\NotificationType::INFO)
                                            <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                        @else
                                            <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                        @endif
                                    @else
                                        <img src="{{asset('user/images/notification-icon (1).png')}}" alt="">
                                    @endif
                                    <div class="text">
                                        <h4>{{$notification->data['subject'] ?? '' }}</h4>
                                        <p>
                                            {{$notification->data['message'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <p class="status text-green">{{ $notification->read_at == null ? "New" : $notification->created_at->format('d-m-Y (h:i )') }}</p>
                                <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" class="d-flex align-items-center">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="action--btn">Delete
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="25"
                                            height="24"
                                            viewBox="0 0 25 24"
                                            fill="none"
                                        >
                                            <path
                                                d="M21.5 5.98047C18.17 5.65047 14.82 5.48047 11.48 5.48047C9.5 5.48047 7.52 5.58047 5.54 5.78047L3.5 5.98047"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M19.3484 9.13965L18.6984 19.2096C18.5884 20.7796 18.4984 21.9996 15.7084 21.9996H9.28844C6.49844 21.9996 6.40844 20.7796 6.29844 19.2096L5.64844 9.13965"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10.8281 16.5H14.1581"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M10 12.5H15"
                                                stroke="#FF5630"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>


                                </form>


                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
