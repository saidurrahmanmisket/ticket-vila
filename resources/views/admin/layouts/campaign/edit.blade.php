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
                <div class="col-md-6 mb-5">
                    <div class="personal--info profile--info--box">
                        <h3>Campaign edit</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">Name(En)</label>
                                    <input type="text" class="form-control" id="name_en" value="{{$campaign->name_en}}" name="name_en">
                                    @error('name_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name_de" class="form-label">Name(De)</label>
                                    <input type="text" class="form-control" id="name_de" value="{{$campaign->name_de}}" name="name_de">
                                    @error('name_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name_hu" class="form-label">Name(Hu)</label>
                                    <input type="text" class="form-control" id="name" value="{{$campaign->name_hu}}" name="name_hu">
                                    @error('name_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control dropify" id="thumbnail" name="thumbnail" accept="image/png,image/gif,image/jpeg,image/jpg,image/svg" data-default-file="{{asset($campaign->thumbnail)}}">
                                    @error('thumbnail')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" value="{{ $campaign->price }}" name="price">
                                    @error('price')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="limit" class="form-label">Ticket Limit</label>
                                    <input type="number" class="form-control" id="limit" value="{{$campaign->limit}}" name="limit">
                                    @error('limit')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="gift_id" class="form-label">Gift</label>
                                    <select class="form-select form-select-lg mb-3" id="gift_id" name="gift_id">
                                        <option selected value="">Select gift</option>
                                        @foreach($gifts as $gift)
                                            <option @if($campaign->gift_id == $gift->id) selected @endif value="{{ $gift->id }}">{{ $gift->name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('gift_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="unique_text" class="form-label">Unique Text</label>
                                    <input type="text" class="form-control" id="unique_text" value="{{ $campaign->unique_text }}" name="unique_text">
                                    @error('unique_text')
                                    <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div id="ebook_files_list">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" onclick="addNewEbook()" class="btn btn-success btn-sm">Add New</button>
                                    </div>

                                    @foreach($campaign->ebooks as $index => $ebook)
                                        <div class="my-3" id="ebook_{{$ebook->id}}">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <p>{{$ebook->file}}</p>
                                                <span class="text-danger" onclick="ebookDelete({{$ebook->id}})" style="cursor: pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('ebook_files')
                                           <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    @error('ebook_files.*')
                                           <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            {{--                            <div class="col-6 mb-3 d-flex flex-column">--}}
                            {{--                                <label for="campaign_type" class="form-label">Campaign Type</label>--}}
                            {{--                                <select class="form-select form-select-lg mb-3" id="campaign_type" name="campaign_type">--}}
                            {{--                                    <option selected>Select type</option>--}}
                            {{--                                    <option @if(old('campaign_type') == '2') selected @endif value="2">Target end date</option>--}}
                            {{--                                    <option @if(old('campaign_type') == '3') selected @endif value="3">Target limit</option>--}}
                            {{--                                </select>--}}
                            {{--                                @error('campaign_type')--}}
                            {{--                                   <span class="invalid-feedback d-block" role="alert">--}}
                            {{--                                     <strong>{{ $message }}</strong>--}}
                            {{--                                   </span>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-6 mb-3">--}}
                            {{--                                <label for="purchase_limit" class="form-label">Purchase Limit</label>--}}
                            {{--                                <input type="text" class="form-control" id="purchase_limit" value="{{ old('purchase_limit') }}" name="purchase_limit">--}}
                            {{--                                @error('purchase_limit')--}}
                            {{--                                    <span class="invalid-feedback d-block" role="alert">--}}
                            {{--                                      <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-6 mb-3">--}}
                            {{--                                <label for="end_date" class="form-label">Campaign End Date</label>--}}
                            {{--                                <input type="datetime-local" class="form-control" value="{{ old('end_date') }}" id="end_date" name="end_date">--}}
                            {{--                                @error('end_date')--}}
                            {{--                                    <span class="invalid-feedback d-block" role="alert">--}}
                            {{--                                      <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
         </div>
    </section>
@endsection
@push('script')
    <script>
        let i = 0;

        function addNewEbook(){
            i++
            const input_filed = `<div class="mb-3">
                                     <div class="d-flex justify-content-between align-items-center">
                                       <label for="ebook_files_${i}" class="form-label">Ebook File</label>
                                       <span class="text-danger" onClick="remove(${i})" style="cursor: pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                         </span>
                                      </div>
                                     <input type="file" class="form-control" id="ebook_files_${i}" name="ebook_files[]">
                                  </div>`

            $("#ebook_files_list").append(input_filed)
        }

        function remove($id){
            $(`#ebook_files_${$id}`).parent().remove()
        }
    </script>
    @push('script')
        <script>
            function ebookDelete(id) {
                var url = '{{ route('admin.campaign.destroyEbook', ':id') }}';
                $.ajax({
                    type: "POST",
                    url: url.replace(':id', id),
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "_method": "DELETE"
                    },
                    success: function(resp) {
                        if (resp.success === true) {
                            // show toast message
                            toastr.success(resp.message);
                            $("#ebook_"+id).remove()
                        } else if (resp.errors) {
                            toastr.error(resp.errors[0]);
                        } else {
                            toastr.error(resp.message);
                        }
                    }, // success end
                    error: function(error) {
                        toastr.error(error?.responseJSON.message)
                    } // Error
                })
            }
        </script>
    @endpush
@endpush
