<!-- start header area  -->
<header>
    <div class="row">
        <div class="col-md-6">
            <!-- profile--name  -->
            <div class="header--title">
                <h1>
                    @yield('header_title')
                </h1>
            </div>
        </div>
        <div class="col-md-6">

            <!-- notification--and--profile  -->
            <div class="notification--and--profile">
                <!-- menu toggler  -->
                <div class="hamburger-menu d-none">
                    <span class="line-top"></span>
                    <span class="line-center"></span>
                    <span class="line-bottom"></span>
                </div>
                <div>
                    <select class="form-select select" id="change_locale_user">
                        @foreach(\App\Enums\Lang::map() as $key => $lang)
                            <option @if(locale() == $key) selected @endif value="{{$key}}">{{$lang}}</option>
                        @endforeach

                    </select>
                </div>
                <!-- notifications  -->
                <a href="#" class="notification">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                        fill="none">
                        <path d="M11 6.2041V9.07704" stroke="#CFCFCF" stroke-width="1.29412" stroke-miterlimit="10"
                            stroke-linecap="round" />
                        <path
                            d="M11.0176 2.37305C7.84272 2.37305 5.27174 4.94403 5.27174 8.11893V9.93069C5.27174 10.5174 5.03018 11.3974 4.72821 11.8978L3.63253 13.7268C2.95959 14.857 3.42547 16.1166 4.66782 16.5307C8.79174 17.9025 13.2521 17.9025 17.3761 16.5307C18.5408 16.1425 19.0412 14.7793 18.4114 13.7268L17.3157 11.8978C17.0137 11.3974 16.7721 10.5087 16.7721 9.93069V8.11893C16.7635 4.96128 14.1753 2.37305 11.0176 2.37305Z"
                            stroke="#CFCFCF" stroke-width="1.29412" stroke-miterlimit="10" stroke-linecap="round" />
                        <path
                            d="M13.8748 16.8848C13.8748 18.4636 12.5807 19.7577 11.0018 19.7577C10.2167 19.7577 9.49204 19.4299 8.9744 18.9122C8.45675 18.3946 8.12891 17.6699 8.12891 16.8848"
                            stroke="#CFCFCF" stroke-width="1.29412" stroke-miterlimit="10" />
                    </svg>
                    <!-- status  -->
                    <span class="status"></span>
                </a>
                <!-- profile -->
                <a href="{{ route('user.settings') }}" class="profile">
                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('user/images/profile.png') }}"
                        alt="" />
                    <div>
                        <h4>{{ Auth::user()->first_name }}</h4>
                        <p>{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- end header area  -->

<script>
    window.addEventListener('DOMContentLoaded', function () {
        $("#change_locale_user").on("change", function () {
            let code = $(this).val();
            var url = '{{ route('setLocale', ':code') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':code', code),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (resp) {
                    location.reload();
                }, // success end
                error: function (error) {
                    flasher.error(error?.responseJson?.message);
                } // Error
            })
        })
    }, true);
</script>
