@extends('admin.app')
@section('title', 'User')
@section('header_title')
    Support Tickets
@endsection;
@section('content')
    <section class="app--content--main">
    <div class="tickets--area users--area">
        <!-- filter--and--search  -->
        <div class="filter--and--search">
            <form action="{{route('admin.help')}}" method="GET">
                <!-- search  -->
                <div class="search">
                    <input type="search" name="search" value="{{request('search')}}"
                           placeholder="Search customer by name or email"/>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                             fill="none">
                            <ellipse cx="8.80687" cy="8.80592" rx="7.49047" ry="7.45533" stroke="#868A9B"
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.0156 14.3789L16.9523 17.2942" stroke="#868A9B" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <button class="btn btn-primary" type="submit">Filter</button>
            </form>
        </div>
        <!-- users table  -->
        <div class="users--table--wrapper default--scrollbar">
            <h4 class="common--title">List</h4>
            <div class="users--table">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customers Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($chats as $chat)
                        <tr>
                            <td>@index($chats)</td>
                            <td>
                                <div class="profile">
                                    <img src="{{!empty($chat->user->avatar) ? asset($chat->user->avatar) : asset('admin/images/user.png')}}" alt="" />
                                    <p>{{$chat->user->first_name}} {{$chat->user->last_name}}</p>
                                </div>
                            </td>
                            <td>{{ $chat->user->email }}</td>
                            <td class="status">
                                @can('help center status')
                                    <select class="form-select select" id="change_status"
                                            onchange="statusChange({{$chat->id}},this)">
                                        @foreach(\App\Enums\Status::chatStatus() as $key => $val)
                                            <option @if($chat->status === $key) selected
                                                    @endif value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                @endcan
                            </td>
                            <td>
                                @can('help center replay')
                                    <a href="{{route('admin.help.show',$chat->id)}}" class="action--btn action--btnv2">
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
                {{$chats->links()}}
            </div>
        </div>
    </div>
    </section>
@endsection


@push('script')
    <script>
        function statusChange(id, event) {
            var url = '{{ route('admin.chat.status', ':id') }}';
            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": $(event).val()
                },
                success: function (resp) {
                    if (resp.success === true) {

                        // show toast message
                        flasher.success(resp.message);
                    } else if (resp.success === false && resp.is_exist === true) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: resp.message,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        flasher.error(resp.message);
                    }
                }, // success end
                error: function (error) {
                    flasher.error(error?.responseJSON.message)
                } // Error
            })
        }
    </script>
@endpush
