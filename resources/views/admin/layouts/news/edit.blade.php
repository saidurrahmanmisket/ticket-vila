@extends('admin.app')
@section('title', 'House file create')
@section('header_title')
    Edit News
@endsection;
@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row mt-5 card">
            <div class="col-md-11 mt_30 mx-auto py-5">
                <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="personal--info profile--info--box">
                        <h3>Title</h3>
                        <div class="input--group ">
                            <label for="title_en">EN</label>
                            <input class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" type="text" value="{{ $news->title_en ?? old('title_en', ' ') }}"
                                   placeholder="dynamic-page title_en...">
                            @error('title_en')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input--group">
                            <label for="title_de">DE</label>
                            <input class="form-control @error('title_de') is-invalid @enderror" id="title_de" name="title_de" type="text" value="{{ $news->title_de ?? old('title_de', ' ') }}"
                                   placeholder="dynamic-page title_de...">
                            @error('title_de')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="title_hu">HU</label>
                            <input class="form-control @error('title_hu') is-invalid @enderror" id="title_hu" name="title_hu" type="text" value="{{ $news->title_hu ?? old('title_hu', ' ') }}"
                                   placeholder="dynamic-page title_hu...">
                            @error('title_hu')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <h3 class="mt-5">Description</h3>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_en">EN</label>
                                <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en" placeholder="Leave your description_en here" id="description_en"
                                          style="height: 300px">{{ $news->description_en ?? old('description_en', ' ') }}</textarea>
                                @error('description_en')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_de">DE</label>
                                <textarea class="form-control @error('description_de') is-invalid @enderror" name="description_de" placeholder="Leave your description_de here" id="description_de"
                                          style="height: 300px">{{ $news->description_de ?? old('description_de', ' ') }}</textarea>
                                @error('description_de')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="description_hu">HU</label>
                                <textarea class="form-control @error('description_hu') is-invalid @enderror" name="description_hu" placeholder="Leave your description_hu here" id="description_hu"
                                          style="height: 300px">{{ $news->description_hu ?? old('description_hu', ' ') }}</textarea>
                                @error('description_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5">
                            <label for="image">Image</label>
                            <input type="file" class="form-control form-control-lg mt-2 border-left-0 dropify @error('image') is-invalid @enderror"
                                   name="image" id="image" data-show-remove="true" accept="image/*"
                                   data-default-file="{{ $news->image ? asset($news->image) : asset('admin/images/placeholder.png') }}">
                            @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit">Create</button>
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
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('description_de');
        CKEDITOR.replace('description_hu');
    </script>
@endpush
