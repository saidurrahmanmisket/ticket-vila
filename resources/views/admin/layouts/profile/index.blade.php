@extends('admin.app')
@section('title', 'Dashboard')
@section('header_title')
    Profile
@endsection;
@section('content')
    <section class="app--content--main">
    <!-- profile area  -->
    <div class="profile--area">
        <div>
            <!-- profile  -->
            <div class="profile">
                <div class="upload--wrapper">
                    <div class="preview--img">
                        <img
                            id="image-preview"
                            src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('admin/images/user.png')}}"
                            alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                        />
                        @error('avatar')
                              <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                    </div>
                    <label for="upload">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            fill="none"
                        >
                            <path
                                d="M15.75 16.5H2.25C1.9425 16.5 1.6875 16.245 1.6875 15.9375C1.6875 15.63 1.9425 15.375 2.25 15.375H15.75C16.0575 15.375 16.3125 15.63 16.3125 15.9375C16.3125 16.245 16.0575 16.5 15.75 16.5Z"
                                fill="white"
                            ></path>
                            <path
                                d="M14.2649 2.61C12.8099 1.155 11.3849 1.1175 9.89243 2.61L8.98493 3.5175C8.90993 3.5925 8.87993 3.7125 8.90993 3.8175C9.47993 5.805 11.0699 7.395 13.0574 7.965C13.0874 7.9725 13.1174 7.98 13.1474 7.98C13.2299 7.98 13.3049 7.95 13.3649 7.89L14.2649 6.9825C15.0074 6.2475 15.3674 5.535 15.3674 4.815C15.3749 4.0725 15.0149 3.3525 14.2649 2.61Z"
                                fill="white"
                            ></path>
                            <path
                                d="M11.7043 8.6476C11.4868 8.5426 11.2768 8.4376 11.0743 8.3176C10.9093 8.2201 10.7518 8.1151 10.5943 8.0026C10.4668 7.9201 10.3168 7.8001 10.1743 7.6801C10.1593 7.6726 10.1068 7.6276 10.0468 7.5676C9.79932 7.3576 9.52182 7.0876 9.27432 6.7876C9.25182 6.7726 9.21432 6.7201 9.16182 6.6526C9.08682 6.5626 8.95932 6.4126 8.84682 6.2401C8.75682 6.1276 8.65182 5.9626 8.55432 5.7976C8.43432 5.5951 8.32932 5.3926 8.22432 5.1826C8.19277 5.11499 8.16325 5.04807 8.13536 4.98202C8.0486 4.77659 7.7821 4.71731 7.62442 4.875L3.25182 9.2476C3.15432 9.3451 3.06432 9.5326 3.04182 9.6601L2.63682 12.5326C2.56182 13.0426 2.70432 13.5226 3.01932 13.8451C3.28932 14.1076 3.66432 14.2501 4.06932 14.2501C4.15932 14.2501 4.24932 14.2426 4.33932 14.2276L7.21932 13.8226C7.35432 13.8001 7.54182 13.7101 7.63182 13.6126L12 9.24437C12.1588 9.08559 12.0987 8.81377 11.8915 8.72729C11.8304 8.70182 11.7683 8.67532 11.7043 8.6476Z"
                                fill="white"
                            ></path>
                        </svg>
                    </label>
                </div>
                <!-- profile name  -->
                <div class="profile--name">
                    <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                    <p>{{ ucfirst(Auth::user()->role) }}</p>
                </div>
            </div>
            <div class="row mt_70">
                <div class="col-md-6 mt_30">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">@csrf @method('PATCH')
                        <div class="personal--info profile--info--box">
                        <input type="file" class="d-none" name="avatar" id="upload" />
                        <h3>Personal Info <span>(Name, Surname, Email address)</span></h3>
                        <div class="input--group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" name="first_name" type="text" value="{{ Auth::user()->first_name }}">
                            @error('first_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" type="text" value="{{ Auth::user()->last_name }}">
                            @error('last_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit">Update Personal Info</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-6 mt_30">
                    <form action="{{ route('admin.profile.change') }}" method="POST"> @csrf @method('PATCH')
                       <div class="security--info profile--info--box">
                        <h3>Security <span>(Your email address is {{ Auth::user()->email }})</span></h3>
                        <div class="input--group">
                            <label for="current_password">Current password</label>
                            <input id="current_password" name="current_password" type="password" placeholder="6632645fsdg12105">
                            @error('current_password')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="password">New password</label>
                            <input id="password" type="password" name="password" placeholder="Enter your new password">
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="password_confirmation">Confirm password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password">
                            @error('password_confirmation')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <button type="submit">Update Password</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
