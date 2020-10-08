<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

    <title>@yield('title')</title>
</head>

<body>
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>