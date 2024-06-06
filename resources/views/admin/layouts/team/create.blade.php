@extends('admin.app')
@section('title', 'Team create')
@section('header_title')
    Team
@endsection;
@section('content')
    <!-- profile area  -->
    <div class="profile--area">
        <div>
            <div class="row mt-5">
                <div class="col-md-6 mt_30 mx-auto">
                    <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">@csrf
                        <div class="personal--info profile--info--box">
                            <h3>Team Create</h3>
                            <div class="input--group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}"
                                    placeholder="Team name...">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input--group">
                                <label for="position">Position</label>
                                <input id="position" name="position" type="text" value="{{ old('position') }}"
                                    placeholder="Team position...">
                                @error('position')
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
