<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>站点管理 </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('org/AdminLTE-2.4.5')}}/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{asset('org/AdminLTE-2.4.5')}}/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="sidebar-mini wysihtml5-supported skin-black">
@include('layouts.message')
<div class="wrapper">
    <header class="main-header">
        <a href="/" class="logo">
            <span class="logo-mini"><b>H</b>D</span>
            <span class="logo-lg"><b>HD</b>CMS</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">网站首页</a></li>
                    <li><a href="/">应用列表</a></li>
                    <li><a href="{{route('site.index')}}">站点管理</a></li>
                </ul>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">你有 4 条未读消息</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('org/AdminLTE-2.4.5')}}/dist/img/user2-160x160.jpg"
                                                     class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                向军
                                                <small><i class="fa fa-clock-o"></i> 5 分钟前</small>
                                            </h4>
                                            <p>感谢你分享的技术文档</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">查看全部消息</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">你有 10 条通知</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 系统有新更新
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">查看全部</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{auth()->user()['avatar']}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{auth()->user()['name']}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{auth()->user()['avatar']}}" class="img-circle" alt="User Image">
                                <p>
                                    {{auth()->user()['name']}}
                                    <small>{{auth()->user()['email']}}</small>
                                    <small>{{auth()->user()['mobile']}}</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}">修改密码</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{route('user.edit',[auth()->id(),'action'=>'avatar'])}}">设置头像</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{route('user.edit',[auth()->id(),'action'=>'email'])}}">更改邮箱</a>
                                    </div>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('user.index')}}" class="btn btn-default btn-flat">个人中心</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">系统核心</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bomb"></i> <span>系统管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}">
                                <i class="fa fa-circle-o"></i> 系统配置
                            </a>
                        </li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'avatar'])}}"><i
                                        class="fa fa-circle-o"></i> 系统权限列表</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 角色管理</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 管理员</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 积分配置</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-weixin"></i> <span>微信公众号</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}">
                                <i class="fa fa-circle-o"></i> 普通文本消息
                            </a>
                        </li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'avatar'])}}"><i
                                        class="fa fa-circle-o"></i> 图文消息</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 微信菜单管理</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 系统消息设置</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i> <span>文章系统</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}">
                                <i class="fa fa-circle-o"></i> 模块配置
                            </a>
                        </li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'avatar'])}}"><i
                                        class="fa fa-circle-o"></i> 风格模板</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 文章管理</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 栏目管理</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 内容模型</a></li>
                        <li><a href="{{route('user.edit',[auth()->id(),'action'=>'password'])}}"><i
                                        class="fa fa-circle-o"></i> 幻灯片管理</a></li>
                    </ul>
                </li>
                <li class="header">扩展功能</li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <section class="content {{route_class()}}">
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 5.7.0
        </div>
        <strong>Copyright &copy; 2010-2019 <a href="http://hdcms.com">HDCMS</a>.</strong> All rights
        reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">官网消息</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">HDCMS 5.7发布了</h4>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">帮助文档</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            <a href="http://www.hdcms.com">HDCMS官网</a>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
<script>
    require(['jquery', 'bootstrap', 'adminLte'])
</script>
@stack('js')
</body>
</html>
