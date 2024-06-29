@extends('admin.app')
@section('title', '3D map Or Video')
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
							<h3>3D map Or Video Section</h3>
						</div>
					</div>
					<div class="col-12">
						<div class="border p-4 rounded">
							<h5 class="mb-4">3D House Tour Section</h5>
							<form method="POST" action="{{ route('admin.cms.three-d-map-or-video.house-tour') }}"
							      enctype="multipart/form-data">@csrf
								<div class="row">
									<div class="col-12">
										<div class="d-flex flex-column">
											<label for="link_type" class="form-label required h6">3D link Type</label>
											<select class="form-select form-select-lg mb-3" id="link_type"
											        name="link_type">
												<option {{!empty($house_tour) ? (!empty($house_tour->link) ? '' : 'selected') : (old('link_type') == 'youtube_link' ? 'selected' : '')}} value="youtube_link">
													Youtube Video
												</option>
												<option {{!empty($house_tour) ? (!empty($house_tour->link) ? 'selected' : '') : (old('link_type') == 'map_link' ? 'selected' : '')}} value="map_link">
													Google Map
												</option>
											</select>
											@error('link_type')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
										<div class="mt-4" id="video_link">
											<h6 class="mb-2">Youtube
												Embed</h6>
											<div class="row">
												<div class="col-lg-4">
													<label for="video_url_en" class="form-label required">En</label>
													<input type="url" class="form-control" id="video_url_en"
													       value="{{!empty($house_tour) ? $house_tour->link_en  : old('video_url_en') }}"
													       name="video_url_en">
													@error('video_url_en')
													<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="video_url_de" class="form-label required">De</label>
													<input type="url" class="form-control" id="video_url_de"
													       value="{{!empty($house_tour) ? $house_tour->link_en  : old('video_url_de') }}"
													       name="video_url_de">
													@error('video_url_de')
													<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="video_url_hu" class="form-label required">Hu</label>
													<input type="url" class="form-control" id="video_url_hu"
													       value="{{!empty($house_tour) ? $house_tour->link_en  : old('video_url_hu') }}"
													       name="video_url_hu">
													@error('video_url_hu')
													<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
											</div>
										</div>
										<div id="map_input" class="mt-4">
											<label for="map_link" class="form-label required h6">Map Embed</label>
											<input type="url" class="form-control" id="map_link"
											       value="{{!empty($house_tour) ? $house_tour->link  : old('map_link') }}"
											       name="map_link">
											@error('map_link')
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
							<h5 class="mb-4">3D Property View Section</h5>
							<form method="POST"
							      action="{{ route('admin.cms.three-d-map-or-video.property-view') }}">@csrf
								<div class="row">
									<div class="col-lg-12 mb-4">
										<div class="d-flex flex-column">
											<label for="p_link_type" class="form-label required h6">3D link Type</label>
											<select class="form-select form-select-lg mb-3" id="p_link_type"
											        name="p_link_type">
												<option {{!empty($property_view) ? (!empty($property_view->link) ? '' : 'selected') : (old('p_link_type') == 'youtube_link' ? 'selected' : '')}} value="youtube_link">
													Youtube Video
												</option>
												<option {{!empty($property_view) ? (!empty($property_view->link) ? 'selected' : '') : (old('p_link_type') == 'map_link' ? 'selected' : '')}} value="map_link">
													Google Map
												</option>
											</select>
											@error('p_link_type')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
									</div>
									<div class="col-12 mb-3">
										{{--map link--}}
										<div id="p_map_input">
											<label for="p_map_link" class="form-label required h6">Map Embed</label>
											<input type="url" class="form-control" id="p_map_link"
											       value="{{!empty($property_view) ? $property_view->link : old('p_map_link')}}"
											       name="p_map_link">
											@error('p_map_link')
											<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										{{--Video Link--}}
										<div id="p_video_link">
											<h6 class="mb-2">Youtube Embed</h6>
											<div class="row">
												<div class="col-lg-4">
													<label for="p_video_url_en" class="form-label required">En</label>
													<input type="url" class="form-control" id="title_en"
													       value="{{!empty($property_view) ? $property_view->link_en : old('p_video_url_en')}}"
													       name="p_video_url_en">
													@error('p_video_url_en')
													<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="p_video_url_de" class="form-label required">De</label>
													<input type="url" class="form-control" id="p_video_url_de"
													       value="{{!empty($property_view) ? $property_view->link_de : old('p_video_url_de')}}"
													       name="p_video_url_de">
													@error('p_video_url_de')
													<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="p_video_url_hu" class="form-label required">Hu</label>
													<input type="url" class="form-control" id="p_video_url_hu"
													       value="{{!empty($property_view) ? $property_view->link_hu : old('p_video_url_hu')}}"
													       name="p_video_url_hu">
													@error('p_video_url_hu')
													<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mt-3">Submit</button>
							</form>
						</div>
						<div class="border p-4 rounded mt-5">
							<h5 class="mb-4">3D Street View Section</h5>
							<form method="POST"
							      action="{{ route('admin.cms.three-d-map-or-video.street-view') }}">@csrf
								<div class="row">
									<div class="col-lg-12 mb-4">
										<div class="d-flex flex-column">
											<label for="s_link_type" class="form-label required h6">3D link Type</label>
											<select class="form-select form-select-lg mb-3" id="s_link_type"
											        name="s_link_type">
													<option {{!empty($street_view) ? (!empty($street_view->link) ? 'selected' : '') : (old('s_link_type') == 'map_link' ? 'selected' : '')}} value="map_link">
														Google Map
													</option>

													<option {{!empty($street_view) ? (!empty($street_view->link) ? '' : 'selected') : (old('s_link_type') == 'youtube_link' ? 'selected' : '')}} value="youtube_link">
													Youtube Video
												</option>

											</select>
											@error('s_link_type')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
									</div>
									<div class="col-12 mb-3">
										{{--map link--}}
										<div id="s_map_input">
											<label for="s_map_link" class="form-label required h6">Map Embed</label>
											<input type="url" class="form-control" id="s_map_link"
											       value="{{!empty($street_view) ? $street_view->link : old('s_map_link')}}"
											       name="s_map_link">
											@error('s_map_link')
											<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										{{--Video Link--}}
										<div id="s_video_link">
											<h6 class="mb-2">Youtube Embed</h6>
											<div class="row">
												<div class="col-lg-4">
													<label for="s_video_url_en" class="form-label required">En</label>
													<input type="url" class="form-control" id="title_en"
													       value="{{!empty($street_view) ? $street_view->link_en : old('s_video_url_en')}}"
													       name="s_video_url_en">
													@error('s_video_url_en')
													<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="s_video_url_de" class="form-label required">De</label>
													<input type="url" class="form-control" id="s_video_url_de"
													       value="{{!empty($street_view) ? $street_view->link_de : old('s_video_url_de')}}"
													       name="s_video_url_de">
													@error('s_video_url_de')
													<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="s_video_url_hu" class="form-label required">Hu</label>
													<input type="url" class="form-control" id="s_video_url_hu"
													       value="{{!empty($street_view) ? $street_view->link_hu : old('s_video_url_hu')}}"
													       name="s_video_url_hu">
													@error('s_video_url_hu')
													<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mt-3">Submit</button>
							</form>
						</div>
						<div class="border p-4 rounded mt-5">
							<h5 class="mb-4">Visit Your New Home Section</h5>
							<form method="POST"
							      action="{{ route('admin.cms.three-d-map-or-video.visit-your-new-home') }}">@csrf
								<div class="row">
									<div class="col-lg-12 mb-4">
										<div class="d-flex flex-column">
											<label for="h_link_type" class="form-label required h6">3D link Type</label>
                                            <select class="form-select form-select-lg mb-3" id="h_link_type"
                                                    name="h_link_type">
                                                <option {{!empty($visit_your_new_home) ? (!empty($visit_your_new_home->link) ? '' : 'selected') : (old('h_link_type') == 'youtube_link' ? 'selected' : '')}} value="youtube_link">
                                                    Youtube Video
                                                </option>
                                                <option {{!empty($visit_your_new_home) ? (!empty($visit_your_new_home->link) ? 'selected' : '') : (old('h_link_type') == 'map_link' ? 'selected' : '')}} value="map_link">
                                                    Google Map
                                                </option>
                                            </select>
											@error('h_link_type')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
									</div>
									<div class="col-12 mb-3">
										{{--map link--}}
										<div id="h_map_input">
											<label for="h_map_link" class="form-label required h6">Map Embed</label>
											<input type="url" class="form-control" id="h_map_link"
											       value="{{!empty($visit_your_new_home) ? $visit_your_new_home->link : old('h_map_link')}}"
											       name="h_map_link">
											@error('h_map_link')
											<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										{{--Video Link--}}
										<div id="h_video_link">
											<h6 class="mb-2">Youtube Embed</h6>
											<div class="row">
												<div class="col-lg-4">
													<label for="h_video_url_en" class="form-label required">En</label>
													<input type="url" class="form-control" id="title_en"
													       value="{{!empty($visit_your_new_home) ? $visit_your_new_home->link_en : old('h_video_url_en')}}"
													       name="h_video_url_en">
													@error('h_video_url_en')
													<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="h_video_url_de" class="form-label required">De</label>
													<input type="url" class="form-control" id="h_video_url_de"
													       value="{{!empty($visit_your_new_home) ? $visit_your_new_home->link_de : old('h_video_url_de')}}"
													       name="h_video_url_de">
													@error('h_video_url_de')
													<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
													@enderror
												</div>
												<div class="col-lg-4">
													<label for="h_video_url_hu" class="form-label required">Hu</label>
													<input type="url" class="form-control" id="h_video_url_hu"
													       value="{{!empty($visit_your_new_home) ? $visit_your_new_home->link_hu : old('h_video_url_hu')}}"
													       name="h_video_url_hu">
													@error('h_video_url_hu')
													<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
													@enderror
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
            $("#map_input").show()
        } else {
            $("#video_link").show()
            $("#map_input").hide()
        }

        link_type.on('change', function () {
            if (link_type.val() === 'map_link') {
                $("#video_link").hide()
                $("#map_input").show()
            } else {
                $("#video_link").show()
                $("#map_input").hide()
            }
        });
        const p_link_type = $("#p_link_type");
        if (p_link_type.val() === 'map_link') {
            $("#p_video_link").hide()
            $("#p_map_input").show()
        } else {
            $("#p_video_link").show()
            $("#p_map_input").hide()
        }

        p_link_type.on('change', function () {
            if (p_link_type.val() === 'map_link') {
                $("#p_video_link").hide()
                $("#p_map_input").show()
            } else {
                $("#p_video_link").show()
                $("#p_map_input").hide()
            }
        });
        const s_link_type = $("#s_link_type");
        if (s_link_type.val() === 'map_link') {
            $("#s_video_link").hide()
            $("#s_map_input").show()
        } else {
            $("#s_video_link").show()
            $("#s_map_input").hide()
        }

        s_link_type.on('change', function () {
            if (s_link_type.val() === 'map_link') {
                $("#s_video_link").hide()
                $("#s_map_input").show()
            } else {
                $("#s_video_link").show()
                $("#s_map_input").hide()
            }
        });

        const h_link_type = $("#h_link_type");
        if (h_link_type.val() === 'map_link') {
            $("#h_video_link").hide()
            $("#h_map_input").show()
        } else {
            $("#h_video_link").show()
            $("#h_map_input").hide()
        }

        h_link_type.on('change', function () {
            if (h_link_type.val() === 'map_link') {
                $("#h_video_link").hide()
                $("#h_map_input").show()
            } else {
                $("#h_video_link").show()
                $("#h_map_input").hide()
            }
        });
	</script>
@endpush
