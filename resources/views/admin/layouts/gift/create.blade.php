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
            <div class="col mx-auto">

                <form method="POST" action="{{ route('admin.gift.store') }}" enctype="multipart/form-data">@csrf
                    <div class="personal--info profile--info--box">
                        <h3>Gift Create</h3>
                        <div class="card">
                            <div class="card-body">
                                <h5>Gift Name</h5>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input--group">
                                            <label for="name_en">
                                                EN <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                                                name="name_en" type="text" value="{{ old('name_en') }}"
                                                placeholder="Gift name en...">
                                            @error('name_en')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input--group">
                                            <label for="name_de">
                                                DE <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control @error('name_de') is-invalid @enderror" id="name_de"
                                                name="name_de" type="text" value="{{ old('name_de') }}"
                                                placeholder="Gift name de...">
                                            @error('name_de')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input--group">
                                            <label for="name_hu">
                                                HU <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control @error('name_hu') is-invalid @enderror" id="name_hu"
                                                name="name_hu" type="text" value="{{ old('name_hu') }}"
                                                placeholder="Gift name hu...">
                                            @error('name_hu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
                                    <a type="button" id="addImageInputPlan" class="btn btn-primary ">Add Another
                                        image</a>
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

                        {{-- gift feature section  --}}
                        <div class="card my-4 p-2">
                            <div class="card-body" id="feature-content">
                                <h2 class="text-center card-title">Gift Features </h2>
                                <div class="d-flex justify-content-end gap-2 mb-4">
                                    <a type="button" id="addFeature" class="btn btn-primary ">Add Another
                                        image</a>
                                </div>
                                <div class="card mb-4 border border-primary">
                                    <div class="card-body">
                                        <h4 class="">Feature <strong class="feature-no">1</strong>
                                        </h4>

                                        <div class="row">
                                            <h5 class="mt-5">Feature Title</h5>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_title_en">EN<span
                                                            class="text-danger">*</span></label>
                                                    <input id="feature_title_en" name="feature_title_en[]" type="text"
                                                        placeholder="Feature Title..">
                                                    @error('feature_title_en')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_title_de">DE<span
                                                            class="text-danger">*</span></label>
                                                    <input id="feature_title_de" name="feature_title_de[]" type="text"
                                                        placeholder="Feature Title..">
                                                    @error('feature_title_de')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_title_hu">HU <span
                                                            class="text-danger">*</span></label>
                                                    <input id="feature_title_hu" name="feature_title_hu[]" type="text"
                                                        placeholder="Feature Title..">
                                                    @error('feature_title_hu')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5 class="mt-5">Feature Sub Title</h5>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_sub_title_en">EN </label>
                                                    <input id="feature_sub_title_en" name="feature_sub_title_en[]" type="text"
                                                        placeholder="Feature Sub Title..">
                                                    @error('feature_sub_title_en')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_sub_title_de">DE </label>
                                                    <input id="feature_sub_title_de" name="feature_sub_title_de[]" type="text"
                                                        placeholder="Feature Sub Title..">
                                                    @error('feature_sub_title_de')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input--group">
                                                    <label for="feature_sub_title_hu">HU </label>
                                                    <input id="feature_sub_title_hu" name="feature_sub_title_hu[]" type="text"
                                                        placeholder="Feature Sub Title..">
                                                    @error('feature_sub_title_hu')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
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
                        </div>



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
                    <div class="card mb-4 border border-primary">
                        <div class="card-body">
                            <div class="d-flex flex-row-reverse">
                                <input type="hidden" name="featureId[]" value="">
                                <a type="button" data-id=""  class="justify-end btn btn-danger btn-sm remove-feature" >X</a>
                            </div>
                            <h4 class="mt-4">Feature <strong class="feature-no">${featureCount}</strong></h4>
                            <div class="row">
                                <h5 class="mt-5">Feature Title</h5>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                    <label for="feature_title_en">EN <span class="text-danger">*</span></label>
                                    <input id="feature_title_en" name="feature_title_en[]" type="text" value="" placeholder="Feature Title.. (en)">
                                </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                        <label for="feature_title_de">DE <span class="text-danger">*</span></label>
                                        <input id="feature_title_de" name="feature_title_de[]" type="text" value="" placeholder="Feature Title.. (de)">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                        <label for="feature_title_hu">HU<span class="text-danger">*</span></label>
                                        <input id="feature_title_hu" name="feature_title_hu[]" type="text" value="" placeholder="Feature Title.. (hu)">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <h5 class="mt-5">Feature Sub Title</h5>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                        <label for="feature_sub_title_en">EN</label>
                                        <input id="feature_sub_title_en" name="feature_sub_title_en[]" type="text" value="" placeholder="Feature Sub Title.. (en)">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                        <label for="feature_sub_title_de">DE</label>
                                        <input id="feature_sub_title_de" name="feature_sub_title_de[]" type="text" value="" placeholder="Feature Sub Title.. (de)">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input--group">
                                        <label for="feature_sub_title_hu">HU</label>
                                        <input id="feature_sub_title_hu" name="feature_sub_title_hu[]" type="text" value="" placeholder="Feature Sub Title.. (hu)">
                                    </div>
                                </div>
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
                </div>
            </div>
            `;

                featureContent.appendChild(newFeature);

                // Re-initialize dropify for the new input
                $('.dropify').dropify();
            });
        });



        //delete feature item
        $('#feature-content').on('click', '.remove-feature', function() {
            $(this).parent().parent().parent().remove();
        });
    </script>
@endpush
