@extends('admin.app')
@section('title', 'Dynamic Page edit')
@section('header_title')
Dynamic Page
@endsection;
@push('style')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush
@section('content')

    <div class="app--content--main">
        <div class="row mt-5">
            <div class="col-md-10 mt_30 mx-auto">
                <form method="POST" action="{{ route('admin.dynamic-page.update', $dynamicPage->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="personal--info profile--info--box">
                        <h3>Dynamic Page Update</h3>

                        <!-- Title EN -->
                        <div class="input--group">
                            <label for="title_en">Title (EN)</label>
                            <input id="title_en" name="title_en" type="text" value="{{ $dynamicPage->title_en }}" placeholder="Dynamic Page Title (EN)...">
                            @error('title_en')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Title DE -->
                        <div class="input--group">
                            <label for="title_de">Title (DE)</label>
                            <input id="title_de" name="title_de" type="text" value="{{ $dynamicPage->title_de }}" placeholder="Dynamic Page Title (DE)...">
                            @error('title_de')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Title HU -->
                        <div class="input--group">
                            <label for="title_hu">Title (HU)</label>
                            <input id="title_hu" name="title_hu" type="text" value="{{ $dynamicPage->title_hu }}" placeholder="Dynamic Page Title (HU)...">
                            @error('title_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Sub Title EN -->
                        <div class="mt-3 input--group">
                            <label for="sub_title_en">Sub Title (EN)</label>
                            <textarea class="form-control ck_editor" name="sub_title_en"
                                      placeholder="Leave your sub_title_en here" id="sub_title_en"
                                      style="height: 300px">{!! $dynamicPage->sub_title_en !!}</textarea>
                            @error('sub_title_en')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Sub Title DE -->
                        <div class="mt-3 input--group">
                            <label for="sub_title_de">Sub Title (DE)</label>
                            <textarea class="form-control ck_editor" name="sub_title_de"
                                      placeholder="Leave your sub_title_de here" id="sub_title_de"
                                      style="height: 300px">{!! $dynamicPage->sub_title_de !!}</textarea>
                            @error('sub_title_de')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Sub Title HU -->
                        <div class="mt-3 input--group">
                            <label for="sub_title_hu">Sub Title (HU)</label>
                            <textarea class="form-control ck_editor" name="sub_title_hu"
                                      placeholder="Leave your sub_title_hu here" id="sub_title_hu"
                                      style="height: 300px">{!! $dynamicPage->sub_title_hu !!}</textarea>
                            @error('sub_title_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Description EN -->
                        <div class="mt-3 input--group">
                            <label for="description_en">Description (EN)</label>
                            <textarea class="form-control ck_editor" name="description_en"
                                      placeholder="Leave your description_en here" id="description_en"
                                      style="height: 300px">{!! $dynamicPage->description_en !!}</textarea>
                            @error('description_en')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Description DE -->
                        <div class="mt-3 input--group">
                            <label for="description_de">Description (DE)</label>
                            <textarea class="form-control ck_editor" name="description_de"
                                      placeholder="Leave your description_de here" id="description_de"
                                      style="height: 300px">{!! $dynamicPage->description_de !!}</textarea>
                            @error('description_de')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Description HU -->
                        <div class="mt-3 input--group">
                            <label for="description_hu">Description (HU)</label>
                            <textarea class="form-control ck_editor" name="description_hu"
                                      placeholder="Leave your description_hu here" id="description_hu"
                                      style="height: 300px">{!! $dynamicPage->description_hu !!}</textarea>
                            @error('description_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Gift Image -->
                        <div class="mt-5">
                            <label for="image">Image</label>
                            <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify" name="image" id="image" data-show-remove="true" accept="image/*" data-default-file="{{ asset($dynamicPage->image) }}">
                            @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-info mt-4">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('script')

        <script>
            CKEDITOR.replace('description_en');
            CKEDITOR.replace('description_de');
            CKEDITOR.replace('description_hu');
            CKEDITOR.replace('sub_title_en');
            CKEDITOR.replace('sub_title_de');
            CKEDITOR.replace('sub_title_hu');
        </script>
    @endpush

@endsection
