@extends('admin.app')
@section('title', 'Ebook-Description create')
@section('header_title')
     Create Ebook-Description
@endsection;
@push('style')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush
@section('content')
    <!-- profile area  -->
                <form method="POST" action="{{ route('admin.cms.ebook-description.store') }}" enctype="multipart/form-data">@csrf
    <div class="app--content--main ">
        <div class="row card">
            <div class="col mx-auto">

                    <div class="personal--info profile--info--box">

                        {{-- gift feature section  --}}
                            <div class="row justify-content-center" id="feature-content">
                                <div class="col">
                                    <div class="">

                                        <div class="card-body">
                                            <div class=" ">
                                                <div class="">

                                                    <div class="form-group row mt-4" id="imageUploadContainerPlan">
                                                        <div class="d-flex mt-4 mb-4">
                                                            <label for="campaign" class="form-label required h4 mt-2 me-5">Select Campaign</label>
                                                            <select class="form-select form-select-lg mb-3 px-5" id="campaign" name="campaign">
                                                                <option selected value="">Select Campaign</option>
                                                                @foreach($campaigns as $campaign)
                                                                    <option @if(old('campaign') == $campaign->id) selected @endif value="{{ $campaign->id }}">{{ $campaign->name_en }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('campaign')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>


                                                        <div class=" mt-4 w-100">
                                                            <label for="description_en">Description (English): <span class="text-danger">*</span></label>
                                                            <textarea row="6" id="description_en" name="description_en" class="form-control ck_editor form-control-lg mt-2 border-left-0 @error('description_en') is-invalid @enderror" rows="4">{{ old('description_en') }}</textarea>
                                                            @error('description_en')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class=" mt-4 w-100">
                                                            <label for="description_de">Description (German): <span class="text-danger">*</span></label>
                                                            <textarea id="description_de" name="description_de" class="form-control ck_editor form-control-lg mt-2 border-left-0 @error('description_de') is-invalid @enderror" rows="4">{{ old('description_de') }}</textarea>
                                                            @error('description_de')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class=" mt-4 w-100">
                                                            <label for="description_hu">Description (Hungarian): <span class="text-danger">*</span></label>
                                                            <textarea id="description_hu" name="description_hu" class="form-control ck_editor form-control-lg mt-2 border-left-0 @error('description_hu') is-invalid @enderror" rows="4">{{ old('description_hu') }}</textarea>
                                                            @error('description_hu')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="submit ">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
                </form>
@endsection
@push('script')
    <script>
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('description_de');
        CKEDITOR.replace('description_hu');
    </script>
@endpush
