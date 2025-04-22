<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    @yield('additional-css')
</head>
<body>
    @include('layouts.layout')
    @include('layouts.nav')
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    @yield('additional-js')
</body>
</html>
