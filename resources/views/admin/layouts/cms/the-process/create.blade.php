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
                                    <label for="title_en" class="form-label required">Title(En)</label>
                                    <input type="text" class="form-control" id="title_en" value="{{old('title_en')}}" name="title_en">
                                    @error('title_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title_de" class="form-label required">Title(De)</label>
                                    <input type="text" class="form-control" id="title_de" value="{{old('title_de')}}" name="title_de">
                                    @error('title_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title_hu" class="form-label required">Title(Hu)</label>
                                    <input type="text" class="form-control" id="title_hu" value="{{old('title_hu')}}" name="title_hu">
                                    @error('title_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description_en" class="form-label required">Description(En)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description" name="description_en" placeholder="Write here....">{{old('description_en')}}</textarea>
                                    @error('description_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description_de" class="form-label required">Description(De)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description" name="description_de" placeholder="Write here....">{{old('description_de')}}</textarea>
                                    @error('description_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description_hu" class="form-label required">Description(Hu)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description_hu" name="description_hu" placeholder="Write here....">{{old('description_hu')}}</textarea>
                                    @error('description_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex flex-column">
                                        <label for="thumbnail_type" class="form-label required">Select Thumbnail Type</label>
                                        <select class="form-select form-select-lg mb-3" id="thumbnail_type" name="thumbnail_type">
                                            <option @if(old('thumbnail_type') == 'image') selected @endif  value="image">Image</option>
                                            <option @if(old('thumbnail_type') == 'video') selected @endif value="video">Youtube Video Url</option>
                                        </select>
                                        @error('thumbnail_type')
                                        <span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="image_type"  class="mt-3">
                                    <label for="image"  class="form-label required">Image</label>
                                    <input type="file" class="form-control dropify" id="image" name="image" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                    @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="video_url">
                                    <div class="mt-3">
                                        <label for="video_url_en" class="form-label required">Youtube Video Url(En)</label>
                                        <input type="text" class="form-control" id="video_url_en" value="{{old('video_url_en')}}" name="video_url_en">
                                        @error('video_url_en')
                                        <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="video_url_de" class="form-label required">Youtube Video Url(De)</label>
                                        <input type="text" class="form-control" id="video_url_de" value="{{old('video_url_de')}}" name="video_url_de">
                                        @error('video_url_de')
                                        <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="video_url_hu" class="form-label required">Youtube Video Url(Hu)</label>
                                        <input type="text" class="form-control" id="video_url_hu" value="{{old('video_url_hu')}}" name="video_url_hu">
                                        @error('video_url_hu')
                                        <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
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
                                    <label for="icon_top_text_en" class="form-label">Icon Top Text(En)</label>
                                    <input type="text" class="form-control" id="icon_top_text_en" value="{{old('icon_top_text_en')}}" name="icon_top_text_en">
                                    @error('icon_top_text_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_top_text_de" class="form-label">Icon Top Text(De)</label>
                                    <input type="text" class="form-control" id="icon_top_text_de" value="{{old('icon_top_text_de')}}" name="icon_top_text_de">
                                    @error('icon_top_text_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_top_text_hu" class="form-label">Icon Top Text(Hu)</label>
                                    <input type="text" class="form-control" id="icon_top_text_hu" value="{{old('icon_top_text_hu')}}" name="icon_top_text_hu">
                                    @error('icon_top_text_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_bottom_text_en" class="form-label">Icon Bottom Text(En)</label>
                                    <input type="text" class="form-control" id="icon_bottom_text_en" value="{{old('icon_bottom_text_en')}}" name="icon_bottom_text_en">
                                    @error('icon_bottom_text_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_bottom_text_de" class="form-label">Icon Bottom Text(De)</label>
                                    <input type="text" class="form-control" id="icon_bottom_text_de" value="{{old('icon_bottom_text_de')}}" name="icon_bottom_text_de">
                                    @error('icon_bottom_text_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon_bottom_text_hu" class="form-label">Icon Bottom Text(Hu)</label>
                                    <input type="text" class="form-control" id="icon_bottom_text_hu" value="{{old('icon_bottom_text_hu')}}" name="icon_bottom_text_hu">
                                    @error('icon_bottom_text_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="icon"  class="form-label required">Icon</label>
                                    <input type="file" class="form-control dropify" id="icon" name="icon" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                    @error('icon')
                                    <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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

        const thumbnail_type = $("#thumbnail_type");
        if (thumbnail_type.val() === 'video'){
            $("#image_type").hide()
            $("#video_url").show()
        }else {
            $("#image_type").show()
            $("#video_url").hide()
        }

        thumbnail_type.on('change',function (){
             if ($(this).val() === 'video'){
                 $("#image_type").hide()
                 $("#video_url").show()
             }else {
                 $("#image_type").show()
                 $("#video_url").hide()
             }
        });
    </script>
@endpush
