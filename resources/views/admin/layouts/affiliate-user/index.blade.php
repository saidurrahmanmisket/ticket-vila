@extends('admin.app')
@section('title', 'Admin User')
@section('header_title')
    Admin User
@endsection;
@push('style')
    <style>
        .users--table--wrapper th:nth-child(2) {
            width: 18%;
        }

        .users--table--wrapper th:nth-child(3) {
            width: 20%;
        }

        .users--table--wrapper th:nth-child(4) {
            width: 10%;
        }

        .users--table--wrapper th:nth-child(5) {
            width: 27%;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main">
        <div class="tickets--area users--area">
            <h4 class="common--title">Filter</h4>
            <!-- filter--and--search  -->
            <div class="filter--and--search d-flex justify-content-between align-items-center">
                <form action="{{route('admin.affiliate-users.index')}}" method="GET">
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
                            <th>Expected Sales(100€)</th>
                            <th>Percentage</th>
                            <th>Balance</th>
                            <th>Total Revenue</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($affiliateUsers as $user)
                            <tr>
                                <td>@index($affiliateUsers)</td>
                                <td>
                                    <div class="profile">
                                        <img
                                            src="{{!empty($user->user->avatar) ? asset($user->user->avatar) : asset('admin/images/user.png')}}"
                                            alt=""/>
                                        <p>{{$user->user->first_name}} {{$user->user->last_name}}</p>
                                    </div>
                                </td>
                                <td>{{ $user->user->email }}</td>
                                <td>
                                    @if($user->getTotalOrderAmount($user) <100)
                                        <span class="badge bg-danger text-white">Not reached</span>
                                    @else
                                        <span class="badge bg-success text-white">Reached</span>
                                    @endif

                                </td>
                                <td>
                                    <div style="display: flex" class="gap-3" id="commission_value_{{$user->id}}">
                                        <span class="btn btn-sm btn-success" id="commission_rate_show_{{$user->id}}">{{$user->commission_rate}}%</span>
                                        <span class="btn btn-sm btn-info text-white"
                                              onclick="toggleCommissionForm({{$user->id}},'show')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div style="display: none" class="gap-3" id="edit_commission_{{$user->id}}">
                                        <input type="number" id="commission_rate_{{$user->id}}"
                                               class="form-control w-auto" step="0.2"
                                               value="{{$user->commission_rate}}">
                                        <button type="submit" onclick="updateCommissionRate({{$user->id}})"
                                                class="btn btn-sm btn-secondary">Save
                                        </button>
                                        <button type="button" onclick="toggleCommissionForm({{$user->id}},'hide')"
                                                class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                 fill="currentColor" width="20" height="20">
                                                <path
                                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="btn btn-sm btn-primary">{{formatNumber($user->balance)}}€</span>
                                </td>
                                <td><span
                                        class="btn btn-sm btn-secondary">{{formatNumber($user->commissions_sum_amount)}}€</span>
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
                {{$affiliateUsers->links()}}
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function toggleCommissionForm(id, type) {
            let commissionForm = $("#edit_commission_" + id);
            let commissionValueSection = $("#commission_value_" + id)
            if (type === 'show') {
                commissionForm.css('display', 'flex')
                commissionValueSection.hide()
            } else {
                commissionForm.hide()
                commissionValueSection.show()
            }
        }

        function updateCommissionRate(id) {
            $.ajax({
                type: "POST",
                url: "{{route('admin.affiliate-users.update-commission')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    "commission_rate": $("#commission_rate_" + id).val()
                },
                success: function (resp) {
                    if (resp.success === true) {
                        // show toast message
                        flasher.success(resp.message);
                        $("#commission_rate_show_" + id).text(resp.commission_rate + '%')
                        toggleCommissionForm(id, 'hide')
                    } else {
                        flasher.error(resp.message);
                    }
                }, // success end
                error: function (error) {
                    flasher.error(error?.responseJSON.message)
                }
            })
        }
    </script>
@endpush

