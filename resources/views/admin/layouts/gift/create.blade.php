@extends('admin.app')
@section('title', 'Gift create')
@section('header_title')
    Gift
@endsection;
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row ">
            <div class="col-md-8 mx-auto">

                <form method="POST" action="{{ route('admin.gift.store') }}" enctype="multipart/form-data">@csrf
                    <div class="personal--info profile--info--box">
                        <h3>Gift Create</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="input--group">
                                    <label for="name">Gift Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" type="text" value="{{ old('name') }}"
                                        placeholder="Gift name...">
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-5">
                                    <label for="gift_image">Gift Image</label>
                                    <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                        name="gift_image" id="gift_image" data-show-remove="true" accept="gift_image/*"
                                        data-default-file="">
                                </div>
                                <div class="mt-4">
                                    <label for="gift_thum_image">Gift Thumbnail Image</label>
                                    <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                        name="gift_thum_image" id="gift_thum_image" data-show-remove="true" accept="image/*"
                                        value="{{ old('gift_thum_image', '') }}" data-default-file="">
                                        @error('gift_thum_image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-3">
                            <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                name="image[]" id="image" data-show-remove="true" accept="image/*"
                                value="{{ old('image', '') }}" data-default-file="">
                            @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>Image is Required and size should not exceed 4MB.</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="card my-4 p-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2 mb-4">
                                    <h4 class="">Inside Image</h4>
                                    <a type="button" id="addImageInput" class="btn btn-primary ">Add Another image</a>
                                </div>

                                <div class="form-group row" id="imageUploadContainer">
                                    <div class="col">
                                        {{-- <label for="image">Gallery Image:</label> --}}
                                        <input type="file"
                                            class="form-control form-control-lg mt-2 border-left-0 dropify"
                                            name="inside_image[]" data-show-remove="true" accept="image/*"
                                            value="{{ old('inside_image') }}" data-default-file="">
                                            @error('inside_image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        @error('inside_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4 p-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2 mb-4">
                                    <h4 class="">Outside Image</h4>
                                    <a type="button" id="addImageInputOutside" class="btn btn-primary ">Add Another
                                        image</a>
                                </div>
                                <div class="form-group row" id="imageUploadContainerOutside">
                                    <div class="col">
                                        {{-- <label for="image">Gallery Image:</label> --}}
                                        <input type="file"
                                            class="form-control form-control-lg mt-2 border-left-0 dropify"
                                            name="outside_image[]" data-show-remove="true" accept="image/*"
                                            value="{{ old('outside_image', '') }}" data-default-file="">
                                            @error('outside_image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        @error('outside_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- gift plan image --}}
                        <div class="card my-4 p-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2 mb-4">
                                    <h4 class="">Plan Image</h4>
                                    <a type="button" id="addImageInputPlan" class="btn btn-primary ">Add Another image</a>
                                </div>
                                <div class="form-group row" id="imageUploadContainerPlan">
                                    <div class="col">
                                        {{-- <label for="image">Gallery Image:</label> --}}
                                        <input type="file"
                                            class="form-control form-control-lg mt-2 border-left-0 dropify"
                                            name="plan_image[]" data-show-remove="true" accept="image/*"
                                            value="{{ old('plan_image', '') }}" data-default-file="">
                                        @error('plan_image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- gift property link --}}
                        <div class="card my-4 p-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2 mb-4">
                                    <h4 class="">Property Link</h4>
                                </div>
                                <div class="input--group">
                                    <label for="video_inside">Property Inside Link</label>
                                    <input name="video_inside" type="url" value="{{ old('video_inside') }}"
                                        placeholder="Video Link...">
                                    @error('video_inside')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input--group">
                                    <label for="video_outside">Property View Link</label>
                                    <input id="video_outside" name="video_outside" type="url"
                                        value="{{ old('video_outside') }}" placeholder="Video Link...">
                                    @error('video_outside')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- gift feature section  --}}
                        <div class="card my-4 p-2">
                            <div class="card-body" id="feature-content">
                                <h2 class="text-center card-title">Gift Features </h2>
                                <div class="d-flex justify-content-end gap-2 mb-4">
                                    <a type="button" id="addFeature" class="btn btn-primary ">Add Another
                                        image</a>
                                </div>
                                <div class="">
                                    <h4 class="">Feature <strong class="feature-no">1</strong>
                                    </h4>

                                    <div class="input--group">
                                        <label for="feature_title">Feature Title</label>
                                        <input id="feature_title" name="feature_title[]" type="text"
                                            placeholder="Feature Title..">
                                        @error('feature_title')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input--group">
                                        <label for="feature_sub_title">Feature Sub Title</label>
                                        <input id="feature_sub_title" name="feature_sub_title[]" type="text"
                                            placeholder="Feature Sub Title..">
                                        @error('feature_sub_title')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row mt-4" id="imageUploadContainerPlan">
                                        <div class="col">
                                            {{-- <label for="image">Gallery Image:</label> --}}
                                            <input type="file"
                                                class="form-control form-control-lg mt-2 border-left-0 dropify"
                                                name="feature_image[]" data-show-remove="true" accept="image/*"
                                                value="{{ old('feature_image', '') }}" data-default-file="">
                                            @error('feature_image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- gift feature section  --}}
                        {{-- <div class="card my-4 p-2 ">
                            <div class="card-body" id="feature-content">
                                <h2 class="text-center card-title">Gift Features </h2>
                                <div class="d-flex justify-content-end gap-2 mb-4">
                                    <a type="button" id="addFeature" class="btn btn-primary">Add Another
                                        Feature</a>
                                </div>
                                <div class="feature-item">
                                    <h4 class="">Feature <strong class="feature-no">1</strong></h4>

                                    <div class="input--group">
                                        <label for="name">Feature Title</label>
                                        <input id="name" name="name[]" type="text" value="{{ old('name') }}"
                                            placeholder="Feature Title..">
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input--group">
                                        <label for="name">Feature Sub Title</label>
                                        <input id="name" name="name[]" type="text" value="{{ old('name') }}"
                                            placeholder="Feature Sub Title..">
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row input--group" id="imageUploadContainerPlan">
                                        <div class="col">
                                            <input type="file"
                                            class="form-control form-control-lg mt-2 border-left-0 dropify" name="image[]"
                                            id="image" data-show-remove="true" accept="image/*"
                                            value="{{ old('image', '') }}" data-default-file="">
                                            @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>Image is Required and size should not exceed 4MB.</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}



                        <div class="d-flex justify-content-center mb-5">
                            <button type="submit ">Create Gift</button>
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
        $('#imageUploadContainer').on('click', '.remove-image', function() {
            $(this).parent().remove();
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
        $('#imageUploadContainer').on('click', '.remove-image', function() {
            $(this).parent().remove();
        });



        //feature section

        document.addEventListener('DOMContentLoaded', function() {
            let featureCount = 1;

            document.getElementById('addFeature').addEventListener('click', function() {
                featureCount++;
                const featureContent = document.getElementById('feature-content');

                const newFeature = document.createElement('div');
                newFeature.classList.add('feature-item');
                newFeature.innerHTML = `
                    <hr class="mt-4 ">
                <h4 class="mt-4">Feature <strong class="feature-no">${featureCount}</strong></h4>

                <div class="input--group">
                    <label for="feature_title">Feature Title</label>
                    <input id="feature_title" name="feature_title[]" type="text" value="" placeholder="Feature Title..">
                </div>
                <div class="input--group">
                    <label for="feature_sub_title">Feature Sub Title</label>
                    <input id="feature_sub_title" name="feature_sub_title[]" type="text" value="" placeholder="Feature Sub Title..">
                </div>

                <div class="form-group row mt-4" id="imageUploadContainerPlan">
                    <div class="col">
                        {{-- <label for="image">Gallery Image:</label> --}}
                <input type="file"
                    class="form-control form-control-lg mt-2 border-left-0 dropify"
                    name="feature_image[]" id="feature_image${featureCount}" data-show-remove="true" accept="image/*"
                            data-default-file="">
                    </div>
                </div>
            `;

                featureContent.appendChild(newFeature);

                // Re-initialize dropify for the new input
                $('.dropify').dropify();
            });
        });
    </script>
@endpush
