@extends('admin.app')
@section('title', 'Product Create  ')
@section('header_title')
    Product create
@endsection;
@push('style')
    <style>
        #editor-container {
            display: flex;
            flex-direction: column;
            height: 88vh; /* Set the height to the viewport height */
        }

        .ck-editor__editable {
            flex-grow: 1; /* Make the editor grow to fill the remaining space */
            height: 88%; /* Set the height to 100% */
        }
    </style>
@endpush
@section('content')
    <section class="app--content--main statistics">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">@csrf
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Product Create</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="title" class="form-label required">Title</label>
                                            <input type="text" class="form-control" id="title"
                                                   value="{{old('title')}}" name="title">
                                            @error('title')
                                            <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ $message }}</strong>
                                       </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-4">
                                            <label for="icon" class="form-label required h5">Thumbnail</label>
                                            <input type="file" class="form-control dropify" id="thumbnail"
                                                   name="thumbnail"
                                                   accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                            @error('thumbnail')
                                            <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-4">
                                            <label for="ebook" class="form-label required h5">Ebook</label>
                                            <input type="file" class="form-control dropify" id="ebook" name="ebook">
                                            @error('ebook')
                                            <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea type="text" class="form-control ck_editor"
                                              rows="20"
                                              id="description"
                                              name="description"
                                              placeholder="Write here....">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback d-block" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
