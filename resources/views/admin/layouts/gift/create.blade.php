@extends('admin.app')
@section('title', 'Gift create')

@section('content')
    <!-- profile area  -->
    <div class="profile--area">
        <div>
            <div class="row mt-5">
                <div class="col-md-6 mt_30 mx-auto">
                    <form method="POST" action="{{ route('admin.gift.store') }}" enctype="multipart/form-data">@csrf
                        <div class="personal--info profile--info--box">
                            <h3>Gift Create</h3>
                            <div class="input--group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="{{old('name')}}" placeholder="Gift name...">
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="image" class="mb-2">Image</label>
                                <input class="form-control form-control-lg" name="image" id="image" type="file">
                                @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
