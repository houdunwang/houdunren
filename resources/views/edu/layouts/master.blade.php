<!DOCTYPE html>
<html lang="en">
<head>
    {{--前台--}}
    <title>{{config_get('admin.site.webname')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/org/front/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/hs.megamenu.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{{asset('org/front')}}/css/front.css">
    <link href="{{asset('org/hdjs/package/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
@include('edu.layouts._header')
<div class="alert alert-light text-center m-0 small" role="alert">
    感谢大家一如既往对后盾人的支持，当前网站版本为公测版，使用中发现问题请向我们 <a href="mailto:{{config_get('admin.site.email')}}">发送邮件</a> 进行反馈。
    @guest
        老用户请使用 <a href="{{route('password.reset')}}">找回密码</a> 功能更新密码后登录。
    @endguest
    <div class="container">
        {{--<h6 class="text-secondary">--}}
            {{--对不起，我们犯了一个低级错误，将旧会员编号写错了。测试时也碰巧通过了，造成旧帐号的uid异常，我们将在11.6日晚修复。--}}
            {{--<br> 10.10后到期的会员我们从11.6日开始加赠1个月会员--}}
            {{--（即如果你10.10到期，会员延长到12.6。如果你2019.1.1到期会员延长到2019.2.1)。--}}
        {{--</h6>--}}
    </div>
</div>
@yield('content')
@include('edu.layouts._footer')
@stack('js')
</body>
</html>