@extends('admin.app')
@section('title', 'Dynamic-page create')
@section('header_title')
    Dynamic-page
@endsection;
@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row mt-5">
            <div class="col-md-10 mt_30 mx-auto">
                <form method="POST" action="{{ route('admin.dynamic-page.store') }}" enctype="multipart/form-data">@csrf
                    <div class="personal--info profile--info--box">
                        <h3>Dynamic-page Create</h3>
                        <div class="input--group">
                            <label for="title_en">Title (EN)</label>
                            <input id="title_en" name="title_en" type="text" value="{{ old('title_en') }}"
                                placeholder="dynamic-page title_en...">
                            @error('title_en')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="title_de">Title (DE)</label>
                            <input id="title_de" name="title_de" type="text" value="{{ old('title_de') }}"
                                placeholder="dynamic-page title_de...">
                            @error('title_de')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="title_hu">Title (HU)</label>
                            <input id="title_hu" name="title_hu" type="text" value="{{ old('title_hu') }}"
                                placeholder="dynamic-page title_hu...">
                            @error('title_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="sub_title_en">Sub Title (EN)</label>
                                <textarea class="form-control" name="sub_title_en" placeholder="Leave your sub_title_en here" id="sub_title_en"
                                    style="height: 300px">{{ old('sub_title_en') }}</textarea>
                                @error('sub_title_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="sub_title_de">Sub Title (DE)</label>
                                <textarea class="form-control" name="sub_title_de" placeholder="Leave your sub_title_de here" id="sub_title_de"
                                    style="height: 300px">{{ old('sub_title_de') }}</textarea>
                                @error('sub_title_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="sub_title_hu">Sub Title (HU)</label>
                                <textarea class="form-control" name="sub_title_hu" placeholder="Leave your sub_title_hu here" id="sub_title_hu"
                                    style="height: 300px">{{ old('sub_title_hu') }}</textarea>
                                @error('sub_title_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_en">Description (EN)</label>
                                <textarea class="form-control" name="description_en" placeholder="Leave your description_en here" id="description_en"
                                    style="height: 300px">{{ old('description_en') }}</textarea>
                                @error('description_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_de">Description (DE)</label>
                                <textarea class="form-control" name="description_de" placeholder="Leave your description_de here" id="description_de"
                                    style="height: 300px">{{ old('description_de') }}</textarea>
                                @error('description_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_hu">Description (HU)</label>
                                <textarea class="form-control" name="description_hu" placeholder="Leave your description_hu here" id="description_hu"
                                    style="height: 300px">{{ old('description_hu') }}</textarea>
                                @error('description_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5">
                            <label for="image">Image</label>
                            <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify"
                                name="image" id="image" data-show-remove="true" accept="image/*"
                                data-default-file="{{ asset('admin/images/placeholder.png') }}">
                        </div>
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- ckeditor cdn  --}}
    {{--    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}
    <script>
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('description_de');
        CKEDITOR.replace('description_hu');
        CKEDITOR.replace('sub_title_en');
        CKEDITOR.replace('sub_title_de');
        CKEDITOR.replace('sub_title_hu');
    </script>
@endpush
