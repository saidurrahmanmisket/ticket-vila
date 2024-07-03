@extends('admin.app')
@section('title', 'Raffle Rule Create  ')
@section('header_title')
	CMS
@endsection;
@section('content')
	<section class="app--content--main statistics">
		<!-- profile area  -->
		<div class="profile--area main-section-margin">
			<form method="POST" action="{{ route('admin.cms.raffle-rules.store') }}" enctype="multipart/form-data">@csrf
				<!-- profile  -->
				<div class="row">
					<div class="col-md-6 mb-5">
						<div class="personal--info profile--info--box">
							<h3>Raffle Rules Create</h3>
						</div>
					</div>
					<div class="col-12">
						<div>
							<div class="row">
								<div class="col-12">
									<div class="d-flex flex-column">
										<label for="button_type" class="form-label required h5">Select Button
											Type</label>
										<select class="form-select form-select-lg mb-3" id="button_type"
										        name="button_type">
											<option selected value="">Select button type</option>
											@foreach(\App\Enums\ButtonType::raffleRulesMap() as $index => $button)
												<option @if(old('button_type') == $index) selected
												        @endif value="{{$index}}">{{ $button }}</option>
											@endforeach
										</select>
										@error('button_type')
										<span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
										@enderror
									</div>
								</div>
								<div class="col-12 mt-4">
									<h5 class="mb-2">Title</h5>
									<div class="row">
										<div class="col-lg-4">
											<label for="title_en" class="form-label required">En</label>
											<input type="text" class="form-control" id="title_en"
											       value="{{old('title_en')}}" name="title_en">
											@error('title_en')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="col-lg-4">
											<label for="title_de" class="form-label required">De</label>
											<input type="text" class="form-control" id="title_de"
											       value="{{old('title_de')}}" name="title_de">
											@error('title_de')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="col-lg-4">
											<label for="title_hu" class="form-label required">Hu</label>
											<input type="text" class="form-control" id="title_hu"
											       value="{{old('title_hu')}}" name="title_hu">
											@error('title_hu')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
									</div>
								</div>
								<div class="col-12 mt-4">
									<h5 class="mb-2">Description</h5>
									<div class="row">
										<div class="col-lg-4">
											<label for="description_en" class="form-label required">En</label>
											<textarea type="text" class="form-control ck_editor" rows="4"
											          id="description"
											          name="description_en"
											          placeholder="Write here....">{{old('description_en')}}</textarea>
											@error('description_en')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="col-lg-4">
											<label for="description_de" class="form-label required">De</label>
											<textarea type="text" class="form-control ck_editor" rows="4"
											          id="description"
											          name="description_de"
											          placeholder="Write here....">{{old('description_de')}}</textarea>
											@error('description_de')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
										<div class="col-lg-4">
											<label for="description_hu" class="form-label required">Hu</label>
											<textarea type="text" class="form-control ck_editor" rows="4"
											          id="description_hu"
											          name="description_hu"
											          placeholder="Write here....">{{old('description_hu')}}</textarea>
											@error('description_hu')
											<span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
											@enderror
										</div>
									</div>
								</div>
								<div class="col-12">
									<div id="image_type" class="mt-4">
										<label for="image" class="form-label required h5">Image</label>
										<input type="file" class="form-control dropify" id="image" name="image"
										       accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
										@error('image')
										<span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
										@enderror
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary mt-3">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection

