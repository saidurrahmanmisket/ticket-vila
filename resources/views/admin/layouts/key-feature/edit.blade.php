@extends('admin.app')
@section('title', 'Gift Edit')
@section('header_title')
    Gift Edit
@endsection;

@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row ">
            <div class="col mx-auto">

                <form method="POST" action="{{ route('admin.key-feature.update', $keyFeature) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="personal--info profile--info--box">

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mt-4">
                                    <label for="gift_id" class="form-label required h4 mt-2 me-5">Select Gift</label>
                                    <select class="form-select form-select-lg mb-3 px-5" id="gift_id" name="gift_id">
                                        <option selected>Select gift</option>
                                        @foreach($gifts as $gift)
                                            <option {{$keyFeature->gift_id == $gift->id ? 'selected' : ''}} value="{{ $gift->id }}">{{ $gift->name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('gift_id')
                                    <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>

                                <div class="row justify-content-center" id="feature-content">
                                    <div class="col ">
                                        <div class="card border border-primary mt-4 p-2">

                                            <div class="card-body">
                                                <div class=" mb-4 ">
                                                    <div class="">
                                                        <div class="d-flex justify-content-between">
                                                            <div>

                                                                <h4>Gift Edit</h4>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <h5 class="mt-5">Feature Title</h5>
                                                            <div class="col-lg-4">
                                                                <div class="input--group ">
                                                                    <label for="title_en">EN<span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="@error('title_en') is-invalid @enderror" id="title_en" name="title_en" type="text"
                                                                           placeholder="Feature Title.." value="{{$keyFeature->title_en}}">
                                                                    {{--                                                                @dd($errors)--}}
                                                                    @error('title_en' )
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>


                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="input--group">
                                                                    <label for="title_de">DE<span
                                                                            class="text-danger">*</span></label>
                                                                    <input id="title_de" name="title_de" type="text"
                                                                           value="{{$keyFeature->title_de}}"
                                                                           placeholder="Feature Title..">
                                                                    @error('title_de')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="input--group">
                                                                    <label for="title_hu">HU <span
                                                                            class="text-danger">*</span></label>
                                                                    <input id="title_hu" name="title_hu" type="text"
                                                                           value="{{$keyFeature->title_hu}}"
                                                                           placeholder="Feature Title..">
                                                                    @error('title_hu')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-4" id="imageUploadContainerPlan">
                                                            <div class="col">
                                                                <label for="image">Image:</label>
                                                                <input type="file"
                                                                       class="form-control form-control-lg mt-2 border-left-0 dropify"
                                                                       name="icon" data-show-remove="true" accept="image/*"
                                                                       data-default-file="{{asset($keyFeature->icon)}}">
                                                                @error('icon')
                                                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <div class="d-flex justify-content-center mb-5">
                            <button type="submit ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click.',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        //for inside image
        document.getElementById('addImageInput').addEventListener('click', function() {
            var container = document.getElementById('imageUploadContainer');
            var newInput = document.createElement('div');
            newInput.classList.add('col-md-4');
            newInput.innerHTML = `
                <input type="file"  class="form-control form-control-md border-left-0 dropify" name="inside_image[]" accept="image/*" value="{{ old('image', '') }}" data-show-remove="true">
                <a type="button" class="btn btn-danger btn-sm remove-image" >X</a>
                `;
            // <label for="image">Gallery Image:</label>
            container.appendChild(newInput);
            // Initialize Dropify for the new input field
            $('.dropify').dropify();
        });
        // Event delegation to handle remove button click for dynamically added fields
        $('#imageUploadContainer').on('click', '.remove-image', function() {
            $(this).parent().remove();
            $.ajax({
                url: "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $keyFeature->id }}',
                    gift_image_type: 'inside'
                },
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);

                },
            });

        });

        //for outside image
        document.getElementById('addImageInputOutside').addEventListener('click', function() {
            var container = document.getElementById('imageUploadContainerOutside');
            var newInput = document.createElement('div');
            newInput.classList.add('col-md-4');
            newInput.innerHTML = `
                <input type="file"  class="form-control form-control-md border-left-0 dropify" name="outside_image[]" accept="image/*" value="{{ old('image', '') }}" data-show-remove="true">
                <a type="button" class="btn btn-danger btn-sm remove-image" >X</a>
                `;
            // <label for="image">Gallery Image:</label>
            container.appendChild(newInput);
            // Initialize Dropify for the new input field
            $('.dropify').dropify();
        });
        // Event delegation to handle remove button click for dynamically added fields
        $('#imageUploadContainerOutside').on('click', '.remove-image', function() {
            $(this).parent().remove();
            $.ajax({
                url: "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $keyFeature->id }}',
                    gift_image_type: 'outside',
                },
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);

                },
            });
        });



        //for plan image
        document.getElementById('addImageInputPlan').addEventListener('click', function() {
            var container = document.getElementById('imageUploadContainerPlan');
            var newInput = document.createElement('div');
            newInput.classList.add('col-md-4');
            newInput.innerHTML = `
                <input type="file"  class="form-control form-control-md border-left-0 dropify" name="plan_image[]" accept="image/*" value="{{ old('image', '') }}" data-show-remove="true">
                <a type="button" class="btn btn-danger btn-sm remove-image" >X</a>
                `;
            // <label for="image">Gallery Image:</label>
            container.appendChild(newInput);
            // Initialize Dropify for the new input field
            $('.dropify').dropify();
        });
        // Event delegation to handle remove button click for dynamically added fields
        $('#imageUploadContainerPlan').on('click', '.remove-image', function() {
            $(this).parent().remove();
            $.ajax({
                url: "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $keyFeature->id }}',
                    gift_image_type: 'plan'
                },
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);

                },
            });
        });



        //add feature section

        document.addEventListener('DOMContentLoaded', function() {
            let featureCount = $('.feature-no:last').text().toLowerCase();

            document.getElementById('addFeature').addEventListener('click', function() {
                featureCount++;
                const featureContent = document.getElementById('feature-content');

                const newFeature = document.createElement('div');
                newFeature.classList.add('feature-item');
                newFeature.innerHTML = `
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <a type="button" class="justify-end btn btn-danger btn-sm remove-feature">X</a>
                        </div>
                        <h4 class="mt-4">Feature <strong class="feature-no">${featureCount}</strong></h4>

                        <div class="row">
                            <h5 class="mt-5">Feature Title</h5>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_title_en">EN<span class="text-danger">*</span></label>
                                    <input id="feature_title_en" name="feature_title_en[]" type="text" value=""
                                        placeholder="Feature Title (en)..">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_title_de">DE<span class="text-danger">*</span></label>
                                    <input id="feature_title_de" name="feature_title_de[]" type="text" value=""
                                        placeholder="Feature Title (de)..">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_title_de">HU <span class="text-danger">*</span></label>
                                    <input id="feature_title_de" name="feature_title_hu[]" type="text" value=""
                                        placeholder="Feature Title (hu)..">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5 class="mt-5">Feature Sub Title</h5>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_sub_title_en">EN</label>
                                    <input id="feature_sub_title_en" name="feature_sub_title_en[]" type="text" value=""
                                        placeholder="Feature Sub Title (hu)..">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_sub_title_de">DE</label>
                                    <input id="feature_sub_title_de" name="feature_sub_title_de[]" type="text" value=""
                                        placeholder="Feature Sub Title (de)..">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input--group">
                                    <label for="feature_sub_title_hu">HU</label>
                                    <input id="feature_sub_title_hu" name="feature_sub_title_hu[]" type="text" value=""
                                        placeholder="Feature Sub Title (hu)..">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4" id="imageUploadContainerPlan">
                            <div class="col">
                                {{-- <label for="image">Gallery Image:</label> --}}
                                <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                    name="feature_image[]" id="feature_image${featureCount}" data-show-remove="true"
                                    accept="image/*" data-default-file="">
                            </div>
                        </div>
                    </div>
                </div>
            `;

                featureContent.appendChild(newFeature);

                // Re-initialize dropify for the new input
                $('.dropify').dropify();
            });
        });


        // disable image for upload
        $(document).ready(function() {

            $('.dropify-disabled').on('click', function(event, element) {

                // Prevent the input from being clicked
                event.preventDefault();
                event.stopPropagation();


                return false;
            })
        });

        //delete feature item
        $('#feature-content').on('click', '.remove-feature', function() {
            console.log('ok');
            $(this).parent().parent().parent().remove();
            $.ajax({
                url: "{{ route('admin.deleteGifFeatureItem') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $keyFeature->id }}',
                },
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);

                },
            });
        });
    </script>
@endpush
