<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @include('frontend.partials.styles')
</head>
<body>
@include('frontend.partials.header')
<!-- main area starts -->
<main>
    @yield('content')
</main>
<!-- main area ends -->
@include('frontend.partials.footer')

<!-- ==== All Js Links ==== -->
@include('frontend.partials.scripts')
</body>
</html>

