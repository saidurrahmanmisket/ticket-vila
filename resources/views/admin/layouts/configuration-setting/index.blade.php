@extends('admin.app')
@section('title', 'Configuration Settings')
@section('header_title')
    Configuration Settings
@endsection;
@section('content')
    <section class="app--content--main">
    <div class="account--settings--area">
        <!-- information box  -->
        <div class="info--box">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-personal-info-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-personal-info" type="button" role="tab"
                        aria-controls="pills-personal-info" aria-selected="true">
                        Mail Configuration
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security"
                        type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                        Payment Configuration
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel"
                    aria-labelledby="pills-personal-info-tab" tabindex="0">
                    <!-- personal--info  -->
                    <div class="personal--info common--inputs mt_55">

                        <form method="POST" action="{{ route('admin.mailSettingUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_mailer">Server</label>
                                        <input id="mail_mailer" name="mail_mailer" type="text"
                                            value="{{ env('MAIL_MAILER') }}" />
                                        @error('mail_mailer')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_port">Port</label>
                                        <input id="mail_port" name="mail_port" type="text"
                                            value="{{ env('MAIL_PORT') }} " />
                                        @error('mail_port')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_host">Host</label>
                                        <input id="mail_host" name="mail_host" type="text"
                                            value="{{ env('MAIL_HOST') }}" />
                                        @error('mail_host')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_username">Mail User Name</label>
                                        <input id="mail_username" name="mail_username" type="text"
                                            value="{{ env('MAIL_USERNAME') }}" />
                                        @error('mail_username')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_password">Mail Password </label>
                                        <input id="mail_password" name="mail_password" type="text"
                                            value="{{ env('MAIL_PASSWORD') }}" />
                                        @error('mail_password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_encryption">Encryption </label>
                                        <input id="mail_encryption" name="mail_encryption" type="text"
                                            value="{{ env('MAIL_ENCRYPTION') }}" />
                                        @error('mail_encryption')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input--group">
                                        <label for="mail_from_address">Mail From </label>
                                        <input id="mail_from_address" name="mail_from_address" type="text"
                                            value="{{ env('MAIL_FROM_ADDRESS') }}" />
                                        @error('mail_from_address')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="buttons mt_55">
                                    <button type="submit" class="user--common--btn">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab"
                    tabindex="0">
                    <!-- security  -->
                    <div class="security common--inputs mt_50">

                        <form method="POST" action="{{ route('admin.paymentConfigurationUpdate') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input--group">
                                        <label for="STRIPE_PK">Stripe Public Key</label>
                                        <input id="STRIPE_PK" name="STRIPE_PK" type="text"
                                            value="{{ env('STRIPE_PK') }}" />
                                        @error('STRIPE_PK')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="input--group">
                                        <label for="STRIPE_SK">Stripe Secret Key </label>
                                        <input id="STRIPE_SK" name="STRIPE_SK" type="text"
                                            value="{{ env('STRIPE_SK') }}" />
                                        @error('STRIPE_SK')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="buttons mt_55">
                                    <button type="submit" class="user--common--btn">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
