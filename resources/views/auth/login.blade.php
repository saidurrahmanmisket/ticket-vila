<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

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
    <main class="auth--main--area--wrapper">
        <div class="banner--area">
            <img src="{{ asset('frontend/images/login-banner.png') }}" alt="">
        </div>
        <div class="input--area">
            <div class="top--area">
                <h3 class="main--text">Login</h3>
                <p class="sub--text">
                    Welcome Back, Please Enter your Details to Log In.
                </p>
            </div>

            <div class="middle--area">
                <form method="POST" action="{{ route('login') }}" class="form--area">
                    @csrf
                    <div class="input--holder">
                        <div class="single--input">
                            <label for="email">Email Address</label>
                            <input type="email" class=" @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="email" placeholder="ticketvilla@gmail.com"
                                required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="single--input pass">
                            <label for="password">Password</label>
                            <input type="password" class=" @error('password') is-invalid @enderror" name="password"
                                id="password" placeholder="******************" required />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- show pass -->
                            <div class="show--pass">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18"
                                        viewBox="0 0 21 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.30327 12.2526C8.92774 12.6759 9.68882 12.9319 10.4987 12.9319C12.6453 12.9319 14.3919 11.1696 14.3919 9.00369C14.3919 8.18655 14.1382 7.41863 13.7186 6.78855L12.6551 7.86166C12.8307 8.1964 12.9283 8.5902 12.9283 9.00369C12.9283 10.3525 11.8354 11.4551 10.4987 11.4551C10.0889 11.4551 9.69858 11.3567 9.36683 11.1795L8.30327 12.2526ZM16.9288 3.54952C18.3436 4.84907 19.5438 6.60149 20.4415 8.70834C20.5195 8.8954 20.5195 9.11199 20.4415 9.2892C18.3534 14.1921 14.6358 17.1259 10.4987 17.1259H10.4889C8.60575 17.1259 6.80063 16.5056 5.21018 15.3735L3.31725 17.2834C3.17089 17.4311 2.9855 17.5 2.80011 17.5C2.61472 17.5 2.41957 17.4311 2.28297 17.2834C2.03903 17.0373 2 16.6435 2.19515 16.358L2.22442 16.3186L16.6556 1.75771C16.6751 1.73802 16.6946 1.71833 16.7044 1.69864L16.7044 1.69863C16.7239 1.67894 16.7434 1.65925 16.7532 1.63957L17.6704 0.714131C17.9631 0.428623 18.4217 0.428623 18.7046 0.714131C18.9974 0.999638 18.9974 1.4722 18.7046 1.75771L16.9288 3.54952ZM6.59836 9.00753C6.59836 9.2635 6.62764 9.51948 6.66667 9.75576L3.05643 13.3984C2.0807 12.2564 1.2318 10.8781 0.558544 9.29304C0.480485 9.11583 0.480485 8.89924 0.558544 8.71218C2.64662 3.80933 6.36419 0.885337 10.4916 0.885337H10.5013C11.8966 0.885337 13.2529 1.22007 14.5018 1.85015L11.2429 5.13841C11.0087 5.09903 10.755 5.0695 10.5013 5.0695C8.34494 5.0695 6.59836 6.83177 6.59836 9.00753Z"
                                            fill="#5A5C5F" />
                                    </svg>
                                </div>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                                        viewBox="0 0 20 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.09756 8C6.09756 10.1333 7.8439 11.8691 10 11.8691C12.1463 11.8691 13.8927 10.1333 13.8927 8C13.8927 5.85697 12.1463 4.12121 10 4.12121C7.8439 4.12121 6.09756 5.85697 6.09756 8ZM15.7366 2.04606C17.4439 3.36485 18.8976 5.29455 19.9415 7.70909C20.0195 7.89333 20.0195 8.10667 19.9415 8.28121C17.8537 13.1103 14.1366 16 10 16H9.99024C5.86341 16 2.14634 13.1103 0.0585366 8.28121C-0.0195122 8.10667 -0.0195122 7.89333 0.0585366 7.70909C2.14634 2.88 5.86341 0 9.99024 0H10C12.0683 0 14.0293 0.717576 15.7366 2.04606ZM10.0012 10.4124C11.3378 10.4124 12.4304 9.32635 12.4304 7.99787C12.4304 6.65968 11.3378 5.57362 10.0012 5.57362C9.8841 5.57362 9.76702 5.58332 9.65971 5.60272C9.62068 6.66938 8.74263 7.52272 7.65971 7.52272H7.61093C7.58166 7.67787 7.56215 7.83302 7.56215 7.99787C7.56215 9.32635 8.65483 10.4124 10.0012 10.4124Z"
                                            fill="#5A5C5F" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bottom--input--holder">
                            <div class="checkbox--wrapper">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} id="remember" />
                                <label for="remember">Remember me</label>
                            </div>

                            <a href="#" class="forgot--pass">Forgot password ?</a>
                        </div>
                    </div>

                    <!-- submit button -->
                    <button class="submit">Log In</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>

                <!-- other logins area -->
                <div class="other--logins--area">
                    <div class="or">
                        <p>Or</p>
                    </div>
                    <button class="google--btn">
                        <img src="{{ asset('frontend/images/google-icon.svg') }}" alt="" />
                        <span>Login with Google</span>
                    </button>
                </div>
            </div>

            <div class="lower--area">
                <p>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
            </div>
        </div>
    </main>

    <!-- ==== All Js Links ==== -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
