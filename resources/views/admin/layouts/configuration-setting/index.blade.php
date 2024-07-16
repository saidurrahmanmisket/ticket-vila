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
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-google-configuration" data-bs-toggle="pill"
                            data-bs-target="#pills-google"
                            type="button" role="tab" aria-controls="pills-google" aria-selected="false">
                        Google Login Configuration
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-mailchimp-configuration" data-bs-toggle="pill"
                            data-bs-target="#pills-mailchimp"
                            type="button" role="tab" aria-controls="pills-mailchimp" aria-selected="false">
                        Mailchimp Configuration
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
                            <div class="border p-4" style="border-radius: 5px">
                                <h3>Stripe Payment Configuration</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input--group">
                                            <label for="STRIPE_PK">Stripe Public Key</label>
                                            <input id="STRIPE_PK" name="STRIPE_PK" type="text"
                                                   value="{{ env('STRIPE_PK') }}"/>
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
                                                   value="{{ env('STRIPE_SK') }}"/>
                                            @error('STRIPE_SK')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="border p-4 mt-5" style="border-radius: 5px">
                                <h3>Paypal Payment Configuration</h3>
                                <div class="form-check mt-5">
                                    <input class="form-check-input" @if(env('PAYPAL_MODE') === 'sandbox') checked
                                           @endif  type="radio" name="payment_mode"
                                           value="sandbox"
                                           id="sandbox">
                                    <label class="form-check-label h6" for="sandbox">Sandbox</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" @if(env('PAYPAL_MODE') === 'live') checked
                                           @endif  type="radio" name="payment_mode"
                                           id="live" value="live">
                                    <label class="form-check-label h6" for="live">
                                        Live
                                    </label>
                                </div>
                                @error('payment_mode')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="paypal-sandbox">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input--group">
                                                <label for="paypal_sandbox_client_id">Paypal Sandbox Client ID</label>
                                                <input id="paypal_sandbox_client_id" name="paypal_sandbox_client_id"
                                                       type="text"
                                                       value="{{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"/>
                                                @error('paypal_sandbox_client_id')
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
                                                <label for="paypal_sandbox_client_secret">Paypal Sandbox Client
                                                    Secret</label>
                                                <input id="paypal_sandbox_client_secret"
                                                       name="paypal_sandbox_client_secret" type="text"
                                                       value="{{ env('PAYPAL_SANDBOX_CLIENT_SECRET') }}"/>
                                                @error('paypal_sandbox_client_secret')
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="paypal-live">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input--group">
                                                <label for="paypal_live_app_id">Paypal Live App ID</label>
                                                <input id="paypal_live_app_id" name="paypal_live_app_id" type="text"
                                                       value="{{ env('PAYPAL_LIVE_APP_ID') }}"/>
                                                @error('paypal_live_app_id')
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input--group">
                                                <label for="paypal_live_client_id">Paypal Live Client ID</label>
                                                <input id="paypal_live_client_id" name="paypal_live_client_id"
                                                       type="text"
                                                       value="{{ env('PAYPAL_LIVE_CLIENT_ID') }}"/>
                                                @error('paypal_live_client_id')
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
                                                <label for="paypal_live_client_secret">Paypal Live Client Secret</label>
                                                <input id="paypal_live_client_secret" name="paypal_live_client_secret"
                                                       type="text"
                                                       value="{{ env('PAYPAL_LIVE_CLIENT_SECRET') }}"/>
                                                @error('paypal_live_client_secret')
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
                {{-- Google Login Configuration--}}
                <div class="tab-pane fade" id="pills-google" role="tabpanel"
                     aria-labelledby="pills-google-configuration" tabindex="0">
                    <!-- personal--info  -->
                    <div class="personal--info common--inputs mt_55">

                        <form method="POST" action="{{ route('admin.google-login-config') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">

                                <div class="input--group">
                                    <label for="google_client_id">Google Client ID</label>
                                    <input id="google_client_id" name="google_client_id" type="text"
                                           value="{{ env('GOOGLE_CLIENT_ID') }}"/>
                                    @error('google_client_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input--group">
                                    <label for="google_client_secret">Google Client Secret</label>
                                    <input id="google_client_secret" name="google_client_secret" type="text"
                                           value="{{ env('GOOGLE_CLIENT_SECRET') }}"/>
                                    @error('google_client_secret')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input--group">
                                    <label for="google_call_back_url">Google Call Back URL</label>
                                    <input id="google_call_back_url" name="google_call_back_url" type="text"
                                           value="{{ env('GOOGLE_CALL_BACK_URL') }}"/>
                                    @error('google_call_back_url')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="buttons mt_55">
                                    <button type="submit" class="user--common--btn">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Mailchimp configuration --}}
                <div class="tab-pane fade" id="pills-mailchimp" role="tabpanel"
                     aria-labelledby="pills-mailchimp-configuration" tabindex="0">
                    <!-- personal--info  -->
                    <div class="personal--info common--inputs mt_55">

                        <form method="POST" action="{{ route('admin.mailchimp-config') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">

                                <div class="input--group">
                                    <label for="news_latter_api_key">Newsletter API Key</label>
                                    <input id="news_latter_api_key" name="news_latter_api_key" type="text"
                                           value="{{ env('NEWSLETTER_API_KEY') }}"/>
                                    @error('news_latter_api_key')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="input--group">
                                    <label for="news_latter_list_id">News </label>
                                    <input id="news_latter_list_id" name="news_latter_list_id" type="text"
                                           value="{{ env('NEWSLETTER_LIST_ID') }}"/>
                                    @error('news_latter_list_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
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

@push('script')
    <script>
        $('input[name="payment_mode"]').each(function () {
            if ($(this).val() === 'live' && $(this).prop('checked')) {
                $("#paypal-live").show()
                $("#paypal-sandbox").hide()
            } else {
                $("#paypal-live").hide()
                $("#paypal-sandbox").show()
            }
            $(this).on('change', function () {
                if ($(this).val() === 'live' && $(this).prop('checked')) {
                    $("#paypal-live").show()
                    $("#paypal-sandbox").hide()
                } else {
                    $("#paypal-live").hide()
                    $("#paypal-sandbox").show()
                }
            })
        })
    </script>
@endpush
