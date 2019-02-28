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
    @stack('css')
</head>
<body class="member">
@include('layouts.message')
<div class="header bg-light shadow-sm border-top border-info">
    <div class="container px-0 border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-se border-0">
            <a class="text-secondary" href="/"> <i class="fa fa-home"></i> 网站首页</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"></li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('member.info.index')}}">修改资料</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container mt-1 mt-sm-3 mb-5">
    <div class="row">
        <div class="col-sm-2 px-0">
            <div class="card shadow-sm d-none d-sm-block">
                <a href="{{route('member.icon.index')}}">
                    <img src="{{auth()->user()['avatar']}}" class="card-img-top">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{auth()->user()['name']}}</h5>
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-envelope {{active_class(auth()->user()['email'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-phone-square" {{active_class(auth()->user()['mobile'],'text-info')}}></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-weibo {{active_class(auth()->user()['weibo'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-wechat {{active_class(auth()->user()['wechat'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-github {{active_class(auth()->user()['github'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-qq {{active_class(auth()->user()['qq'],'text-info')}}"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mt-0 mt-sm-2 shadow-sm border-bottom-0">
                <div class="card-header">
                    资料修改
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action">
                            <a href="{{route('member.info.index')}}" class="d-block">资料修改</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{route('member.change-password.index')}}" class="d-block">修改密码</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{route('member.icon.index')}}" class="d-block">设置头像</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{route('member.mail.index')}}" class="d-block">绑定邮箱</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="" class="d-block">修改手机</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card mt-0">
                <div class="card-header">
                    资料修改
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="">修改密码</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">设置头像</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">绑定邮箱</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">修改手机</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-10 pr-0 mt-1 mt-sm-0 pl-sm-3 d-none pl-0 d-sm-block">
            @yield('content')
        </div>
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
</body>
</html>