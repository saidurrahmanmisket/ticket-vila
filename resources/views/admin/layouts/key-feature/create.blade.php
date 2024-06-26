@extends('admin.app')
@section('title', 'Key-Feature create')
@section('header_title')
     Create Key Feature
@endsection;
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
    <!-- profile area  -->
                <form method="POST" action="{{ route('admin.key-feature.store') }}" enctype="multipart/form-data">@csrf
    <div class="app--content--main card">
        <div class="d-flex justify-content-between">
            <div class="d-flex mt-4">
                <label for="gift_id" class="form-label required h4 mt-2 me-5">Select Gift</label>
                <select class="form-select form-select-lg mb-3 px-5" id="gift_id" name="gift_id">
                    <option selected>Select gift</option>
                    @foreach($gifts as $gift)
                        <option @if(old('gift_id') == $gift->id) selected @endif value="{{ $gift->id }}">{{ $gift->name_en }}</option>
                    @endforeach
                </select>
                    @error('gift_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="">
                <a type="button" id="addFeature" class="btn btn-primary mt-3">Add Another</a>
            </div>
        </div>
        <div class="row ">
            <div class="col mx-auto">

                    <div class="personal--info profile--info--box">

                        {{-- gift feature section  --}}
                            <div class="row" id="feature-content">
                                <div class="col col-md-6 col-lg-4">
                                    <div class="card border border-primary mt-4 p-2">

                                        <div class="card-body">
                                            <div class=" mb-4 ">
                                                <div class="">
                                                    <div class="d-flex justify-content-between">
                                                        <div>

                                                            <h4 class="">Feature <strong class="feature-no">1</strong>
                                                            </h4>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <h5 class="mt-5">Feature Title</h5>
                                                        <div class="col-lg-4">
                                                            <div class="input--group ">
                                                                <label for="title_en">EN<span
                                                                        class="text-danger">*</span></label>
                                                                <input class="@error('title_en') is-invalid @enderror" id="title_en" name="title_en[]" type="text"
                                                                       placeholder="Feature Title..">
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
                                                                <input id="title_de" name="title_de[]" type="text"
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
                                                                <input id="title_hu" name="title_hu[]" type="text"
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
                                                                   name="icon[]" data-show-remove="true" accept="image/*"
                                                                   value="{{ old('icon', '') }}" data-default-file="">
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
                        <div class="d-flex justify-content-center mb-5">
                            <button type="submit ">Create</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
                </form>
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



        //feature section

        document.addEventListener('DOMContentLoaded', function() {
            let featureCount = 1;

            document.getElementById('addFeature').addEventListener('click', function() {
                featureCount++;
                const featureContent = document.getElementById('feature-content');

                const newFeature = document.createElement('div');
                newFeature.classList.add('col', 'col-md-6', 'col-lg-4');
                newFeature.innerHTML = `
                                    <div class="card border border-primary mt-4 p-2">

                                        <div class="card-body">
                                            <div class=" mb-4 ">
                                                <div class="">
                                                    <div class="d-flex justify-content-between">
                                                        <div>

                                                            <h4 class="">Feature <strong class="feature-no">${featureCount}</strong>
                                                            </h4>
                                                        </div>
                                                        <div>
                                                            <a type="button" class="btn btn-danger remove-feature">
                                                                X
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <h5 class="mt-5">Feature Title</h5>
                                                        <div class="col-lg-4">
                                                            <div class="input--group">
                                                                <label for="title_en">EN<span
                                                                        class="text-danger">*</span></label>
                                                                <input id="title_en" name="title_en[]" type="text"
                                                                       placeholder="Feature Title..">
                                                                @error('title_en')
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
                    <input id="title_de" name="title_de[]" type="text"
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
                    <input id="title_hu" name="title_hu[]" type="text"
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
{{-- <label for="image">Gallery Image:</label> --}}
                <input type="file"
                       class="form-control form-control-lg mt-2 border-left-0 dropify"
                       name="icon[]" data-show-remove="true" accept="image/*"
                       value="{{ old('icon', '') }}" data-default-file="">
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
</div>`;

                featureContent.appendChild(newFeature);

                // Re-initialize dropify for the new input
                $('.dropify').dropify();
            });
        });



        //delete feature item
        $('#feature-content').on('click', '.remove-feature', function() {
            $(this).parent().parent().parent().parent().parent().parent().parent().remove();
        });
    </script>
@endpush
