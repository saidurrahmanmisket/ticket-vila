@extends('admin.app')
@section('title', 'Hero Section Edit')
@section('header_title')
    CMS
@endsection;
@section('content')
    <section class="app--content--main statistics">
    <!-- profile area  -->
    <div class="profile--area main-section-margin">
        <form method="POST" action="{{ route('admin.cms.hero.update',$hero_section->id) }}" enctype="multipart/form-data">@csrf @method('PATCH')
            <!-- profile  -->
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="personal--info profile--info--box">
                        <h3>Hero Section Edit</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="d-flex flex-column">
                                    <label for="page" class="form-label required">Select Page</label>
                                    <select class="form-select form-select-lg mb-3" id="page" name="page">
                                        <option selected value="">Select page</option>
                                        @foreach(\App\Enums\Page::map() as $index =>$page)
                                            <option @if($hero_section->page == $index) selected @endif value="{{$index}}">{{ $page }}</option>
                                        @endforeach
                                    </select>
                                    @error('page')
                                    <span class="invalid-feedback d-block" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title_en" class="form-label required">Title(En)</label>
                                    <input type="text" class="form-control" id="title_en" value="{{$hero_section->title_en}}" name="title_en">
                                    @error('title_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title_de" class="form-label required">Title(De)</label>
                                    <input type="text" class="form-control" id="title_de" value="{{$hero_section->title_de}}" name="title_de">
                                    @error('title_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="title_hu" class="form-label required">Title(Hu)</label>
                                    <input type="text" class="form-control" id="title_hu" value="{{$hero_section->title_hu}}" name="title_hu">
                                    @error('title_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="image"  class="form-label">Image</label>
                                    <input type="file" class="form-control dropify" id="image" name="image" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg" data-default-file="{{ asset($hero_section->image) }}">
                                    @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="description_en" class="form-label required">Description(En)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description_en" name="description_en" placeholder="Write here....">{{$hero_section->description_en}}</textarea>
                                    @error('description_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description_de" class="form-label required">Description(De)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description_de" name="description_de" placeholder="Write here....">{{$hero_section->description_de}}</textarea>
                                    @error('description_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="description_hu" class="form-label required">Description(Hu)</label>
                                    <textarea type="text" class="form-control" rows="4" id="description_hu" name="description_hu" placeholder="Write here....">{{$hero_section->description_hu}}</textarea>
                                    @error('description_hu')
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
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush
