<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @include('admin.partials.styles')
</head>

<body>
    {{--  ======== Preloader ===========  --}}
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    {{--  ======== Preloader ===========  --}}
    @include('admin.partials.sidebar')
    <main class="main-wrapper">
        @include('admin.partials.header')
        <section class="section">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        @include('admin.partials.footer')
    </main>
    @include('admin.partials.scripts')
</body>

</html>
