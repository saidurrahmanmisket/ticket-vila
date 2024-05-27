<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="{{asset('user/images/logo-sm.svg')}}" />
    <title>@yield('title')</title>
    @include('user.partials.styles')
</head>

<body>
<!---Header Section--->
@include('user.partials.header')
<main>
    <!-- start sidebar area  -->
    @include('user.partials.sidebar')
    <!-- end sidebar area  -->
    <!-- start app content area  -->
    <section class="app--content--main">
        @yield('content')
    </section>
    <!-- end app content area  -->
</main>
@include('user.partials.scripts')
</body>
</html>

