<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="{{ asset('user/images/logo-sm.svg') }}" />
    <title>@yield('title')</title>
    @include('user.partials.styles')
</head>

<body>
<div id="left"></div>
    <!---Header Section--->
    @include('user.partials.header')
    <main>
        <!-- start sidebar area  -->
        @include('user.partials.sidebar')
        <!-- end sidebar area  -->


        {{-- daynamic content goes here --}}

        @yield('content')

        {{-- daynamic content end  --}}
    </main>
    @include('user.partials.scripts')
</body>

</html>
