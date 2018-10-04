<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <!-- Values are "toggle", "light", and "dark". See "Getting Started" for more information -->
    <!-- Toggle Mode: For demo only, but allows a user to seamlessly toggle between light/dark modes -->

    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme-dark.min.css" rel="" data-toggle="theme" data-theme-mode="dark">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css" rel="" data-toggle="theme" data-theme-mode="light">

    <style>
        body {
            display: none;
        }
    </style>

    <script>
        var themeMode = (localStorage.getItem('dashkitThemeMode')) ? localStorage.getItem('dashkitThemeMode') : 'light';
        var themeFile = document.querySelector('[data-toggle="theme"][data-theme-mode="' + themeMode + '"]');

        // Enable stylesheet
        themeFile.rel = 'stylesheet';

        // Enable body content
        themeFile.addEventListener('load', function () {
            document.body.style.display = 'block';
        });
    </script>
    <title>{{hd_config('site.webname')}}</title>
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
<div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-card card" data-toggle="lists" data-lists-values='["name"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Add a member
                            </h4>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <form>
                        <div class="input-group input-group-flush input-group-merge">
                            <input type="search" class="form-control form-control-prepended search" placeholder="Search122">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fe fe-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Miyah Myles</a>
                                    </h4>
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Ryu Duke</a>
                                    </h4>
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Glen Rouse</a>
                                    </h4>
                                    <p class="small mb-0">
                                        <span class="text-warning">●</span> Busy
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Grace Gross</a>
                                    </h4>
                                    <p class="small mb-0">
                                        <span class="text-danger">●</span> Offline
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    通知
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">
                        &times;
                      </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush my--3">
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="col ml--2">
                                <div class="small text-muted">
                                    <strong class="text-body">Grace Gross</strong> subscribed to you.
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    2m
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="/images/logo.png" class="navbar-brand-img mx-auto">
        </a>
        <div class="navbar-user d-md-none">
            <div class="dropdown">
                <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">个人空间</a>
                    <a href="{{route('changePassword',auth()->user())}}" class="dropdown-item">修改密码</a>
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            @yield('menu')
            <hr class="my-3">
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="http://hdcms.com">
                        <i class="fe fe-git-branch"></i> hdcms <span class="badge badge-primary ml-auto">v5.0</span>
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <div class="nav-link text-muted">
                        <i class="fe fe-sun"></i> 风格
                        <div class="custom-control custom-checkbox-toggle ml-auto">
                            <input type="checkbox" class="custom-control-input" id="themeModeToggle">
                            <label class="custom-control-label" for="themeModeToggle"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-content">
    <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mr-4">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        系统管理
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="http://dev.hdcms.com/edu/article">
                        微信功能
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{route('edu.lesson.index')}}">
                        在线教育
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="http://dev.hdcms.com/edu/article">
                        插件扩展
                    </a>
                </li>
            </ul>
            <div class="navbar-user">
                <div class="dropdown">
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">个人中心</a>
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="p-5">
        @yield('content')
    </div>
</div>
<!-- Libs JS -->
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/chart.js/dist/Chart.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/chart.js/Chart.extension.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/highlight.pack.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/list.js/dist/list.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/dropzone/dist/min/dropzone.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/js/select2.min.js"></script>--}}
{{--<!-- Theme JS -->--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/js/theme.min.js"></script>--}}
<script>
    require(['bootstrap', 'jquery'], function () {
        require([
            "{{asset('org/Dashkit-1.1.2')}}/libs/list.js/dist/list.min.js"
            , "{{asset('org/Dashkit-1.1.2')}}/js/theme.min.js"])
    })
</script>
<script src="{{asset('js/admin_menu.js')}}"></script>
@stack('js')
</body>
</html>
