<!DOCTYPE html>
<html lang="en">
<head>
    {{--前台--}}
    <title>{{config_get('admin.site.webname')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    <link rel="stylesheet" href="/org/front/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/hs.megamenu.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{{asset('org/front')}}/css/front.css">
    <link href="{{asset('org/hdjs/package/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('org/front/css/theme.css')}}">
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
@include('layouts._web_header')
@yield('content')
@include('layouts._web_footer')
@stack('js')
</body>
</html>