@extends('admin.app')
@section('title', 'Admin User Create')
@section('header_title')
    Admin User
@endsection;
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>
@endpush
@section('content')
    <section class="app--content--main">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.admin-user.store') }}" enctype="multipart/form-data">@csrf
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Admin User Create</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <label for="first_name" class="form-label required">First name</label>
                                    <input type="text" class="form-control" id="first_name"
                                           value="{{old('first_name')}}"
                                           name="first_name">
                                    @error('first_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label for="last_name" class="form-label required">Last name</label>
                                    <input type="text" class="form-control" id="last_name"
                                           value="{{old('last_name')}}"
                                           name="last_name">
                                    @error('last_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label for="email" class="form-label required">Email</label>
                                    <input type="email" class="form-control" id="email"
                                           value="{{old('email')}}"
                                           name="email">
                                    @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label for="password" class="form-label required">Password</label>
                                    <input type="password" class="form-control" id="password"
                                           value="{{old('password')}}"
                                           name="password">
                                    @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label for="confirm_password" class="form-label required">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                           name="password_confirmation">
                                    @error('confirm_password')
                                    <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label for="role_select" class="form-label">Select Role</label>
                                    <select name="selectedRoles[]" class="form-select" id="role_select"
                                            data-placeholder="Select Roles..." multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                    @if(in_array($role->name,old('selectedRoles',[]))) selected
                                                    @endif class="text-uppercase">{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('selectedRoles')
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

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#role_select").select2({
            theme: "bootstrap-5",
            selectionCssClass: "select2--small",
            dropdownCssClass: "select2--small",
        });
    </script>
@endpush


