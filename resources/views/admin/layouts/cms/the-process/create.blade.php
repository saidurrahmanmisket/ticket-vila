@extends('admin.app')
@section('title', 'The Process Create  ')
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
        <form method="POST" action="{{ route('admin.cms.the-process.store') }}" enctype="multipart/form-data">@csrf
            <!-- profile  -->
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="personal--info profile--info--box">
                        <h3>The Process Create</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label for="title" class="form-label required">Title</label>
                                    <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title">
                                    @error('title')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea type="text" class="form-control" rows="4" id="description" name="description" placeholder="Write here....">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div>
                                     <div class="d-flex flex-column">
                                           <label for="button_type" class="form-label required">Select Button Type</label>
                                          <select class="form-select form-select-lg mb-3" id="button_type" name="button_type">
                                              <option selected value="">Select button type</option>
                                               @foreach(\App\Enums\ButtonType::map() as $index => $button)
                                                  <option @if(old('button_type') == $index) selected @endif value="{{$index}}">{{ $button }}</option>
                                               @endforeach
                                        </select>
                                        @error('button_type')
                                           <span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                               </div>
                                <div class="mt-3">
                                    <label for="icon_top_text" class="form-label">Icon Top Text</label>
                                    <input type="text" class="form-control" id="icon_top_text" value="{{old('icon_top_text')}}" name="icon_top_text">
                                    @error('icon_top_text')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_bottom_text" class="form-label">Icon Bottom Text</label>
                                    <input type="text" class="form-control" id="icon_bottom_text" value="{{old('icon_bottom_text')}}" name="icon_bottom_text">
                                    @error('icon_bottom_text')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="image"  class="form-label required">Image</label>
                                <input type="file" class="form-control dropify" id="image" name="image" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="icon"  class="form-label required">Icon</label>
                                <input type="file" class="form-control dropify" id="icon" name="icon" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                @error('icon')
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
