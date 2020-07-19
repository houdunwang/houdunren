<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会员中心 - {{ site()['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div class="member-top shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <button type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler d-lg-none"><span class="navbar-toggler-icon"></span></button>
                <div id="collapsibleNavId" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="/" class="nav-link"><i aria-hidden="true" class="fa fa-home"></i>
                                网站首页
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="nav-item dropdown"><a href="#" id="dropdownId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                                class="nav-link dropdown-toggle">{{ user('name') }}</a>
                            <div aria-labelledby="dropdownId" class="dropdown-menu" style="min-width: 0px;">
                                <a href="{{ route('member.base.index') }}" class="dropdown-item mb-2 mt-2">基本信息</a>
                                <a href="{{ route('member.avatar.index') }}" class="dropdown-item mb-2 mt-2">修改头像</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item mb-2">退出登录</a>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="container d-flex flex-column flex-md-row mt-3 mb-3 justify-content-between">
        <div class="menu">
            <div class="icon bg-white shadow-sm border">
                <a href="{{ route('member.avatar.index') }}">
                    <img src="{{ user('icon') }}" style="width: 100%">
                </a>
                <div class="pt-0 p-3">
                    <h6 class="text-muted">{{ user('nickname')}}</h6>
                    <hr>
                    <div class="d-flex justify-content-between text-muted">
                        <i aria-hidden="true" class="fa fa-envelope {{ user('email')?'text-info':'' }}"></i>
                        <i aria-hidden="true" class="fas fa-phone-square {{ user('mobile')?'text-info':'' }}"></i>
                        <i aria-hidden="true" class="fab fa-weibo {{ user('weibo')?'text-info':'' }}"></i>
                        <i aria-hidden="true" class="fab fa-weixin {{ user('wechat')?'text-info':'' }}"></i>
                        <i aria-hidden="true" class="fab fa-github {{ user('github')?'text-info':'' }}"></i>
                        <i aria-hidden="true" class="fab fa-qq {{ user('qq')?'text-info':'' }}"></i>
                    </div>
                </div>
            </div>
            <div class="list mt-2 shadow-sm border">
                <div class="list-group list-group-flush menus">
                    <a class="list-group-item disabled bg-light">资料修改</a>
                    <a href="{{ route('member.base.index') }}"
                        class="list-group-item {{ active_class(if_route('member.base.index')) }}">基本信息</a>
                    <a href="{{ route('member.password.index') }}"
                        class="list-group-item {{ active_class(if_route('member.password.index')) }}">密码修改</a>
                    <a href="{{ route('member.email.index') }}"
                        class="list-group-item {{ active_class(if_route('member.email.index')) }}">邮箱绑定</a>
                    <a href="{{ route('member.mobile.index') }}"
                        class="list-group-item {{ active_class(if_route('member.mobile.index')) }}">手机验证</a>
                    <a href="{{ route('member.avatar.index') }}"
                        class="list-group-item  {{ active_class(if_route('member.avatar.index')) }}">修改头像</a>
                </div>
            </div>
        </div>
        <div class="flex-fill ml-md-3 mt-2 mt-md-0" id="app">
            @include('layouts.message')
            @yield('content')
        </div>
    </div>

    @stack('scripts')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
