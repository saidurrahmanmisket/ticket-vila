@extends('admin.app')
@section('title', 'Raffle Rules List')
@section('header_title')
	CMS
@endsection;

@push('style')
	<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
	<style>
        .highlight {
            background: #f7e7d3;
            display: flex;
            justify-content: space-between;
        }
	</style>
@endpush

@section('content')
	<section class="app--content--main">
		<div class="tickets--area users--area">
			<h4 class="common--title">Filter</h4>
			<!-- filter--and--search  -->
			<div class="filter--and--search d-flex justify-content-between align-items-center">
				<form action="#">
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
				<div class="">
					<a href="{{ route('admin.cms.raffle-rules.create') }}" class="btn btn-success">
						Add new
					</a>
				</div>
			</div>
			<!-- users table  -->
			<div class="users--table--wrapper campaign default--scrollbar">
				<h4 class="common--title">Raffle Rules List</h4>
				<div class="users--table">
					<table>
						<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Button Type</th>
							<th>Position</th>
							<th>Image</th>
							<th>Status</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody class="sort_menu" id="raffle--rules--list">
						@php($odd_or_even = 'even')
						@forelse($raffleRules as $rule)
							@php($odd_or_even = $rule->status == \App\Enums\Status::ACTIVE ? ($odd_or_even == 'even' ? 'odd' : 'even') : $odd_or_even)
							<tr data-id="{{$rule->id}}">
								<td class="handle">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="24"
									     height="24">
										<path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/>
									</svg>
									{{ $loop->iteration }}
								</td>
								<td>{{ $rule->title_en }}</td>
								<td>{{ \App\Enums\ButtonType::map()[$rule->button_type] ?? '' }}</td>
								<td>{{$rule->status == \App\Enums\Status::ACTIVE ? $odd_or_even == 'odd' ? 'Left' : 'Right' : 'None' }}</td>
								<td>
									<img src="{{asset($rule->image)}}" style="max-height: 100px" alt="">
								</td>
								<td>
									<div class="form-check form-switch">
										<input onclick="statusChange({{$rule->id}},this)" class="form-check-input"
										       @if($rule->status == \App\Enums\Status::ACTIVE) checked
										       @endif type="checkbox" id="flexSwitchCheckDisabled">
									</div>
								</td>
								<td class="text-center">
									<div class="d-flex gap-2 align-items-center justify-content-center">
										<a href="{{route('admin.cms.raffle-rules.edit',$rule->id)}}"
										   style="color: #4b5563">
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
										<form action="{{route('admin.cms.raffle-rules.destroy',$rule->id)}}"
										      method="POST"> @csrf @method('DELETE')
											<button type="submit" style="color: #dc2626"
											        onclick="return confirm('Are you sure you want to delete?')">
												<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
												     height="24" fill="currentColor" viewBox="0 0 24 24">
													<path fill-rule="evenodd"
													      d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
													      clip-rule="evenodd"/>
												</svg>
											</button>
										</form>
									</div>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">No raffle rules found!</td>
							</tr>
						@endforelse

						</tbody>
					</table>
					{{ $raffleRules->links()}}
				</div>
			</div>
		</div>
	</section>
@endsection


@push('script')
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script>
        function statusChange(id, element) {
            var url = '{{ route('admin.cms.raffle-rules.status', ':id') }}';
            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (resp) {
                    toastr.success('Raffle Rule Status Changed Successfully');
                    $('#raffle--rules--list').html(resp)
                }, // success end
                error: function (error) {
                    toastr.error('Something was wrong.');
                } // Error
            })
        }
	</script>
	<script>
        $(document).ready(function () {

            function updateToDatabase(idString) {
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});

                $.ajax({
                    url: '{{route('admin.cms.raffle-rules.order-update')}}',
                    method: 'POST',
                    data: {ids: idString},
                    success: function (resp) {
                        console.log(resp)
                        toastr.success('Order Sorted Successfully.');
                        $('#raffle--rules--list').html(resp)
                    },
                    error: function (error) {
                        toastr.error('Something was wrong.');
                    }
                })
            }

            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function (e, ui) {
                    var sortData = target.sortable('toArray', {attribute: 'data-id'})
                    updateToDatabase(sortData.join(','))
                }
            })

        })
	</script>
@endpush
