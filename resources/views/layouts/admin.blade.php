<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('org/hdjs/package/webuploader/jekyll/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme-dark.min.css" rel="" data-toggle="theme"
          data-theme-mode="dark">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css" rel="" data-toggle="theme" data-theme-mode="light">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        body {
            display: none;
        }
    </style>
    <script>
        var themeMode = (localStorage.getItem('dashkitThemeMode')) ? localStorage.getItem('dashkitThemeMode') : 'light';
        var themeFile = document.querySelector('[data-toggle="theme"][data-theme-mode="' + themeMode + '"]');
        themeFile.rel = 'stylesheet';
        themeFile.addEventListener('load', function () {
            document.body.style.display = 'block';
        });
    </script>
    <title>{{config_get('admin.site.webname')}}</title>
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
                aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/" target="_blank">
            <img src="{{config_get('admin.site.logo',asset('images/logo.png'))}}" class="navbar-brand-img mx-auto">
        </a>
        <div class="navbar-user d-md-none">
            <div class="dropdown">
                <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{auth()->user()->icon}}"
                             class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">个人空间</a>
                    <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}" class="dropdown-item">修改密码</a>
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            {{--菜单列表--}}
            @include('layouts._admin_menu')
            {{--菜单列表END--}}
            <hr class="my-3">
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.update.cache')}}">
                        <i class="fe fe-life-buoy"></i> 更新缓存
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.hdcms.com" target="_blank">
                        <i class="fe fe-git-branch"></i> hdcms <span class="badge badge-primary ml-auto">v5.0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small text-secondary" href="http://www.houdunren.com" target="_blank">
                        <i class="fe fe-film"></i> 后盾人视频教程
                    </a>
                </li>
            </ul>
            {{--<hr class="my-3">--}}
            {{--<ul class="navbar-nav mb-md-3">--}}
            {{--<li class="nav-item">--}}
            {{--<div class="nav-link text-muted">--}}
            {{--<i class="fe fe-sun"></i> 风格--}}
            {{--<div class="custom-control custom-checkbox-toggle ml-auto">--}}
            {{--<input type="checkbox" class="custom-control-input" id="themeModeToggle">--}}
            {{--<label class="custom-control-label" for="themeModeToggle"></label>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>
<div class="main-content">
    <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto">
                @foreach(app(\App\Models\Module::class)->get() as $module)
                    @if(auth()->user()->hasAnyPermission($module->getModulePermission()))
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{route(strtolower($module['name']).'.admin')}}">
                                {{$module['title']}}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="navbar-user">
                <div class="dropdown">
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">个人中心</a>
                        <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}" class="dropdown-item">修改密码</a>
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
<script>
    require(['bootstrap', 'jquery'])
</script>
@stack('js')
</body>
</html>
