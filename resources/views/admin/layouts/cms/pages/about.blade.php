@extends('admin.app')
@section('title', 'About Page CMS')
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
							<h3>About page content update</h3>
						</div>
					</div>
					<div class="col-12">
						<div class="border p-4 rounded">
							<h5 class="mb-4">The Mission Section</h5>
							<form method="POST" action="{{ route('admin.cms.about.the-mission') }}"
							      enctype="multipart/form-data">@csrf
								<div class="row">
									<div class="col-lg-6 mb-3">
										<div>
											<label for="title_en" class="form-label required">Title(En)</label>
											<input type="text" class="form-control" id="title_en"
											       value="{{!empty($the_mission) ? $the_mission->title_en :old('title_en')}}"
											       name="title_en">
											@error('title_en')
											<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="title_de" class="form-label required">Title(De)</label>
											<input type="text" class="form-control" id="title_de"
											       value="{{!empty($the_mission) ? $the_mission->title_de :old('title_de')}}"
											       name="title_de">
											@error('title_de')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="title_hu" class="form-label required">Title(Hu)</label>
											<input type="text" class="form-control" id="title_hu"
											       value="{{!empty($the_mission) ? $the_mission->title_hu :old('title_hu')}}"
											       name="title_hu">
											@error('title_hu')
											<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="image" class="form-label required">Image</label>
											<input type="file" class="form-control dropify" id="image" name="image"
											       accept="image/png,image/gif,image/jpeg,image/jpg,image/svg"
											       data-default-file="{{!empty($the_mission) ? asset($the_mission->image) : null}}">
											@error('image')
											<span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 mb-3">
										<div class="">
											<label for="description_en"
											       class="form-label required">Description(En)</label>
											<textarea type="text" class="form-control" rows="4" id="description"
											          name="description_en"
											          placeholder="Write here....">{{!empty($the_mission) ? $the_mission->description_en :old('description_en')}}</textarea>
											@error('description_en')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="description_de"
											       class="form-label required">Description(De)</label>
											<textarea type="text" class="form-control" rows="4" id="description"
											          name="description_de"
											          placeholder="Write here....">{{!empty($the_mission) ? $the_mission->description_de :old('description_de')}}</textarea>
											@error('description_de')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="description_hu"
											       class="form-label required">Description(Hu)</label>
											<textarea type="text" class="form-control" rows="4" id="description_hu"
											          name="description_hu"
											          placeholder="Write here....">{{!empty($the_mission) ? $the_mission->description_hu :old('description_hu')}}</textarea>
											@error('description_hu')
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
							<h5 class="mb-4">Transparency Section</h5>
							<form method="POST"
							      action="{{ route('admin.cms.about.the-transparency') }}">@csrf
								<div class="row">
									<div class="col-lg-6 mb-3">
										<div>
											<label for="t_title_en" class="form-label required">Title(En)</label>
											<input type="text" class="form-control" id="t_title_en"
											       value="{{!empty($the_transparency) ? $the_transparency->title_en : old('t_title_en')}}"
											       name="t_title_en">
											@error('t_title_en')
											<span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="t_title_de" class="form-label required">Title(De)</label>
											<input type="text" class="form-control" id="t_title_de"
											       value="{{!empty($the_transparency) ? $the_transparency->title_de : old('t_title_de')}}"
											       name="t_title_de">
											@error('t_title_de')
											<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="t_title_hu" class="form-label required">Title(Hu)</label>
											<input type="text" class="form-control" id="t_title_hu"
											       value="{{!empty($the_transparency) ? $the_transparency->title_hu : old('t_title_hu')}}"
											       name="t_title_hu">
											@error('t_title_hu')
											<span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 mb-3">
										<div class="">
											<label for="t_description_en"
											       class="form-label required">Description(En)</label>
											<textarea type="text" class="form-control" rows="4" id="t_description_en"
											          name="t_description_en"
											          placeholder="Write here....">{{!empty($the_transparency) ? $the_transparency->description_en :old('t_description_en')}}</textarea>
											@error('t_description_en')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="t_description_de"
											       class="form-label required">Description(De)</label>
											<textarea type="text" class="form-control" rows="4" id="t_description_de"
											          name="t_description_de"
											          placeholder="Write here....">{{!empty($the_transparency) ? $the_transparency->description_de :old('t_description_de')}}</textarea>
											@error('t_description_de')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="mt-3">
											<label for="t_description_hu"
											       class="form-label required">Description(Hu)</label>
											<textarea type="text" class="form-control" rows="4" id="t_description_hu"
											          name="t_description_hu"
											          placeholder="Write here....">{{!empty($the_transparency) ? $the_transparency->description_hu :old('t_description_hu')}}</textarea>
											@error('t_description_hu')
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
