<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{system_config('site.webname')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../favicon.ico">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/org/front/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/hs.megamenu.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/cubeportfolio.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('org/front')}}/css/front.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
@include('edu.layouts.web._header')
@yield('content')
@include('edu.layouts.web._footer')
@stack('js')
</body>
</html>