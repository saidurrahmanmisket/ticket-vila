@extends('user.app')

@section('title', 'Settings')

@section('header_title')
    Settings
@endsection;

@section('content')

    <!-- start app content area  -->
    <section class="app--content--main user--portal statistics">
        <div class="account--settings--area">
            <h3>Account Settings</h3>
            <!-- information box  -->
            <div class="info--box mt_45">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-personal-info-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-personal-info" type="button" role="tab"
                            aria-controls="pills-personal-info" aria-selected="true">
                            Personal Info
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ isset($tabIsActive) ? 'active' : '' }}" id="pills-security-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab"
                            aria-controls="pills-security" aria-selected="false">
                            Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-billing-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-billing" type="button" role="tab" aria-controls="pills-billing"
                            aria-selected="false">
                            Billing
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel"
                        aria-labelledby="pills-personal-info-tab" tabindex="0">
                        <!-- personal--info  -->
                        <div class="personal--info common--inputs mt_55">

                            <form action="{{ route('user.settings.personal-info.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <!-- profile  -->
                                <div class="">
                                    <div class="profile mb-5" style="width: 220px;">
                                        <div class="upload--wrapper">
                                            <div class="preview--img">
                                                <img id="image-preview"
                                                    src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('admin/images/user.png') }}"
                                                    alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" />
                                                @error('avatar')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <label for="upload">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        d="M15.75 16.5H2.25C1.9425 16.5 1.6875 16.245 1.6875 15.9375C1.6875 15.63 1.9425 15.375 2.25 15.375H15.75C16.0575 15.375 16.3125 15.63 16.3125 15.9375C16.3125 16.245 16.0575 16.5 15.75 16.5Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M14.2649 2.61C12.8099 1.155 11.3849 1.1175 9.89243 2.61L8.98493 3.5175C8.90993 3.5925 8.87993 3.7125 8.90993 3.8175C9.47993 5.805 11.0699 7.395 13.0574 7.965C13.0874 7.9725 13.1174 7.98 13.1474 7.98C13.2299 7.98 13.3049 7.95 13.3649 7.89L14.2649 6.9825C15.0074 6.2475 15.3674 5.535 15.3674 4.815C15.3749 4.0725 15.0149 3.3525 14.2649 2.61Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M11.7043 8.6476C11.4868 8.5426 11.2768 8.4376 11.0743 8.3176C10.9093 8.2201 10.7518 8.1151 10.5943 8.0026C10.4668 7.9201 10.3168 7.8001 10.1743 7.6801C10.1593 7.6726 10.1068 7.6276 10.0468 7.5676C9.79932 7.3576 9.52182 7.0876 9.27432 6.7876C9.25182 6.7726 9.21432 6.7201 9.16182 6.6526C9.08682 6.5626 8.95932 6.4126 8.84682 6.2401C8.75682 6.1276 8.65182 5.9626 8.55432 5.7976C8.43432 5.5951 8.32932 5.3926 8.22432 5.1826C8.19277 5.11499 8.16325 5.04807 8.13536 4.98202C8.0486 4.77659 7.7821 4.71731 7.62442 4.875L3.25182 9.2476C3.15432 9.3451 3.06432 9.5326 3.04182 9.6601L2.63682 12.5326C2.56182 13.0426 2.70432 13.5226 3.01932 13.8451C3.28932 14.1076 3.66432 14.2501 4.06932 14.2501C4.15932 14.2501 4.24932 14.2426 4.33932 14.2276L7.21932 13.8226C7.35432 13.8001 7.54182 13.7101 7.63182 13.6126L12 9.24437C12.1588 9.08559 12.0987 8.81377 11.8915 8.72729C11.8304 8.70182 11.7683 8.67532 11.7043 8.6476Z"
                                                        fill="white"></path>
                                                </svg>
                                            </label>
                                            <input type="file" class="d-none" name="avatar" id="upload" />

                                        </div>
                                        <!-- profile name  -->
                                        <div class="profile--name">
                                            <h1 class="mt-5">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <h4>
                                    Personal Info
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input--group">
                                            <label for="fname">First Name <span class="text-danger">*</span> </label>
                                            <input class="form-control @error('first_name') is-invalid @enderror" id="fname" name="first_name" type="text" value="{{ old('first_name', Auth::user()->first_name ?? '') }}" />
                                            @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input--group">
                                            <label for="lname">Last Name<span class="text-danger">*</span></label>
                                            <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="lname" type="text" value="{{ old('last_name', Auth::user()->last_name ?? '') }}" />
                                            @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input--group">
                                            <label for="email">Email Address<span class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" value="{{ old('email', Auth::user()->email ?? '') }}" />
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input--group">
                                            <label for="address">Address</label>
                                            <input class="form-control @error('address_1') is-invalid @enderror" name="address_1" id="address" type="text" value="{{ old('address_1', Auth::user()->address_1 ?? '') }}" />
                                            @error('address_1')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="city">City</label>
                                                    <input class="form-control @error('city') is-invalid @enderror" name="city" id="city" type="text" value="{{ old('city', Auth::user()->city ?? '') }}" />
                                                    @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="state">State</label>
                                                    <input class="form-control @error('state') is-invalid @enderror" name="state" id="state" type="text" value="{{ old('state', Auth::user()->state ?? '') }}" />
                                                    @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="zip">Zip</label>
                                                    <input class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip" type="text" value="{{ old('zip_code', Auth::user()->zip_code ?? '') }}" />
                                                    @error('zip_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                                        <option value="1" {{ old('gender', Auth::user()->gender) == 1 ? 'selected' : '' }}>Male</option>
                                                        <option value="2" {{ old('gender', Auth::user()->gender) == 2 ? 'selected' : '' }}>Female</option>
                                                        <option value="3" {{ old('gender', Auth::user()->gender) == 3 ? 'selected' : '' }}>Others</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="city_of_birthday">Birth City</label>
                                                    <input class="form-control @error('city_of_birthday') is-invalid @enderror" name="city_of_birthday" id="city_of_birthday" type="text" value="{{ old('city_of_birthday', Auth::user()->city_of_birthday ?? '') }}" />
                                                    @error('city_of_birthday')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="country_of_birthday">Birth Country</label>
                                                    <input class="form-control @error('country_of_birthday') is-invalid @enderror" name="country_of_birthday" id="country_of_birthday" type="text" value="{{ old('country_of_birthday', Auth::user()->country_of_birthday ?? '') }}" />
                                                    @error('country_of_birthday')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="birthday">Birth Date</label>
                                                    <input class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="birthday" type="date" value="{{ old('birthday', Auth::user()->birthday ?? '') }}" />
                                                    @error('birthday')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input--group">
                                                    <label for="phone">Telephone</label>
                                                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" type="text" value="{{ old('phone', Auth::user()->phone ?? '') }}" />
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="buttons mt_55">
                                    <button type="submit" class="user--common--btn">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab"
                        tabindex="0">
                        <form action="{{ route('user.settings.password.update') }}" method="post">
                            @method('patch')
                            @csrf
                            <!-- security  -->
                            <div class="security common--inputs mt_50">
                                <h3>
                                    Security
                                    <span>(Your email address is {{ Auth::user()->email ?? '' }})</span>
                                </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input--group">
                                            <label for="current-password">Current password</label>
                                            <input name="current_password" id="current-password" type="password"
                                                placeholder="***********" />
                                        </div>
                                        <div class="input--group">
                                            <label for="new--password">New password</label>
                                            <input name="password" id="new--password" type="password"
                                                placeholder="Enter your new password" />
                                        </div>
                                        <div class="input--group">
                                            <label for="confirm--password">Confirm password</label>
                                            <input name="password_confirmation" id="confirm--password" type="password"
                                                placeholder="Confirm password" />
                                        </div>
                                        <div class="buttons mt_55">
                                            <button type="submit" class="user--common--btn">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="tab-pane fade" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab"
                        tabindex="0">
                        <!-- billing informations  -->
                        <div class="billing--info mt_50">
                            <h3>Billing Information</h3>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="billing--information">
                                        <!-- ticket single -->
                                        @if (isset($userOrder) && $userOrder)
                                            @foreach ($userOrder as $order)
                                                <!-- ticket single  -->
                                                <div class="ticket--single">
                                                    <!-- ticket & name  -->
                                                    <div class="ticket--and--name">
                                                        <!-- ticket box  -->
                                                        <div class="ticket--box">
                                                            <img src="{{ asset($data['campaign']->thumbnail ?? 'user/images/ticket.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <div class="details">
                                                            <p>{{ $order->quantity ?? '' }}
                                                                {{ $order->discount_quantity ? '+ ' . $order->discount_quantity : '' }}
                                                                X
                                                                {{ $order->campaign->name ?? '' }}</p>
                                                            <p class="text-green">{{ $order->total_price }}€</p>
                                                            <p>{{ $order->created_at }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="ticket--actions">
                                                        <a href="#" class="action--btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
                                                                    stroke="#141414" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
                                                                    stroke="#141414" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end app content area  -->

@endsection
