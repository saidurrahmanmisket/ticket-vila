@extends('admin.app')
@section('title', 'Admin User')
@section('header_title')
    Admin User
@endsection;
@section('content')
    <section class="app--content--main">
        <div class="tickets--area users--area">
            <h4 class="common--title">Filter</h4>
            <!-- filter--and--search  -->
            <div class="filter--and--search d-flex justify-content-between align-items-center">
                <form action="{{route('admin.admin-user.index')}}" method="GET">
                    <!-- select  -->
                    <div class="select">
                        <select id="sortby-role" name="role">
                            <option value="" selected>Select role</option>
                            <option @if(request('role') == 'not_assign') selected @endif value="not_assign">Not assign
                            </option>
                            @foreach($roles as $role)
                                <option @if(request('role') == $role->name) selected
                                        @endif value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- search  -->
                    <div class="search">
                        <input type="search" name="search" value="{{request('search')}}" placeholder="Search Users"/>
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
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
                @can('admin user menu')
                    <div class="">
                        <a href="{{ route('admin.admin-user.create') }}" class="btn btn-success">
                            Add new
                        </a>
                    </div>
                @endcan
            </div>
            <!-- users table  -->
            <div class="users--table--wrapper default--scrollbar">
                <h4 class="common--title">User List</h4>
                <div class="users--table">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Percentage</th>
                            <th>Balance</th>
                            <th>Join Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <div class="profile">
                                        <img
                                            src="{{!empty($user->avatar) ? asset($user->avatar) : asset('admin/images/user.png')}}"
                                            alt=""/>
                                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="btn btn-sm btn-success">{{$user->}}</span>
                                </td>
                                <td>
                                    @can('admin user edit')
                                        <a href="{{route('admin.admin-user.edit',$user->id)}}"
                                           class="action--btn btn-warning">
                                            Edit
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

