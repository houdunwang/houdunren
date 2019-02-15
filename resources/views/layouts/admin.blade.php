<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>HDCMS - 免费开源多站点管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    {{--<link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="{{asset('org/hdjs/package/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="admin">
@include('layouts.message')
<div>
    <div class="container-fluid top-menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <i class="fa fa-w fa-cogs"></i> 系统管理
                        </a>
                    </li>
                    <li class="nav-item  pr-1">
                        <a href="?s=site/entry/home&siteid=11" class="nav-link">
                            <i class="fa fa-share"></i> 继续管理公众号 (后盾网)
                        </a>
                    </li>
                    <li class="nav-item  pr-1">
                        <a href="http://doc.hdcms.com" class="nav-link">
                            <i class="fa fa-w fa-file-code-o"></i> 在线文档
                        </a>
                    </li>
                    <li class="nav-item  pr-1">
                        <a href="http://www.hdcms.com" class="nav-link ">
                            <i class="fa fa-w fa-forumbee"></i> 交流讨论
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-group"></i> 后盾网
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">编辑当前帐号资料</a>
                                <a class="dropdown-item" href="#">管理站点</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-w fa-user"></i> admin
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">我的帐号</a>
                                <a class="dropdown-item" href="#">修改密码</a>
                                <a class="dropdown-item" href="#">退出登录</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--导航end-->
    </div>
    <div class="container-fluid pt-5 pb-5">
        <div class="container-fluid admin-setting-menu row">
            <div class="col-md-4 logo"></div>
            <div class="col-md-8 text-right admin-site-menu">
                <a href="{{route('logout')}}" class="tile">
                    <i class="fa fa-sign-out fa-2x"></i>退出
                </a>
                <a href="{{route('setting.index')}}" class="tile">
                    <i class="fa fa-support fa-2x"></i>系统设置
                </a>
                <a href="{{route('site.index')}}" class="tile">
                    <i class="fa fa-sitemap fa-2x"></i>网站管理
                </a>
            </div>
        </div>
        <div class="card bg-light mt-5">
            <div class="card-body {{route_class()}}">
                @yield('content')
            </div>
        </div>
        <div class="text-muted admin-footer">
            <a href="http://www.houdunwang.com">实战培训</a>
            <a href="http://www.hdcms.com">开源框架</a>
            <br/>
            Powered by hdcms v5.7.0 Build: 20171213155315 © 2014-2019 www.hdcms.com
        </div>
    </div>
</div>
@stack('js')
<script>
    require(['bootstrap'])
</script>
</body>
</html>