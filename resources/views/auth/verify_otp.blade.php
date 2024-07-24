@php
use App\Models\SystemSetting;

$systemSetting = SystemSetting::first();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verfiy</title>

    @include('auth.partials.styles')
</head>

<body>

@if(Auth::check())
    <!-- logout  -->
    <a href="#" class="logout position-fixed" style="top: 40px; right: 40px"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path
                d="M8.89844 8.06023C9.20844 4.46023 11.0584 2.99023 15.1084 2.99023H15.2384C19.7084 2.99023 21.4984 4.78023 21.4984 9.25023V15.7702C21.4984 20.2402 19.7084 22.0302 15.2384 22.0302H15.1084C11.0884 22.0302 9.23844 20.5802 8.90844 17.0402"
                stroke="#868A9B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.0011 12.5H3.62109" stroke="#868A9B" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M5.85 9.15039L2.5 12.5004L5.85 15.8504" stroke="#868A9B" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{ __('Log Out') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif
    <main class="auth--main--area--wrapper verify">
        <div class="banner--area">
            <img src="{{ asset('frontend/images/updated-verify-banner.png') }}" alt="">
            <div class="text--area">
                <!-- logo  -->
                <a href="{{ route('frontend./') }}">
                    <div class="logo">
                        <img src="{{ isset($systemSetting->logo) ? asset($systemSetting->logo) : asset('frontend/images/logo.svg') }}" alt="" />
                    </div>
                </a>

                <!-- content -->
                <div class="content">
                    <h3 class="heading">{{ $systemSetting->system_name ?? 'TicketVilla' }}</h3>
                    <p class="subtitle">{{ __("The e-Book with a Ticket") }}</p>
                </div>
            </div>
        </div>
        <div class="input--area">
            <div class="top--area">
                <h3 class="main--text">{{ __("You Almost there, last Step") }} 🥳</h3>
                <p class="sub--text">{{ __("Please Verify Your Email Address.") }}</p>
            </div>

            <div class="middle--area">
                <form method="POST" class="form--area" action="{{ route('verify.otp.post') }}">
                    @csrf
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

                    <div class="d-flex justify-content-center mt-3">
                        <span class="info mx-auto d-inline-block">{{ __("OTP will expire in 10 minutes.") }}</span>
                    </div>

                    <!-- submit button -->
                    <button class="submit">{{ __("Submit") }}</button>
                </form>
            </div>

            <div class="lower--area resend--pass">
                {{ __("Did you not receive the email?") }}
                <form class="d-inline" id="resend-otp-form" action="{{route('verify-otp.resend')}}" method="post">@csrf
                    <a href="#" id="resend-otp-submit">{{ __("Resend Code") }}</a>
                </form>
            </div>
        </div>
    </main>

    @include('auth.partials.scripts')
    <script>
        $("#resend-otp-submit").on('click', function () {
            $("#resend-otp-form").submit()
        })
    </script>
</body>

</html>
