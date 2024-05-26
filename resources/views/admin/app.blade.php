<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="{{asset('admin/images/logo-sm.svg')}}" />
    <title>@yield('title')</title>
    @include('admin.partials.styles')
</head>

<body>
<!---Header Section--->
@include('admin.partials.header')
<main>
    <!-- start sidebar area  -->
    @include('admin.partials.sidebar')
    <!-- end sidebar area  -->
    <!-- start app content area  -->
    <section class="app--content--main">
        @yield('content')
    </section>
    <!-- end app content area  -->
</main>
@include('admin.partials.scripts')
</body>
</html>

