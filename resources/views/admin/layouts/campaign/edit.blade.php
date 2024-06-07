@extends('admin.app')
@section('title', 'Campaign Edit')
@section('header_title')
    Campaign
@endsection;
@section('content')
    <section class="app--content--main statistics">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
           <form method="POST" action="{{ route('admin.campaign.update',$campaign->id) }}" enctype="multipart/form-data">@csrf @method('PUT')
            <!-- profile  -->
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="personal--info profile--info--box">
                        <h3>Campaign edit</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{$campaign->name}}" name="name">
                                @error('name')
                                   <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3 d-flex flex-column">
                                <label for="campaign_type" class="form-label">Campaign Type</label>
                                <select class="form-select form-select-lg mb-3" id="campaign_type" name="campaign_type">
                                    <option selected>Select type</option>
                                    <option @if($campaign->target_type == '2') selected @endif value="2">Target end date</option>
                                    <option @if($campaign->target_type == '3') selected @endif value="3">Target limit</option>
                                </select>
                                @error('campaign_type')
                                   <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="limit" class="form-label">Ticket Limit</label>
                                <input type="number" class="form-control" value="{{$campaign->limit}}" id="limit" name="limit">
                                @error('limit')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3 d-flex flex-column">
                                <label for="gift_id" class="form-label">Gift</label>
                                <select class="form-select form-select-lg mb-3" id="gift_id" name="gift_id">
                                    <option selected>Select gift</option>
                                    @foreach($gifts as $gift)
                                        <option @if($campaign->gift_id == $gift->id) selected @endif value="{{ $gift->id }}">{{ $gift->name }}</option>
                                    @endforeach
                                </select>
                                @error('gift_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="unique_text" class="form-label">Unique Text</label>
                                <input type="text" class="form-control" id="unique_text" value="{{ $campaign->unique_text }}" name="unique_text">
                                @error('unique_text')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="purchase_limit" class="form-label">Purchase Limit</label>
                                <input type="text" class="form-control" id="purchase_limit" value="{{ $campaign->purchase_limit }}" name="purchase_limit">
                                @error('purchase_limit')
                                <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" value="{{ $campaign->price }}" name="price">
                                @error('price')
                                <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="end_date" class="form-label">Campaign End Date</label>
                                <input type="datetime-local" value="{{ $campaign->end_time ? date('Y-m-d\TH:i',strtotime($campaign->end_time)) : null }}" class="form-control" id="end_date" name="end_date">
                                @error('end_date')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="ebook_file" class="form-label">Ebook File</label>
                                <input type="file" class="form-control" id="ebook_file" name="ebook_file">
                                @error('ebook_file')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
