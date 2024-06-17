@extends('admin.app')
@section('title', 'Home Page CMS')
@section('header_title')
	CMS
@endsection;
@section('content')
	<section class="app--content--main statistics">
		<!-- profile area  -->
		<div class="profile--area main-section-margin">
			<div>
				<!-- profile  -->
				<div class="row">
					<div class="col-md-6 mb-5">
						<div class="personal--info profile--info--box">
							<h3>Home page content update</h3>
						</div>
					</div>
					<div class="col-12">
						<div class="border p-4 rounded">
							<h5 class="mb-4">Ticket Chance Section</h5>
							<form method="POST" action="{{ route('admin.cms.home-page.update-or-create-chance') }}"
							      enctype="multipart/form-data">@csrf
								<div class="row">
									<div class="col-12">
										<h6 class="mb-2">Title</h6>
										<div class="row">
											<div class="col-lg-4">
												<label for="title_en" class="form-label required">En</label>
												<input type="text" class="form-control" id="title_en"
												       value="{{!empty($ticket_chance) ? $ticket_chance->title_en :old('title_en')}}"
												       name="title_en">
												@error('title_en')
												<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="title_de" class="form-label required">De</label>
												<input type="text" class="form-control" id="title_de"
												       value="{{!empty($ticket_chance) ? $ticket_chance->title_de :old('title_de')}}"
												       name="title_de">
												@error('title_de')
												<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="title_hu" class="form-label required">Hu</label>
												<input type="text" class="form-control" id="title_hu"
												       value="{{!empty($ticket_chance) ? $ticket_chance->title_hu :old('title_hu')}}"
												       name="title_hu">
												@error('title_hu')
												<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-12 mt-4">
										<h6 class="mb-2">Sub Title</h6>
										<div class="row">
											<div class="col-lg-4">
												<label for="sub_title_en" class="form-label required">En</label>
												<input type="text" class="form-control" id="sub_title_en"
												       value="{{!empty($ticket_chance) ? $ticket_chance->sub_title_en :old('sub_title_en')}}"
												       name="sub_title_en">
												@error('sub_title_en')
												<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="sub_title_de" class="form-label required">De</label>
												<input type="text" class="form-control" id="sub_title_de"
												       value="{{!empty($ticket_chance) ? $ticket_chance->sub_title_de :old('sub_title_de')}}"
												       name="sub_title_de">
												@error('sub_title_de')
												<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="sub_title_hu" class="form-label required">Hu</label>
												<input type="text" class="form-control" id="sub_title_hu"
												       value="{{!empty($ticket_chance) ? $ticket_chance->sub_title_hu :old('sub_title_hu')}}"
												       name="sub_title_hu">
												@error('sub_title_hu')
												<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-12 mt-4">
										<h6 class="mb-2">Description</h6>
										<div class="row">
											<div class="col-lg-4">
												<label for="description_en"
												       class="form-label required">En</label>
												<textarea type="text" class="form-control" rows="4" id="description"
												          name="description_en"
												          placeholder="Write here....">{{!empty($ticket_chance) ? $ticket_chance->description_en :old('description_en')}}</textarea>
												@error('description_en')
												<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="description_de"
												       class="form-label required">De</label>
												<textarea type="text" class="form-control" rows="4" id="description"
												          name="description_de"
												          placeholder="Write here....">{{!empty($ticket_chance) ? $ticket_chance->description_de :old('description_de')}}</textarea>
												@error('description_de')
												<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
												@enderror
											</div>
											<div class="col-lg-4">
												<label for="description_hu"
												       class="form-label required">Hu</label>
												<textarea type="text" class="form-control" rows="4" id="description_hu"
												          name="description_hu"
												          placeholder="Write here....">{{!empty($ticket_chance) ? $ticket_chance->description_hu :old('description_hu')}}</textarea>
												@error('description_hu')
												<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-12 mt-4">
										<div>
											<label for="image" class="form-label required h6">Image</label>
											<input type="file" class="form-control dropify" id="image" name="image"
											       accept="image/png,image/gif,image/jpeg,image/jpg,image/svg"
											       data-default-file="{{!empty($ticket_chance) ? asset($ticket_chance->image) : null}}">
											@error('image')
											<span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
											@enderror
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mt-3">Submit</button>
							</form>
						</div>
						<div class="border p-4 rounded mt-5">
							<h5 class="mb-4">Win Spin Section</h5>
							<form method="POST"
							      action="{{ route('admin.cms.home-page.update-or-create-win-spin') }}">@csrf
								<div class="row">
									<div class="col-12 mb-4">
										<div class="row">
											<div class="col-12 mt-4">
												<h6 class="mb-2">Title</h6>
												<div class="row">
													<div class="col-lg-4">
														<label for="title_en" class="form-label required">En</label>
														<input type="text" class="form-control" id="title_en"
														       value="{{!empty($win_spin) ? $win_spin->title_en : old('win_title_en')}}"
														       name="win_title_en">
														@error('win_title_en')
														<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
														@enderror
													</div>
													<div class="col-lg-4">
														<label for="title_de"
														       class="form-label required">De</label>
														<input type="text" class="form-control" id="title_de"
														       value="{{!empty($win_spin) ? $win_spin->title_de : old('win_title_de')}}"
														       name="win_title_de">
														@error('win_title_de')
														<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
														@enderror
													</div>
													<div class="col-lg-4">
														<label for="title_hu"
														       class="form-label required">Hu</label>
														<input type="text" class="form-control" id="title_hu"
														       value="{{!empty($win_spin) ? $win_spin->title_hu : old('win_title_hu')}}"
														       name="win_title_hu">
														@error('win_title_hu')
														<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
														@enderror
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-12">
												<h6 class="mb-2">Sub Title</h6>
												<div class="row">
													<div class="col-lg-4">
														<label for="sub_title_en" class="form-label required">En</label>
														<input type="text" class="form-control" id="sub_title_en"
														       value="{{!empty($win_spin) ? $win_spin->sub_title_en : old('win_sub_title_en')}}"
														       name="win_sub_title_en">
														@error('win_sub_title_en')
														<span class="invalid-feedback d-block" role="alert">
				                                                 <strong>{{ $message }}</strong>
				                                             </span>
														@enderror
													</div>
													<div class="col-lg-4">
														<label for="sub_title_de" class="form-label required">De</label>
														<input type="text" class="form-control" id="sub_title_de"
														       value="{{!empty($win_spin) ? $win_spin->sub_title_de : old('win_sub_title_de')}}"
														       name="win_sub_title_de">
														@error('win_sub_title_de')
														<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
														@enderror
													</div>
													<div class="col-lg-4">
														<label for="sub_title_hu" class="form-label required">Hu</label>
														<input type="text" class="form-control" id="sub_title_hu"
														       value="{{!empty($win_spin) ? $win_spin->sub_title_hu : old('win_sub_title_hu')}}"
														       name="win_sub_title_hu">
														@error('win_sub_title_hu')
														<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
														@enderror
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mt-3">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

{{-- Push Script --}}
@push('script')
	<script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });

        const link_type = $("#link_type");
        if (link_type.val() === 'map_link') {
            $("#video_link").hide()
            $("#map_link").show()
        } else {
            $("#video_link").show()
            $("#map_link").hide()
        }

        link_type.on('change', function () {
            if (link_type.val() === 'map_link') {
                $("#video_link").hide()
                $("#map_link").show()
            } else {
                $("#video_link").show()
                $("#map_link").hide()
            }
        });
	</script>
@endpush
