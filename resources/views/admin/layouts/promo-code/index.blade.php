@extends('admin.app')
@section('title', 'Promo Code List')
@section('header_title')
    Promo Code
@endsection;
@push('style')
    <style>
        .status .nice-select.form-select.select {
            width: 160px;
        }

        .users--table--wrapper th:nth-child(2) {
            width: 15% !important;
        }
        .users--table--wrapper th:nth-child(3) {
            width: 10% !important;
        }
        .users--table--wrapper th:nth-child(4) {
            width: 10% !important;
        }

        .users--table--wrapper th:nth-child(1) {
            width: 8% !important;
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
                        <input type="search" placeholder="Search Users"/>
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
                @can('promo code create')
                    <div class="">
                        <a href="{{ route('admin.promo-code.create') }}" class="btn btn-success">
                            Add new
                        </a>
                    </div>
                @endcan
            </div>
            <!-- users table  -->
            <div class="users--table--wrapper campaign default--scrollbar">
                <h4 class="common--title">Promo Code List</h4>
                <div class="users--table">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Usage Limit</th>
                            <th>Times Used</th>
                            <th>Expires At</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($promoCodes as $promoCode)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="btn btn-primary">{{ $promoCode->code }}</span></td>
                                <td>{{$promoCode->type}}</td>
                                <td>{{$promoCode->type === 'percentage' ? $promoCode->discount_percentage.'%' : $promoCode->discount_amount}}</td>
                                <td>{{ $promoCode->usage_limit }}</td>
                                <td>{{ $promoCode->times_used }}</td>
                                <td><span class="btn {{$promoCode->expires_at > now() ? 'btn-success' : 'btn-danger'}} ">{{ $promoCode->expires_at->format('Y-m-d g:i a') }}</span></td>
                                <td>
                                    @can('news status')
                                        <div class="form-check form-switch">
                                            <input onclick="statusChange({{$promoCode->id}},this)" class="form-check-input"
                                                   @if($promoCode->status == \App\Enums\Status::ACTIVE) checked
                                                   @endif type="checkbox" id="flexSwitchCheckDisabled">
                                        </div>
                                    @endcan
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        @can('promo code edit')
                                            <a href="{{route('admin.promo-code.edit',$promoCode->id)}}" style="color: #4b5563">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                          d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                          clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd"
                                                          d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </a>
                                        @endcan
                                        @can('promo code delete')
                                            <form action="{{route('admin.promo-code.destroy',$promoCode->id)}}"
                                                  method="POST"> @csrf @method('DELETE')
                                                <button type="submit" style="color: #dc2626"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Promo code found!</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $promoCodes->links()}}
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function statusChange(id, element) {
            var url = '{{ route('admin.promo-code.status', ':id') }}';
            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
                data:{
                    "_token": "{{ csrf_token() }}",
                },
                success: function(resp) {
                    if (resp.success === true) {
                        // show toast message
                        flasher.success(resp.message);
                        if (resp.data.status === "{{\App\Enums\Status::ACTIVE}}") {
                            element.checked = true;
                        } else {
                            element.checked = false;
                        }
                    } else if (resp.errors) {
                        flasher.error(resp.errors[0]);
                    } else {
                        flasher.error(resp.message);
                    }
                }, // success end
                error: function(error) {
                    flasher.error(error?.responseJSON?.message);
                }
            })
        }

    </script>
@endpush
