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
@include('user.layouts._header')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <div><span class="fe fe-file mr-1"></span> 内容管理</div>
                </div>
                <div class="card-body">
                    <div class="nav flex-column nav-pills small">
                        <a href="{{route('edu.lesson.index')}}"
                           class="nav-link {{active_class(if_route('edu.lesson.index'),'active','text-muted')}}">
                            在线课程
                        </a>
                        <a href="{{route('edu.lesson.create')}}"
                           class="nav-link {{active_class(if_route('edu.lesson.create'),'active','text-muted')}}">
                            发布课程
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            @yield('content')
        </div>
    </div>
</div>
<script>
    require(['hdjs','bootstrap']);
</script>
@stack('js')
</body>
</html>
