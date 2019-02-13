<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>HDCMS - 免费开源多站点管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="admin">
@include('layouts.message')
<div>
    <div class="container-fluid top-menu">
        <!--导航-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="?s=system/manage/menu"><i class="fa fa-w fa-cogs"></i> 系统管理</a>
                        </li>
                        <li>
                            <a href="?s=site/entry/home&siteid=11" target="_blank">
                                <i class="fa fa-share"></i> 继续管理公众号 (后盾网)
                            </a>
                        </li>
                        <li>
                            <a href="http://doc.hdcms.com" target="_blank">
                                <i class="fa fa-w fa-file-code-o"></i> 在线文档
                            </a>
                        </li>
                        <li>
                            <a href="http://www.hdcms.com" target="_blank">
                                <i class="fa fa-w fa-forumbee"></i> 交流讨论
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle"
                               data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-group"></i> 后盾网 <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="?s=system/site/edit&siteid=11"><i
                                                class="fa fa-weixin fa-fw"></i>
                                        编辑当前账号资料</a></li>
                                <li><a href="?s=system/site/lists">
                                        <i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button">
                                <i class="fa fa-w fa-user"></i>
                                admin <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="?s=system/user/info">我的帐号</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?s=system/manage/menu">系统选项</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?s=system/entry/quit">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--导航end-->
    </div>
    <div class="container-fluid ">
        <div class="container-fluid admin-setting-menu">
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
        <div class="well clearfix {{route_class()}}">
            @yield('content')
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