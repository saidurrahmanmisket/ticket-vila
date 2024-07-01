@extends('admin.app')
@section('title', 'Campaign List')
@section('header_title')
    Campaign
@endsection;
@push('style')
    <style>
        .status .nice-select.form-select.select {
            width: 160px;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main statistics">
    <div class="tickets--area users--area">
        <h4 class="common--title">Filter</h4>
        <!-- filter--and--search  -->
        <div class="filter--and--search d-flex justify-content-between align-items-center">
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
            <div class="">
                <a href="{{ route('admin.campaign.create') }}" class="btn btn-success">
                    Add new
                </a>
            </div>
        </div>
        <!-- users table  -->
        <div class="users--table--wrapper campaign default--scrollbar">
            <h4 class="common--title">Campaign List</h4>
            <div class="users--table">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Limit</th>
                        <th>Unique Text</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($campaigns as $campaign)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $campaign->name_en }}</td>
                            <td>{{ $campaign->limit }}</td>
                            <td>{{ $campaign->unique_text }}</td>
                            <td>{{ number_format($campaign->price,2) }}</td>
                            <td class="status">
                                <select class="form-select select" id="change_status"
                                        onchange="statusChange({{$campaign->id}},this)">
                                    @foreach(\App\Enums\Status::campaignStatus() as $key => $val)
                                        <option @if($campaign->status === $key) selected
                                                @endif value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="{{route('admin.campaign.edit',$campaign->id)}}" style="color: #4b5563">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                    <form action="{{route('admin.campaign.destroy',$campaign->id)}}" method="POST"> @csrf @method('DELETE')
                                        <button type="submit" style="color: #dc2626" onclick="return confirm('Are you sure you want to delete?')">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Campaigns found!</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                {{ $campaigns->links()}}
            </div>
        </div>
    </div>
    </section>
@endsection
@push('script')
    <script>
        function statusChange(id, event) {
            var url = '{{ route('admin.campaign.status', ':id') }}';
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

