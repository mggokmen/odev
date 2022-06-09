<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
</head>

<body>

    @yield('content')

    @yield('script')

</body>

</html>