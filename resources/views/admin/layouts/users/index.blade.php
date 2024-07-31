@extends('admin.app')
@section('title', 'User')
@section('header_title')
    User
@endsection;
@section('content')
    <section class="app--content--main">
    <div class="tickets--area users--area">
        <h4 class="common--title">Filter</h4>
        <!-- filter--and--search  -->
        <div class="filter--and--search">
            <form action="#">
                <!-- select  -->
                <div class="select">
                    <select id="sortby-date">
                        <option value="1" selected>1 Ticket’s</option>
                        <option value="2">2 Ticket’s</option>
                        <option value="3">3 Ticket’s</option>
                        <option value="4">4 Ticket’s</option>
                        <option value="5">5 Ticket’s</option>
                    </select>
                </div>
                <!-- search  -->
                <div class="search">
                    <input type="search" placeholder="Search Users" />
                    <button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="19"
                            viewBox="0 0 18 19"
                            fill="none"
                        >
                            <ellipse
                                cx="8.80687"
                                cy="8.80592"
                                rx="7.49047"
                                ry="7.45533"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M14.0156 14.3789L16.9523 17.2942"
                                stroke="#868A9B"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <!-- users table  -->
        <div class="users--table--wrapper default--scrollbar">
            <h4 class="common--title">User List</h4>
            <div class="users--table">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customers Name</th>
                        <th>Email</th>
                        <th>Tickets</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <div class="profile">
                                    <img src="{{!empty($user->avatar) ? asset($user->avatar) : asset('admin/images/user.png')}}" alt="" />
                                    <p>{{$user->first_name}} {{$user->last_name}}</p>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="user--tickets">
                                    <p>{{$user->tickets_count}}</p>
                                    <img src="{{asset('admin/images/user-ticket.png')}}" alt="" />
                                </div>
                            </td>
                            <td>
                                @can('user view')
                                    <a href="{{route('admin.user.show',$user->id)}}" class="action--btn action--btnv2">
                                        View
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="17"
                                            height="15"
                                            viewBox="0 0 17 15"
                                            fill="none"
                                        >
                                            <path
                                                d="M15.75 7.72559L0.75 7.72559"
                                                stroke="#04BAFF"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M9.69922 1.701L15.7492 7.725L9.69922 13.75"
                                                stroke="#04BAFF"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">User not found!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {{$users->links()}}
        </div>
    </div>
    </section>
@endsection

