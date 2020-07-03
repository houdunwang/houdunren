<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'hdcms') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="admin">
        @include('layouts.admin.header')
        @include('layouts.admin.quickmenu')

        <div class="bg-white mt-4 m-3 p-4 shadow-lg rounded {{ route_class() }}" id="app">
            @include('layouts.message')
            @yield('content')
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center text-dark"
            style="text-shadow: 0px 0px 3px #fff;">
            <span>后盾人 人人做后盾</span>
            <span>Powered by hdcms v6 © 2014-2020 www.hdcms.com</span>
        </div>
    </div>

    @stack('js')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
