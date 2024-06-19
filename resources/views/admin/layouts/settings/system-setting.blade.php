@extends('admin.app')

@section('title', 'Settings')
@section('header_title')
    System Settings
@endsection;
@section('content')
    <section class="app--content--main">
        <form method="POST" action="{{ route('admin.settings.system-setting.update') }}" enctype="multipart/form-data">@csrf
            @method('POST')
            <div class="row mt_70">
                <div class="col-md-6 mt_30">
                    <div class="personal--info profile--info--box">
                        <h3>System Info</h3>
                        <div class="input--group">
                            <label for="system_name">System Name <span class="text-danger">*</span></label>
                            <input id="system_name" name="system_name" type="text"
                                value="{{ $system->system_name ?? '' }}">
                            @error('system_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="copy_rights_text">Copy Rights Text <span class="text-danger">*</span></label>
                            <input id="copy_rights_text" name="copy_rights_text" type="text"
                                value="{{ $system->copy_rights_text ?? '' }}">
                            @error('copy_rights_text')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="email">Email Address<span class="text-danger">*</span></label>
                            <input id="email" type="email" name="email" value="{{ $system->email ?? '' }}">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="contact_number">Contact Number <span class="text-danger">*</span></label>
                            <input id="contact_number" type="number" name="contact_number"
                                value="{{ $system->contact_number ?? '' }}">
                            @error('contact_number')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input id="address" type="text" name="address" value="{{ $system->address ?? '' }}">
                            @error('address')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="company_open_hour">Company Open Hour <span class="text-danger">*</span></label>
                            <input id="company_open_hour" type="text" name="company_open_hour"
                                value="{{ $system->company_open_hour ?? '' }}">
                            @error('company_open_hour')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit">Update </button>
                    </div>
                </div>
                <div class="col-md-6 mt_30">
                    <div class="security--info profile--info--box mt-5">
                        <div class="">
                            <label for="logo ">Logo<span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg mt-3 mb-3 dropify" id="logo" name="logo"
                                type="file" value="{{ $system->logo ?? '' }}">
                            @error('logo')
                                <span class="invalid-feedback
                            d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="favicon ">Favicon</label>
                            <input class="form-control  form-control-lg mt-3 mb-3 dropify" id="favicon" type="file"
                                name="favicon" value="{{ $system->favicon ?? '' }}">
                            @error('favicon')
                                <span class="invalid-feedback
                        d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
