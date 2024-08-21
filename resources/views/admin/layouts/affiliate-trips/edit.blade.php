@extends('admin.app')
@section('title', 'Affiliate Trips & Tricks Edit')
@section('header_title')
    Affiliate Trips & Tricks
@endsection;
@section('content')
    <section class="app--content--main statistics">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.affiliate-trips.update', $affiliateTrip->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Edit Affiliate Trips & Tricks</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <h5 class="mb-2">Title</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="title_en" class="form-label required">En</label>
                                            <input type="text" class="form-control" id="title_en"
                                                   value="{{ old('title_en', $affiliateTrip->title_en) }}"
                                                   name="title_en">
                                            @error('title_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_de" class="form-label required">De</label>
                                            <input type="text" class="form-control" id="title_de"
                                                   value="{{ old('title_de', $affiliateTrip->title_de) }}"
                                                   name="title_de">
                                            @error('title_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="title_hu" class="form-label required">Hu</label>
                                            <input type="text" class="form-control" id="title_hu"
                                                   value="{{ old('title_hu', $affiliateTrip->title_hu) }}"
                                                   name="title_hu">
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
                                            <textarea type="text" class="form-control ck_editor" rows="4"
                                                      id="description_en" name="description_en"
                                                      placeholder="Write here....">{{ old('description_en', $affiliateTrip->description_en) }}</textarea>
                                            @error('description_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="description_de" class="form-label required">De</label>
                                            <textarea type="text" class="form-control ck_editor" rows="4"
                                                      id="description_de" name="description_de"
                                                      placeholder="Write here....">{{ old('description_de', $affiliateTrip->description_de) }}</textarea>
                                            @error('description_de')
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="description_hu" class="form-label required">Hu</label>
                                            <textarea type="text" class="form-control ck_editor" rows="4"
                                                      id="description_hu" name="description_hu"
                                                      placeholder="Write here....">{{ old('description_hu', $affiliateTrip->description_hu) }}</textarea>
                                            @error('description_hu')
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="image" class="form-label required h5">Image</label>
                                    <input type="file" class="form-control dropify" id="image"
                                           data-default-file="{{asset($affiliateTrip->image)}}" name="image"
                                           accept="image/png,image/gif,image/jpeg,image/jpg,image/svg">
                                    @error('image')
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
