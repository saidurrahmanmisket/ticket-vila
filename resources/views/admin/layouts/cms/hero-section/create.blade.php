@extends('admin.app')
@section('title', 'CMS create')
@section('header_title')
    CMS
@endsection;

{{-- Push Style --}}
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush;
@section('content')
    <section class="app--content--main statistics">
    <!-- profile area  -->
    <div class="profile--area main-section-margin">
        <form method="POST" action="{{ route('admin.cms-hero.store') }}" enctype="multipart/form-data">@csrf
            <!-- profile  -->
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="personal--info profile--info--box">
                        <h3>Hero Section Create</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="d-flex flex-column">
                                    <label for="page" class="form-label">Select Page</label>
                                    <select class="form-select form-select-lg mb-3" id="page" name="page">
                                        <option selected value="">Select page</option>
                                        @foreach(\App\Enums\Page::map() as $index =>$page)
                                            <option @if(old('page') == $index) selected @endif value="{{$index}}">{{ $page }}</option>
                                        @endforeach
                                    </select>
                                    @error('page')
                                        <span class="invalid-feedback d-block" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title">
                                    @error('title')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" rows="4" id="description" name="description" placeholder="Write here....">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="image"  class="form-label">Image</label>
                                    <input type="file" class="form-control dropify" id="image" name="image" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                    @error('image')
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

{{-- Push Script --}}
@push('script')
    {{-- Dropify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush
