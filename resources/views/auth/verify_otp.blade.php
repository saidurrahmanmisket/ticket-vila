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
            <div class="top--area">
                <h3 class="main--text">You Almost there, last Step 🥳</h3>
                <p class="sub--text">Please Verify Your Email Address</p>
            </div>

            <div class="middle--area">
                <form method="POST" class="form--area" action="{{ route('verify.otp.post') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="otp-input-fields">
                        <input name="otp1" type="number"
                            class="otp__digit otp__field__1 {{ $errors->has('otp1') ? 'is-invalid' : '' }}"
                            value="{{ old('otp1') }}" />
                        <input name="otp2" type="number"
                            class="otp__digit otp__field__2 {{ $errors->has('otp2') ? 'is-invalid' : '' }}"
                            value="{{ old('otp2') }}" />
                        <input name="otp3" type="number"
                            class="otp__digit otp__field__3 {{ $errors->has('otp3') ? 'is-invalid' : '' }}"
                            value="{{ old('otp3') }}" />
                        <input name="otp4" type="number"
                            class="otp__digit otp__field__4 {{ $errors->has('otp4') ? 'is-invalid' : '' }}"
                            value="{{ old('otp4') }}" />
                        <input name="otp5" type="number"
                            class="otp__digit otp__field__5 {{ $errors->has('otp5') ? 'is-invalid' : '' }}"
                            value="{{ old('otp5') }}" />
                        <input name="otp6" type="number"
                            class="otp__digit otp__field__6 {{ $errors->has('otp6') ? 'is-invalid' : '' }}"
                            value="{{ old('otp6') }}" />
                    </div>

                    @if ($errors->any())
                        <span class="invalid-feedback" role="alert"
                            style="display: block; width: 100%;
                            text-align: center;
                            margin-top: 16px;">


                            @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong><br>
                            @endforeach

                            {{-- <strong>Please, Enter a valid OTP.</strong> --}}
                        </span>
                    @endif

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

    @include('auth.partials.scripts')
</body>

</html>
