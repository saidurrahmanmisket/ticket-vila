@extends('admin.app')
@section('title', 'The Process Edit')
@section('header_title')
    CMS
@endsection;
@section('content')
    <section class="app--content--main statistics">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.cms.the-process.update',$theProcess->id) }}" enctype="multipart/form-data">@csrf @method('PUT')
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>The Process Edit</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label for="button_type" class="form-label required h5">Select Button
                                            Type</label>
                                        <select class="form-select form-select-lg mb-3" id="button_type"
                                                name="button_type">
                                            <option selected value="">Select button type</option>
                                            @foreach(\App\Enums\ButtonType::map() as $index => $button)
                                                <option @if($theProcess->button_type == $index) selected
                                                        @endif value="{{$index}}">{{ $button }}</option>
                                            @endforeach
                                        </select>
                                        @error('button_type')
                                        <span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <h5 class="mb-2">Title</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="title_en" class="form-label required">En</label>
                                            <input type="text" class="form-control" id="title_en"
                                                   value="{{$theProcess->title_en}}" name="title_en">
                                            @error('title_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_de" class="form-label required">De</label>
                                            <input type="text" class="form-control" id="title_de"
                                                   value="{{$theProcess->title_de}}" name="title_de">
                                            @error('title_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_hu" class="form-label required">Hu</label>
                                            <input type="text" class="form-control" id="title_hu"
                                                   value="{{$theProcess->title_hu}}" name="title_hu">
                                            @error('title_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <h5 class="mb-2">Description</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="description_en" class="form-label required">En</label>
                                            <textarea type="text" class="form-control" rows="4" id="description"
                                                      name="description_en"
                                                      placeholder="Write here....">{{$theProcess->description_en}}</textarea>
                                            @error('description_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="description_de" class="form-label required">De</label>
                                            <textarea type="text" class="form-control" rows="4" id="description"
                                                      name="description_de"
                                                      placeholder="Write here....">{{$theProcess->description_de}}</textarea>
                                            @error('description_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="description_hu" class="form-label required">Hu</label>
                                            <textarea type="text" class="form-control" rows="4" id="description_hu"
                                                      name="description_hu"
                                                      placeholder="Write here....">{{$theProcess->description_hu}}</textarea>
                                            @error('description_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <h5 class="mb-2">Icon Top Text</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="icon_top_text_en" class="form-label">En</label>
                                            <input type="text" class="form-control" id="icon_top_text_en"
                                                   value="{{$theProcess->icon_top_text_en}}" name="icon_top_text_en">
                                            @error('icon_top_text_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icon_top_text_de" class="form-label">De</label>
                                            <input type="text" class="form-control" id="icon_top_text_de"
                                                   value="{{$theProcess->icon_top_text_de}}" name="icon_top_text_de">
                                            @error('icon_top_text_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icon_top_text_hu" class="form-label">Hu</label>
                                            <input type="text" class="form-control" id="icon_top_text_hu"
                                                   value="{{$theProcess->icon_top_text_hu}}" name="icon_top_text_hu">
                                            @error('icon_top_text_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <h5 class="mb-2">Icon Bottom Text</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="icon_bottom_text_en" class="form-label">En</label>
                                            <input type="text" class="form-control" id="icon_bottom_text_en"
                                                   value="{{ $theProcess->icon_bottom_text_en }}"
                                                   name="icon_bottom_text_en">
                                            @error('icon_bottom_text_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icon_bottom_text_de" class="form-label">De</label>
                                            <input type="text" class="form-control" id="icon_bottom_text_de"
                                                   value="{{$theProcess->icon_bottom_text_de}}"
                                                   name="icon_bottom_text_de">
                                            @error('icon_bottom_text_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icon_bottom_text_hu" class="form-label">Hu</label>
                                            <input type="text" class="form-control" id="icon_bottom_text_hu"
                                                   value="{{$theProcess->icon_bottom_text_hu}}"
                                                   name="icon_bottom_text_hu">
                                            @error('icon_bottom_text_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <div class="d-flex flex-column">
                                            <label for="thumbnail_type" class="form-label required h5">Select Thumbnail
                                                Type</label>
                                            <select class="form-select form-select-lg mb-3" id="thumbnail_type"
                                                    name="thumbnail_type">
                                                <option @if(!empty($theProcess->image)) selected @endif  value="image">
                                                    Image
                                                </option>
                                                <option @if(!empty($theProcess->video_url_en)) selected
                                                        @endif value="video">Youtube Video Url
                                                </option>
                                            </select>
                                            @error('thumbnail_type')
                                            <span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="image_type" class="mt-4">
                                        <label for="image" class="form-label required h5">Image</label>
                                        <input type="file" class="form-control dropify" id="image" name="image"
                                               accept="image/png,image/gif,image/jpeg,image/jpg,image/svg"
                                               data-default-file="{{asset($theProcess->image)}}">
                                        @error('image')
                                        <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div id="video_url" class="row mt-4">
                                        <h4 class="col-lg-12 mb-2">Youtube Video
                                            Url</h4>
                                        <div class="col-lg-4">
                                            <label for="video_url_en" class="form-label required">En</label>
                                            <input type="text" class="form-control" id="video_url_en"
                                                   value="{{$theProcess->video_url_en}}" name="video_url_en">
                                            @error('video_url_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="video_url_de" class="form-label required">De</label>
                                            <input type="text" class="form-control" id="video_url_de"
                                                   value="{{$theProcess->video_url_de}}" name="video_url_de">
                                            @error('video_url_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="video_url_hu" class="form-label required">Hu</label>
                                            <input type="text" class="form-control" id="video_url_hu"
                                                   value="{{$theProcess->video_url_hu}}" name="video_url_hu">
                                            @error('video_url_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="icon" class="form-label required h5">Icon</label>
                                    <input type="file" class="form-control dropify" id="icon" name="icon"
                                           accept="image/png,image/gif,image/jpeg,image/jpg,image/svg"
                                           data-default-file="{{asset($theProcess->icon)}}">
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
