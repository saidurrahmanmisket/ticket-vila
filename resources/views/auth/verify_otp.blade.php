<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verfiy</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.svg') }}" type="image/x-icon" />

    <!-- ==== All Css Links ==== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/aos.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/magnific-popup.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/nice-select.min.css') }}" />

    <!-- All custom CSS Links -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/helper.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}" />
</head>

<body>
    <main class="auth--main--area--wrapper verify">
        <div class="banner--area">
            <img src="{{ asset('frontend/images/last-step-banner.png') }}" alt="" />
        </div>
        <div class="input--area">
            <div class="top--area">
                <h3 class="main--text">You Almost there, last Step 🥳</h3>
                <p class="sub--text">Please Verify Your Email Address</p>
            </div>

            <div class="middle--area">
                <form method="POST" action="{{ route('verify.otp.post') }}">
                    @csrf

                    <input type="hidden" name="email" value="{{ $email ?? '' }}">

                    <div class="form-group row">
                        <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>

                        <div class="col-md-6">
                            <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror"
                                name="otp" required autofocus>

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-4    ">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Verify') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="lower--area resend--pass">
                <p>
                    Did you not receive the email?
                    <a href="#"> Resend Code</a>
                </p>
            </div>
        </div>
    </main>

    <!-- ==== All Js Links ==== -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
