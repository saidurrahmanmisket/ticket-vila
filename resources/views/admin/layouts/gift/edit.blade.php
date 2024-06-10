@extends('admin.app')
@section('title', 'Gift Edit')
@section('header_title')
    Gift Edit
@endsection;
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />

@endpush
@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row ">
            <div class="col-md-8 mx-auto">

                <form method="POST" action="{{ route('admin.gift.update', $gift) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="personal--info profile--info--box">
                        <h3>Gift Edit</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="input--group">
                                    <label for="name">
                                         Gift Name <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" type="text" value="{{ $gift->name }}"
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
                                        data-default-file="{{ asset($gift->image) }}">
                                </div>
                                <div class="mt-4">
                                    <label for="gift_thum_image">Gift Thumbnail Image</label>
                                    <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                        name="gift_thum_image" id="gift_thum_image" data-show-remove="true" accept="image/*"
                                        value="{{ old('gift_thum_image', '') }}"
                                        data-default-file="{{ asset($gift->thumbnail_image) }}">
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

                                    @foreach ($gift->giftGallary as $insideImageItem)
                                        @if ($insideImageItem->gift_image_type == 'inside')
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <input type="file"
                                                class="form-control form-control-lg mt-2 border-left-0 dropify dropify-disabled"
                                                name="inside_image[]"
                                                data-show-remove="false" accept="image/*"
                                                data-default-file="{{ asset($insideImageItem->image) }}">
                                                <a type="button" data-id="{{ $insideImageItem->id }}" class="btn btn-danger btn-sm remove-image">X</a>

                                            </div>
                                        @endif
                                    @endforeach



                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
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
                                    @foreach ($gift->giftGallary as $outsideImageItem)
                                        @if ($outsideImageItem->gift_image_type == 'outside')
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <input type="file"
                                                    class="form-control form-control-lg mt-2 border-left-0 dropify dropify-disabled"
                                                    data-show-remove="false" accept="image/*" value="{{ old('outside') }}"
                                                    data-default-file="{{ asset($outsideImageItem->image) }}">
                                                <a type="button" data-id="{{ $outsideImageItem->id }}" class="btn btn-danger btn-sm remove-image">X</a>

                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col">
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
                                    @foreach ($gift->giftGallary as $planImageItem)
                                        @if ($planImageItem->gift_image_type == 'plan')
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <input type="file"
                                                    class="form-control form-control-lg mt-2 border-left-0 dropify dropify-disabled"
                                                    data-show-remove="false" accept="image/*"
                                                    data-default-file="{{ asset($planImageItem->image) }}">
                                                <a type="button" data-id="{{ $planImageItem->id }}" class="btn btn-danger btn-sm remove-image">X</a>

                                            </div>
                                        @endif
                                    @endforeach
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
                                    <input name="video_inside" type="url" value="{{ $gift->video_link_inside }}"
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
                                        value="{{ $gift->video_link_outside }}" placeholder="Video Link...">
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

                                @if ($gift->giftFeaturedItem && $gift->giftFeaturedItem != null)
                                    @foreach ($gift->giftFeaturedItem as $key => $featureItem)
                                        <div class="card mb-4 border border-primary">
                                            <div class="card-body">
                                                <div class="d-flex flex-row-reverse">
                                                    <a type="button" data-id="{{ $featureItem->id }}" class="justify-end btn btn-danger btn-sm remove-feature" >X</a>
                                                </div>
                                            <h4 class="">Feature 
                                                <strong class="feature-no">{{ $key + 1 }}</strong>
                                            </h4>

                                            <div class="input--group">
                                                <label for="feature_title">Feature Title <span class="text-danger">*</span></label>
                                                <input id="feature_title" type="text"
                                                    value="{{ $featureItem->title }}" placeholder="Feature Title..">
                                                @error('feature_title')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input--group">
                                                <label for="feature_sub_title">Feature Sub Title</label>
                                                <input id="feature_sub_title" type="text"
                                                    value="{{ $featureItem->sub_title }}"
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
                                                        class="form-control form-control-lg mt-2 border-left-0 dropify dropify-disabled"
                                                        data-show-remove="true" accept="image/*"
                                                        data-default-file="{{ asset($featureItem->image) }}">
                                                    @error('feature_image')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="" id="featureItemSection">
                                        <h4 class="">Feature <strong class="feature-no">1</strong>
                                        </h4>

                                        <div class="input--group">
                                            <label for="feature_title">Feature Title <span class="text-danger">*</span></label>
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
                                @endif

                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-5">
                            <button type="submit ">Update Gift</button>
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
                url:  "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $gift->id }}',
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
                url:  "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $gift->id }}',
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
                url:  "{{ route('admin.deleteGiftGallaryImage') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $gift->id }}',
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
                                                    <a type="button" class="justify-end btn btn-danger btn-sm remove-feature" >X</a>
                                                </div>
                        <h4 class="mt-4">Feature <strong class="feature-no">${featureCount}</strong></h4>

                        <div class="input--group">
                            <label for="feature_title">Feature Title <span class="text-danger">*</span></label>
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
                url:  "{{ route('admin.deleteGifFeatureItem') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    gift_id: '{{ $gift->id }}',
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
