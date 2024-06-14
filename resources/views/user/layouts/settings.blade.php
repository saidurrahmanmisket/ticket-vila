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
                        <button class="nav-link {{ isset($tabIsActive)  ? 'active' : '' }}" id="pills-security-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security"
                            aria-selected="false">
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
                                    Personal Info <span>(Name, Surname, Email address)</span>
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input--group">
                                            <label for="fname">First Name</label>
                                            <input id="fname" name="first_name" type="text"
                                                value="{{ Auth::user()->first_name ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input--group">
                                            <label for="zip">Zip</label>
                                            <input name="zip_code" id="zip" type="text"
                                                value="{{ Auth::user()->zip_code ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input--group">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender">
                                                <option value="1" {{ Auth::user()->gender == 1 ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="2" {{ Auth::user()->gender == 2 ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="3" {{ Auth::user()->gender == 3 ? 'selected' : '' }}>
                                                    Others</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input--group">
                                            <label for="lname">Last Name</label>
                                            <input name="last_name" id="lname" type="text"
                                                value="{{ Auth::user()->last_name ?? '' }}" />
                                        </div>
                                        <div class="input--group">
                                            <label for="email">Email Address</label>
                                            <input name="email" id="email" type="email"
                                                value="{{ Auth::user()->email ?? '' }}" />
                                        </div>
                                        <div class="input--group">
                                            <label for="address">Address</label>
                                            <input name="address_1" id="address" type="text"
                                                value="{{ Auth::user()->address_1 ?? '' }}" />
                                        </div>
                                        <div class="input--group">
                                            <label for="city">City</label>
                                            <input name="city" id="city" type="text"
                                                value="{{ Auth::user()->city ?? '' }}" />
                                        </div>
                                        <div class="input--group">
                                            <label for="state">State</label>
                                            <input name="state" id="state" type="text"
                                                value="{{ Auth::user()->state ?? '' }}" />
                                        </div>
                                        <div class="buttons mt_55">
                                            <button type="submit" class="user--common--btn">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
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
                                        <input name="current_password" id="current-password"  type="password" placeholder="***********" />
                                    </div>
                                    <div class="input--group">
                                        <label for="new--password">New password</label>
                                        <input name="password" id="new--password" type="password"
                                            placeholder="Enter your new password" />
                                    </div>
                                    <div class="input--group">
                                        <label for="confirm--password">Confirm password</label>
                                        <input name="password_confirmation" id="confirm--password" type="password" placeholder="Confirm password" />
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
                                        <div class="ticket--single">
                                            <!-- ticket & name  -->
                                            <div class="ticket--and--name">
                                                <!-- ticket box  -->
                                                <div class="ticket--box">
                                                    <img src="{{ asset('user/images/ticket.png') }}" alt="" />
                                                </div>
                                                <div class="details">
                                                    <p>1 X House Ticket</p>
                                                    <p class="text-green">99.00€</p>
                                                    <p>11.052024 - 11:01:25</p>
                                                </div>
                                            </div>
                                            <div class="ticket--actions">
                                                <a href="#" class="action--btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    Download
                                                </a>
                                                <a href="user.html" class="action--btn action--btnv2 mt_20">
                                                    View
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12"
                                                        viewBox="0 0 15 12" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.89063 5.99927C4.89063 7.42149 6.05485 8.57866 7.49225 8.57866C8.92315 8.57866 10.0874 7.42149 10.0874 5.99927C10.0874 4.57058 8.92315 3.41341 7.49225 3.41341C6.05485 3.41341 4.89063 4.57058 4.89063 5.99927ZM11.3192 2.03006C12.4574 2.90925 13.4265 4.19571 14.1224 5.80541C14.1745 5.92824 14.1745 6.07046 14.1224 6.18682C12.7306 9.40622 10.2525 11.3327 7.49479 11.3327H7.48829C4.73707 11.3327 2.25902 9.40622 0.867149 6.18682C0.815117 6.07046 0.815117 5.92824 0.867149 5.80541C2.25902 2.58602 4.73707 0.666016 7.48829 0.666016H7.49479C8.87365 0.666016 10.181 1.1444 11.3192 2.03006ZM7.50102 7.60769C8.39207 7.60769 9.12053 6.88365 9.12053 5.998C9.12053 5.10588 8.39207 4.38184 7.50102 4.38184C7.42297 4.38184 7.34492 4.3883 7.27337 4.40123C7.24736 5.11234 6.66199 5.68123 5.94004 5.68123H5.90752C5.88801 5.78466 5.875 5.8881 5.875 5.998C5.875 6.88365 6.60346 7.60769 7.50102 7.60769Z"
                                                            fill="#04BAFF" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- ticket single -->
                                        <div class="ticket--single">
                                            <!-- ticket & name  -->
                                            <div class="ticket--and--name">
                                                <!-- ticket box  -->
                                                <div class="ticket--box">
                                                    <img src="{{ asset('user/images/ticket.png') }}" alt="" />
                                                </div>
                                                <div class="details">
                                                    <p>1 X House Ticket</p>
                                                    <p class="text-green">99.00€</p>
                                                    <p>11.052024 - 11:01:25</p>
                                                </div>
                                            </div>
                                            <div class="ticket--actions">
                                                <a href="#" class="action--btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    Download
                                                </a>
                                                <a href="user.html" class="action--btn action--btnv2 mt_20">
                                                    View
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12"
                                                        viewBox="0 0 15 12" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.89063 5.99927C4.89063 7.42149 6.05485 8.57866 7.49225 8.57866C8.92315 8.57866 10.0874 7.42149 10.0874 5.99927C10.0874 4.57058 8.92315 3.41341 7.49225 3.41341C6.05485 3.41341 4.89063 4.57058 4.89063 5.99927ZM11.3192 2.03006C12.4574 2.90925 13.4265 4.19571 14.1224 5.80541C14.1745 5.92824 14.1745 6.07046 14.1224 6.18682C12.7306 9.40622 10.2525 11.3327 7.49479 11.3327H7.48829C4.73707 11.3327 2.25902 9.40622 0.867149 6.18682C0.815117 6.07046 0.815117 5.92824 0.867149 5.80541C2.25902 2.58602 4.73707 0.666016 7.48829 0.666016H7.49479C8.87365 0.666016 10.181 1.1444 11.3192 2.03006ZM7.50102 7.60769C8.39207 7.60769 9.12053 6.88365 9.12053 5.998C9.12053 5.10588 8.39207 4.38184 7.50102 4.38184C7.42297 4.38184 7.34492 4.3883 7.27337 4.40123C7.24736 5.11234 6.66199 5.68123 5.94004 5.68123H5.90752C5.88801 5.78466 5.875 5.8881 5.875 5.998C5.875 6.88365 6.60346 7.60769 7.50102 7.60769Z"
                                                            fill="#04BAFF" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- ticket single -->
                                        <div class="ticket--single">
                                            <!-- ticket & name  -->
                                            <div class="ticket--and--name">
                                                <!-- ticket box  -->
                                                <div class="ticket--box">
                                                    <img src="{{ asset('user/images/ticket.png') }}" alt="" />
                                                </div>
                                                <div class="details">
                                                    <p>1 X House Ticket</p>
                                                    <p class="text-green">99.00€</p>
                                                    <p>11.052024 - 11:01:25</p>
                                                </div>
                                            </div>
                                            <div class="ticket--actions">
                                                <a href="#" class="action--btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
                                                            stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    Download
                                                </a>
                                                <a href="user.html" class="action--btn action--btnv2 mt_20">
                                                    View
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12"
                                                        viewBox="0 0 15 12" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.89063 5.99927C4.89063 7.42149 6.05485 8.57866 7.49225 8.57866C8.92315 8.57866 10.0874 7.42149 10.0874 5.99927C10.0874 4.57058 8.92315 3.41341 7.49225 3.41341C6.05485 3.41341 4.89063 4.57058 4.89063 5.99927ZM11.3192 2.03006C12.4574 2.90925 13.4265 4.19571 14.1224 5.80541C14.1745 5.92824 14.1745 6.07046 14.1224 6.18682C12.7306 9.40622 10.2525 11.3327 7.49479 11.3327H7.48829C4.73707 11.3327 2.25902 9.40622 0.867149 6.18682C0.815117 6.07046 0.815117 5.92824 0.867149 5.80541C2.25902 2.58602 4.73707 0.666016 7.48829 0.666016H7.49479C8.87365 0.666016 10.181 1.1444 11.3192 2.03006ZM7.50102 7.60769C8.39207 7.60769 9.12053 6.88365 9.12053 5.998C9.12053 5.10588 8.39207 4.38184 7.50102 4.38184C7.42297 4.38184 7.34492 4.3883 7.27337 4.40123C7.24736 5.11234 6.66199 5.68123 5.94004 5.68123H5.90752C5.88801 5.78466 5.875 5.8881 5.875 5.998C5.875 6.88365 6.60346 7.60769 7.50102 7.60769Z"
                                                            fill="#04BAFF" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
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
