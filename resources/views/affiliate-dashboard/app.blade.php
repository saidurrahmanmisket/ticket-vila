<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="{{asset('admin/images/logo-sm.svg')}}" />
    <title>@yield('title')</title>
    @include('affiliate-dashboard.partials.styles')
</head>

<body>
<!---Header Section--->
<!-- start header area  -->
@include('affiliate-dashboard.partials.header')
<!-- end header area  -->
<main>
    <!-- start sidebar area  -->
    @include('affiliate-dashboard.partials.sidebar')
    <!-- end sidebar area  -->
    <!-- start app content area  -->
    @yield('content')
    <!-- end app content area  -->
</main>
@include('affiliate-dashboard.partials.scripts')
</body>
</html>

