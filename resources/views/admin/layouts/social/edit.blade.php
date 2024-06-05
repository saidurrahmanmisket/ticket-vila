@extends('admin.app')
@section('title', 'Social Media edit')
@section('header_title')
    Social Media
@endsection;
@section('content')
    <!-- profile area  -->
    <div class="profile--area">
        <div>
            <div class="row mt-5">
                <div class="col-md-6 mt_30 mx-auto">
                    <form method="POST" action="{{ route('admin.social-media.update',$social->id) }}" enctype="multipart/form-data">@csrf @method('PATCH')
                        <div class="personal--info profile--info--box">
                            <h3>Social Media Update</h3>
                            <div class="input--group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="{{$social->name}}" placeholder="Social Media name...">
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input--group">
                                <label for="link">Link</label>
                                <input id="link" name="link" type="text" value="{{ $social->link }}"
                                    placeholder="Social Media link...">
                                @error('link')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="icon" class="mb-2">Icon</label>
                                <input class="form-control form-control-lg" name="icon" id="icon" type="file">
                                @error('icon')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
