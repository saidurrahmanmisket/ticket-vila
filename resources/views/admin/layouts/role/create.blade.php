@extends('admin.app')
@section('title', 'Role create')
@section('header_title')
    Role
@endsection;
@section('content')
    <section class="app--content--main">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.role.store') }}" enctype="multipart/form-data">@csrf
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Role Create</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <!-- Input Item -->
                            <div class="col-12 mb-3">
                                <label class="form-label required">Role Name</label>
                                <input class="form-control" name="name" type="text" value="{{ old('name') }}"
                                       placeholder="Admin">
                                @error('name')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="checkAllButton">
                                    <label class="form-check-label" for="checkAllButton">
                                        Permission All
                                    </label>
                                </div>
                            </div>
                            @foreach ($permissionGroup as $group)
                                <div class="col-3 mb-3">
                                    <h5 class="text-capitalize mb-3">{{ $group['group_name'] }}</h5>
                                    @foreach ($group['permissions'] as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input permission-checkbox"
                                                   name="permissions[]"
                                                   type="checkbox"
                                                   {{ in_array($permission->name, old('permissions') ?? []) ? 'checked' : '' }}
                                                   value="{{ $permission->name }}"
                                                   id="per_{{ $permission->id }}">
                                            <label class="form-check-label" for="per_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            @error('permissions')
                            <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection



@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var checkAllButton = document.getElementById('checkAllButton');
            var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            if (document.querySelectorAll('.permission-checkbox').length === document.querySelectorAll(
                '.permission-checkbox:checked').length) {
                checkAllButton.checked = true;
            }

            checkAllButton.addEventListener('change', function () {
                permissionCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = checkAllButton.checked;
                });
            });
        });
    </script>
@endpush
