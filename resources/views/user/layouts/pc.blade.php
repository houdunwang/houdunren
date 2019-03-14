<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>欢迎来到【{{$user['name']}}】的主页</title>
    @include('layouts.hdjs')
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
                        @if($notifyCount = $user->unreadNotifications->count())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('member.notify.index')}}">
                                    消息
                                    <span class="badge badge-success rounded-pill align-top small"> {{$notifyCount}}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-w fa-user"></i> {{$user['name']}}
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
<div class="container mt-sm-3 mb-5">
    <div class="row">
        <div class="col-12 col-sm-9 p-0">
            <div class="bg-white p-sm-3 p-3 rounded shadow-sm border border-gary shadow-sm">
                @yield('content')
            </div>
        </div>
        <div class="col-sm-3 col-12 p-0 pl-sm-2">
            @include('user.layouts.user',['user'=>$user])
            @include('user.layouts.menu',['user'=>$user])
        </div>
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
</body>
</html>