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
                        <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
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
                            <h4>
                                Personal Info <span>(Name, Surname, Email address)</span>
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input--group">
                                        <label for="fname">First Name</label>
                                        <input id="fname" type="text" value="Max " />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="zip">Zip</label>
                                        <input id="zip" type="number" value="344497" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="gender">Gender</label>
                                        <select id="gender">
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input--group">
                                        <label for="lname">Last Name</label>
                                        <input id="lname" type="text" value="Musternann" />
                                    </div>
                                    <div class="input--group">
                                        <label for="email">Email Address</label>
                                        <input id="email" type="email" value="mustermann@gmail.com" />
                                    </div>
                                    <div class="input--group">
                                        <label for="address">Address</label>
                                        <input id="address" type="text" value="greaderweg 3" />
                                    </div>
                                    <div class="input--group">
                                        <label for="city">City</label>
                                        <input id="city" type="text" value="Korbach" />
                                    </div>
                                    <div class="input--group">
                                        <label for="state">State</label>
                                        <input id="state" type="text" value="Musterstrabe Berline" />
                                    </div>
                                    <div class="buttons mt_55">
                                        <button type="button" class="user--common--btn">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab"
                        tabindex="0">
                        <!-- security  -->
                        <div class="security common--inputs mt_50">
                            <h3>
                                Security
                                <span>(Your email address is dmataraci@gmail.com)</span>
                            </h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input--group">
                                        <label for="current-password">Current password</label>
                                        <input id="current-password" type="password" placeholder="6632645fsdg12105" />
                                    </div>
                                    <div class="input--group">
                                        <label for="new--password">New password</label>
                                        <input id="new--password" type="password"
                                            placeholder="Enter your new password" />
                                    </div>
                                    <div class="input--group">
                                        <label for="confirm--password">Confirm password</label>
                                        <input id="confirm--password" type="password" placeholder="Confirm password" />
                                    </div>
                                    <div class="buttons mt_55">
                                        <button type="button" class="user--common--btn">
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
                                        <div class="buttons mt_55">
                                            <button class="user--common--btn">
                                                Save Changes
                                            </button>
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
