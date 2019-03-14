<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>会员中心</title>
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="member">
@include('layouts.message')
@inject('ModuleRepository','App\Repositories\ModuleRepository')
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
                        @if($notifyCount = auth()->user()->unreadNotifications->count())
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
                                <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('member.info.index')}}">修改资料</a>
                                <a class="dropdown-item"
                                   href="{{route('user.home',auth()->user())}}">个人中心</a>
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
                <a href="{{route('member.icon.index')}}" class="d-block">
                    <img src="{{auth()->user()['avatar']}}" class="card-img-top">
                </a>
                <div class="card-body">
                    <a class="card-title text-secondary" href="{{route('member.info.index')}}">
                        <h5>{{auth()->user()['name']}}</h5>
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-envelope {{active_class(auth()->user()['email'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.mobile.index')}}">
                            <i class="fa fa-phone-square {{active_class(auth()->user()['mobile'],'text-info')}}"></i>
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
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.info.index')}}">
                            资料修改
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.change-password.index')}}">
                            修改密码
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.icon.index')}}">
                            设置头像
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.mail.index')}}">
                            绑定邮箱
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.mobile.index')}}">
                            修改手机
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.notify.index')}}">
                            站内消息
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.order.index')}}">
                            我的定单
                        </a>
                    </div>
                </div>
            </div>
            @foreach($ModuleRepository->getMenus(site(),'member_pc') as $moduleTitle=>$menus)
                @if (count($menus['menus']))
                    <div class="card mt-2">
                        <div class="card-header">
                            {{$moduleTitle}}
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach($menus['menus'] as $menu)
                                    <a class="list-group-item list-group-item-action text-secondary"
                                       href="{{$menu['url']}}?sid={{\site()['id']}}&mid={{$menus['module']['id']}}">
                                        {{$menu['title']}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
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