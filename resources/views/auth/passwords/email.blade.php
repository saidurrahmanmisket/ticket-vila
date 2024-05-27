<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verfiy</title>

    @include('auth.partials.styles')
</head>

<body>


    <main class="auth--main--area--wrapper verify">
        <div class="banner--area">
            <img src="{{ asset('frontend/images/last-step-banner.png') }}" alt="" />
        </div>
        <div class="input--area">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="top--area">
                <h3 class="main--text">You Almost there 🥳</h3>
                <p class="sub--text">Please Enter Your Email Address</p>
            </div>

            <div class="middle--area">
                <form method="POST" action="{{ route('password.email') }}" class="form--area">
                    @csrf
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- submit button -->
                    <button class="submit">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </main>

    @include('auth.partials.scripts')
</body>

</html>
