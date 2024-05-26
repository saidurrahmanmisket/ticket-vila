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
                <form action="#" class="form--area">
                    <div class="otp-input-fields">
                        <input type="number" class="otp__digit otp__field__1" />
                        <input type="number" class="otp__digit otp__field__2" />
                        <input type="number" class="otp__digit otp__field__3" />
                        <input type="number" class="otp__digit otp__field__4" />
                        <input type="number" class="otp__digit otp__field__5" />
                        <input type="number" class="otp__digit otp__field__6" />
                    </div>

                    <!-- submit button -->
                    <button class="submit">Submit</button>
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
