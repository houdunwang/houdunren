<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        themeMode = 'light';
        var themeFile = document.querySelector('[data-toggle="theme"][data-theme-mode="' + themeMode + '"]');
        themeFile.rel = 'stylesheet';
        // Enable body content
        themeFile.addEventListener('load', function () {
            document.body.style.display = 'block';
        });
    </script>
    @include('layouts._hdjs')
    @include('layouts._message')
    <title>{{hd_config('site.webname')}}</title>
    @stack('css')
</head>
<body>
<!-- Modal: Members -->
<div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-card card" data-toggle="lists" data-lists-values='["name"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Add a member
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Close -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="card-header">

                    <!-- Form -->
                    <form>
                        <div class="input-group input-group-flush input-group-merge">
                            <input type="search" class="form-control form-control-prepended search" placeholder="Searc1h">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fe fe-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body">

                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Miyah Myles</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Ryu Duke</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Glen Rouse</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-warning">●</span> Busy
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Grace Gross</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-danger">●</span> Offline
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal: Activity -->
<div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <!-- Title -->
                <h4 class="modal-title">
                    Notifications
                </h4>

                <!-- Close -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                &times;
              </span>
                </button>

            </div>
            <div class="modal-body">

                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Adolfo Hess</strong> commented
                                    <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...”</blockquote>
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Glen Rouse</strong> commented
                                    <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...”</blockquote>
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Grace Gross</strong> subscribed to you.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SIDEBAR
================================================== -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" class="navbar-brand-img
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">
            <div class="dropdown">
                <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="profile-posts.html" class="dropdown-item">Profile</a>
                    <a href="settings.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item top">
                    <a class="nav-link" href="#info" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fe fe-user"></i> 我的资料
                    </a>
                    <div class="collapse {{hd_menu_class('info')}}" id="info">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}" class="nav-link ">
                                    头像设置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'info'])}}" class="nav-link ">
                                    个人信息
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}" class="nav-link ">
                                    修改密码
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item top">
                    <a class="nav-link" href="#article" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> 我的文章
                    </a>
                    <div class="collapse {{hd_menu_class('article')}}" id="article">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="feed.html" class="nav-link ">
                                    头像设置
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="settings.html" class="nav-link ">
                                    个人信息
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="settings.html" class="nav-link ">
                                    修改密码
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item top">
                    <a class="nav-link" href="#edu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fe fe-book-open"></i> 线上教育
                    </a>
                    <div class="collapse {{hd_menu_class('edu')}}" id="edu">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                                    课程管理
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('edu.lesson.create')}}" class="nav-link ">
                                    发布课程
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">
                扩展模块
            </h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item dropdown">
                    <a class="nav-link collapsed" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse" id="sidebarComponents" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="components.html#utilities" class="nav-link">
                                    Utilities
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="http://www.hdcms.com" target="_blank">
                        <i class="fe fe-git-branch"></i> 技术支持 <span class="badge  ml-auto">hdcms v5.0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-content">

    <!-- TOPBAR -->
    <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand mr-auto" href="/">

            </a>

            <!-- Form -->
            <form class="form-inline mr-4 d-none d-md-flex">
                <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                    <!-- Input -->
                    <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="搜索" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fe fe-search"></i>
                        </div>
                    </div>
                </div>
            </form>

            <!-- User -->
            <div class="navbar-user">

                <!-- Dropdown -->
                <div class="dropdown mr-4 d-none d-md-flex">

                    <!-- Toggle -->
                    <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon active">
                  <i class="fe fe-bell"></i>
                </span>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h5 class="card-header-title">
                                        Notifications
                                    </h5>

                                </div>
                                <div class="col-auto">

                                    <!-- Link -->
                                    <a href="#!" class="small">
                                        View all
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-header -->
                        <div class="card-body">

                            <!-- List group -->
                            <div class="list-group list-group-flush my--3">
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Adolfo Hess</strong> commented
                                                <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...”</blockquote>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Glen Rouse</strong> commented
                                                <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...”</blockquote>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a class="list-group-item px-0" href="#!">

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Content -->
                                            <div class="small text-muted">
                                                <strong class="text-body">Grace Gross</strong> subscribed to you.
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                2m
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/" class="dropdown-item">网站首页</a>
                        @if(auth()->user()->is_admin)
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endif
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                    </div>

                </div>

            </div>

        </div>
    </nav>
    <div class="container-fluid mt-5 ">
        @yield('content')
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
<script src="{{asset('js/admin_menu.js')}}"></script>
@stack('js')
</body>
</html>
