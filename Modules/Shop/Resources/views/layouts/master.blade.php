<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>会员中心</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/util.js')}}"></script>
    <script>
        window.hdjs = {
            base: '/org/hdjs',
            uploader: '{{route('common.upload.make')}}?',
            filesLists: '{{route('common.upload.lists')}}?',
        };
        window.system = {
            upload:{!! json_encode(config_get('upload','','system')) !!},
        }
    </script>
    <script src="{{asset('org/hdjs/require.js')}}"></script>
    <script src="{{asset('org/hdjs/config.js')}}"></script>
    <link rel="stylesheet" href="{{mix('css/shop.css')}}">
    @stack('css')
</head>
<body class="shop">
@include('layouts.message')
@inject('ModuleRepository','App\Repositories\ModuleRepository')
<div class="header bg-light shadow-sm border-primary shadow pb-2 pt-2 fixed-top border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="mr-5 text-primary navbar-brand" href="/"><i class="fa fa-comments"></i> {{module()['title']}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-lg-0">
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="#">应用列表</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link " href="http://doc.hdcms.com">在线手册</a>
                    </li>
                    {{--<li class="nav-item mr-3">--}}
                        {{--<a class="nav-link  text-muted" href="#" tabindex="-1" aria-disabled="true">视频教程</a>--}}
                    {{--</li>--}}
                </ul>
                @auth()
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('member')}}">个人中心</a>
                                <a class="dropdown-item" href="{{route('member.info.index')}}">修改资料</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                            </div>
                        </li>
                    </ul>
                @endauth
                @guest()
                    <div class="form-inline my-2 my-lg-0">
                        <a href="{{route('register')}}" class="btn btn-outline-info my-2 my-sm-0 mr-1">注册</a>
                        <a href="{{route('login')}}" class="btn btn-outline-success my-2 my-sm-0">登录</a>
                    </div>
                @endguest
            </div>
        </nav>
    </div>
</div>
@yield('content')
<script>
    require(['bootstrap'])
</script>
</body>
</html>