@extends('admin.app')
@section('title', 'Affiliate Withdraw Request')
@section('header_title')
    Affiliate Withdraw Request
@endsection;
@push('style')
    <style>
        .status .nice-select.form-select.select {
            width: 160px;
        }

        .swal2-icon.swal2-question.swal2-icon-show {
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main statistics">
        <div class="tickets--area users--area">
            <h4 class="common--title">Filter</h4>
            <!-- filter--and--search  -->
            <div class="filter--and--search d-flex justify-content-between align-items-center">
                <form action="{{route('admin.affiliate-withdraw-request.show')}}" method="GET">
                    {{--select by campaign--}}
                    @php
                        use App\Enums\Status;
                    @endphp
                    <div class="select">
                        <select id="sortby-status" name="status">
                            <option value="" selected>Select status</option>
                            <option
                                {{request('status') === Status::APPROVED ? 'selected' : ''}} value="{{Status::APPROVED}}">
                                Approved
                            </option>
                            <option
                                {{request('status') === Status::PENDING ? 'selected' : ''}} value="{{Status::PENDING}}">
                                Pending
                            </option>
                            <option
                                {{request('status') === Status::REJECTED ? 'selected' : ''}} value="{{Status::REJECTED}}">
                                Rejected
                            </option>
                        </select>
                    </div>
                    <!-- search  -->
                    <div class="search">
                        <input type="search" name="search" value="{{request('search')}}"
                               placeholder="Search user by name or email"/>
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
            <div class="users--table--wrapper campaign default--scrollbar">
                <h4 class="common--title">Affiliate Withdraw Request List</h4>
                <div class="users--table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Bank Account No</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allWithdrawRequest as $item)
                                <tr>
                                    <td>@index($allWithdrawRequest)</td>
                                    <td>{{ $item->affiliateUser->user->first_name ?? '' }}</td>
                                    <td>{{ $item->affiliateUser->user->email ?? '' }}</td>
                                    <td>{{ $item->bank_account_number ?? '' }}</td>
                                    <td class="status">
                                        @if($item->status === \App\Enums\Status::PENDING)
                                            <select class="form-select select" id="change_status_{{$item->id}}"
                                                    onchange="confirmationForChangeStatus({{ $item->id }},this)">
                                                <option value="">Select a status</option>
                                                @foreach (\App\Enums\Status::withdrawRequestStatus() as $key => $val)
                                                    <option @if ($item->status === $key) selected @endif
                                                    value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <span
                                                class="btn btn-sm text-uppercase {{$item->status === \App\Enums\Status::APPROVED ? 'btn-success' : 'btn-danger'}}">{{$item->status}}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <button href="#" class="action--btn action--btnv2" data-bs-toggle="modal" data-bs-target="#modal-{{ $item->id }}">
                                            View
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                                <path d="M15.75 7.72559L0.75 7.72559" stroke="#04BAFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.69922 1.701L15.7492 7.725L9.69922 13.75" stroke="#04BAFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content rounded-3 shadow-lg">
                                            <div class="modal-header bg-dark text-white border-bottom-0">
                                                <h5 class="modal-title" id="modalLabel-{{ $item->id }}"><i class="bi bi-info-circle me-2"></i> Withdrawal Request #{{ $item->id }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-5"> <!-- Increased padding -->
                                                <div class="row">
                                                    <!-- Left Column -->
                                                    <div class="col-md-6 mb-4 pe-4"> <!-- Added right padding -->
                                                        <h6 class="text-muted mb-3">Bank Details</h6>
                                                        <hr class="mb-3">
                                                        <p class="mb-2"><strong><i class="bi bi-person me-2"></i> Account Holder:</strong> {{ $item->account_holder_name }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-credit-card me-2"></i> Account Number:</strong> {{ $item->bank_account_number }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-bank me-2"></i> Bank Name:</strong> {{ $item->bank_name }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-geo-alt me-2"></i> Branch Name/Address:</strong> {{ $item->bank_branch_name }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-upc-scan me-2"></i> Routing Number:</strong> {{ $item->bank_routing_number }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-globe me-2"></i> SWIFT/BIC Code:</strong> {{ $item->swift_bic_code }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-flag me-2"></i> Country of Bank:</strong> {{ $item->country_of_bank }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-cash me-2"></i> Amount:</strong> ${{ number_format($item->amount, 2) }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-clock me-2"></i>
                                                                Requested
                                                                At:</strong> {{ \Carbon\Carbon::parse($item->requested_at)->format('Y-m-d H:i:s') }}
                                                        </p>
                                                        <p class="mt-3"><strong>Status:</strong>
                                                            <span
                                                                class="badge text-white {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }} text-dark">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <!-- Right Column -->
                                                    <div class="col-md-6 mb-4 ps-4"> <!-- Added left padding -->
                                                        <h6 class="text-muted mb-3">Affiliate User Details</h6>
                                                        <hr class="mb-3">
                                                        <p class="mb-2"><strong><i class="bi bi-hash me-2"></i> Affiliate Code:</strong> {{ $item->affiliateUser->affiliate_code }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-percent me-2"></i> Commission Rate:</strong> {{ $item->affiliateUser->commission_rate }}%</p>
                                                        <p class="mb-2"><strong><i class="bi bi-wallet me-2"></i> Balance:</strong> ${{ number_format($item->affiliateUser->balance, 2) }}</p>
                                                        <h6 class="text-muted mt-4 mb-3">User Details</h6>
                                                        <hr class="mb-3">
                                                        <p class="mb-2"><strong><i class="bi bi-person-circle me-2"></i> Name:</strong> {{ $item->affiliateUser->user->first_name }} {{ $item->affiliateUser->user->last_name }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-envelope me-2"></i> Email:</strong> {{ $item->affiliateUser->user->email }}</p>
                                                        <p class="mb-2"><strong><i class="bi bi-phone me-2"></i> Phone:</strong> {{ $item->affiliateUser->user->phone }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4">No data found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-2">
                {{ $allWithdrawRequest->links() }}
            </div>
        </div>
    </section>
@endsection
@push('script')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet"> --}}

    <script>
        function confirmationForChangeStatus(id, event) {
            let status = $(event).val()
            Swal.fire({
                title: `Are you sure you want to ${status}?`,
                text: `This action will change the status to ${status}.`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: status === '{{\App\Enums\Status::APPROVED}}' ? '#28a745' : '#d33', // Green for approve, Red for reject
                cancelButtonColor: '#6c757d',
                confirmButtonText: `Yes, ${status} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    statusChange(id, event)
                }
            });
        }
        function statusChange(id, event) {
            var url = '{{ route('admin.affiliate-withdraw-request.status', ':id') }}';
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
                        setTimeout(function () {
                            window.location.reload()
                        }, 1000)
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
