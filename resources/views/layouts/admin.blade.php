@inject('repository',App\Repositories\SiteRepository')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>HDCMS - 免费开源多站点管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="{{asset('org/hdjs/package/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/util.js')}}"></script>
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="admin">
@include('layouts.message')
<div class="container-fluid top-menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="{{route('setting.index')}}">--}}
                {{--<i class="fa fa-w fa-cogs"></i> 系统管理--}}
                {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item pr-2">
                    @if ($site = $repository->getAdminCacheSite())
                        <a href="{{route('site.site.show',$site)}}" class="nav-link">
                            <i class="fa fa-share"></i> 继续管理站点 ({{$site['name']}})
                        </a>
                    @endif
                </li>
                @if (isSuperAdmin())
                    <li class="nav-item pr-2">
                        <a href="{{route('system.module.index')}}" class="nav-link">
                            <i class="fa fa-cubes"></i> 模块管理
                        </a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{route('system.user.index')}}" class="nav-link">
                            <i class="fa fa-user"></i> 用户管理
                        </a>
                    </li>
                    <li class="nav-item pr-2 d-block d-sm-none">
                        <a href="{{route('system.setting.index')}}" class="nav-link">
                            <i class="fa fa-support"></i> 系统设置
                        </a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{route('system.update-cache')}}" class="nav-link">
                            <i class="fa fa-refresh"></i> 更新缓存
                        </a>
                    </li>
                @endif
                <li class="nav-item pr-2">
                    <a href="http://doc.hdcms.com" class="nav-link">
                        <i class="fa fa-w fa-file-code-o"></i> 在线文档
                    </a>
                </li>
                <li class="nav-item pr-2">
                    <a href="http://www.hdcms.com" class="nav-link ">
                        <i class="fa fa-w fa-forumbee"></i> 交流讨论
                    </a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav">
                    {{--@if ($site = $repository->getAdminCacheSite())--}}
                    {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"--}}
                    {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--<i class="fa fa-group"></i> {{$site['name']}}--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                    {{--<a class="dropdown-item" href="{{route('site.edit',$site)}}">编辑当前站点资料</a>--}}

                    {{--<a class="dropdown-item" href="{{route('site.permission',[$site,auth()->user()])}}">--}}
                    {{--设置操作员权限--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--@endif--}}
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('system.user.edit',auth()->user())}}">修改资料</a>
                            <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<div class="container-fluid admin-setting-menu  pt-5 d-none d-md-block d-lg-block">
    <div class="row">
        <div class="col-md-4 logo">
            <div style="background-image: url('{!! config_get('base.logo','','system') !!}')">&nbsp;</div>
        </div>
        <div class="col-md-8 text-right admin-site-menu">
            <a href="{{route('logout')}}" class="tile">
                <i class="fa fa-sign-out fa-2x"></i>退出
            </a>
            @if (isSuperAdmin())
                <a href="{{route('system.setting.index')}}" class="tile">
                    <i class="fa fa-support fa-2x"></i>系统设置
                </a>
            @endif
            <a href="{{route('site.site.index')}}" class="tile">
                <i class="fa fa-sitemap fa-2x"></i>网站管理
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card bg-light mt-sm-5 mt-0">
        <div class="card-body {{route_class()}}">
            @yield('content')
        </div>
    </div>
</div>
<div class="text-light admin-footer pb-5 mt-5 small text-center">
    <div class="mb-1">
        <a href="http://www.houdunwang.com" class="mr-2">实战培训</a>
        <a href="http://www.hdcms.com" class="mr-2">开源框架</a>
        <a href="http://www.houdunren.com">在线学习</a>
    </div>
    <span class="small">
        Powered by hdcms v5.7.0 © 2014-2019 www.hdcms.com
    </span>
</div>
@stack('js')
<script>
    require(['bootstrap'])
</script>
</body>
</html>