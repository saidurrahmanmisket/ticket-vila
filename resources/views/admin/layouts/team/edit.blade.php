@extends('admin.app')
@section('title', 'Team edit')
@section('header_title')
    Team
@endsection;
@section('content')
    <section class="app--content--main">
    <div>
        <div class="row mt-5">
            <div class="col-md-6 mt_30 mx-auto">
                <form method="POST" action="{{ route('admin.team.update', $team->id) }}" enctype="multipart/form-data">@csrf
                    @method('PATCH')
                    <div class="personal--info profile--info--box">
                        <h3>Team Update</h3>
                        <div class="input--group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ $team->name }}"
                                placeholder="Team name...">
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="position">Name</label>
                            <input id="position" name="position" type="text" value="{{ $team->position }}"
                                placeholder="Team position...">
                            @error('position')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="image" class="mb-2">Image</label>
                            <input class="form-control form-control-lg mt-2 border-left-0 dropify "
                            data-default-file="{{ asset($team->image) }}" 
                            accept="image/*"
                            name="image" id="image" type="file">
                            @error('image')
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
    </section>


    @endsection
