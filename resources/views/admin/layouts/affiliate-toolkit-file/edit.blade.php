@extends('admin.app')
@section('title', 'Affiliate Toolkit Edit')
@section('header_title')
    Affiliate Toolkit
@endsection;
@section('content')
    <section class="app--content--main statistics">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.affiliate-toolkit.update',$affiliateToolkit->id) }}" enctype="multipart/form-data">@csrf @method('PUT')
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Affiliate Toolkit Edit</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h6 class="mb-2">Title</h6>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="title_en" class="form-label required">En</label>
                                            <input type="text" class="form-control" id="title_en" value="{{old('title_en',$affiliateToolkit->title_en)}}"
                                                   name="title_en">
                                            @error('title_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_de" class="form-label required">De</label>
                                            <input type="text" class="form-control" id="title_de" value="{{old('title_de',$affiliateToolkit->title_de)}}"
                                                   name="title_de">
                                            @error('title_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_hu" class="form-label required">Hu</label>
                                            <input type="text" class="form-control" id="name" value="{{old('title_hu',$affiliateToolkit->title_hu)}}"
                                                   name="title_hu">
                                            @error('title_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="file_type" class="form-label required h6">File Type</label>
                                        <select class="form-select form-select-lg mb-3" id="file_type" name="file_type">
                                            <option selected>Select file type</option>
                                            @foreach(\App\Enums\ToolkitType::map() as $type => $value)
                                                <option @if(old('file_type',$affiliateToolkit->file_type) == $type) selected
                                                        @endif value="{{ $type }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('file_type')
                                        <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="file" class="form-label required h6">File</label>
                                        <input type="file" class="form-control dropify" id="file" data-default-file="{{asset($affiliateToolkit->file)}}" name="file">
                                        @error('file')
                                            <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label required h6">Icon</label>
                                        <input type="file" class="form-control dropify" id="icon" data-default-file="{{asset($affiliateToolkit->icon)}}" name="icon">
                                        @error('icon')
                                            <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

