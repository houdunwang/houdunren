<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme-dark.min.css" rel="" data-toggle="theme"
          data-theme-mode="dark">
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
    <link rel="stylesheet" href="{{asset('org/hdjs/package/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <title>{{config_get('admin.site.webname')}}</title>
    @stack('css')
</head>
<body>
<div class="container">
    <div class="main-content">
        <div class="header">
            <img src="{{asset('org/Dashkit-1.1.2/img')}}/covers/team-cover.jpg" class="header-img-top">
            <div class="container-fluid">
                <div class="header-body mt--5 mt-md--6">
                    <div class="row align-items-end">
                        <div class="col-auto">
                            <div class="avatar avatar-xxl header-avatar-top">
                                <img src="{{$user['icon']}}" alt="..."
                                     class="avatar-img rounded border border-4 border-body">
                            </div>
                        </div>
                        <div class="col mb-3 ml--3 ml-md--2">
                            <h6 class="header-pretitle">
                                {{--普通会员--}}
                            </h6>
                            <h1 class="header-title">
                                {{$user['name']}}
                            </h1>
                        </div>
                        <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
                            @can('follow',$user)
                                @if(auth()->user()->following($user))
                                    <a class="btn btn-primary d-block d-md-inline-block btn-sm"
                                       href="{{route('member.follow',$user)}}">
                                        已关注
                                    </a>
                                @else
                                    <a class="btn btn-white d-block d-md-inline-block btn-sm"
                                       href="{{route('member.follow',$user)}}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                                    </a>
                                @endif
                            @endcan
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col">
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="team-overview.html" class="nav-link active">
                                        粉丝列表
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <hr>
    <div class="text-center">
        <a href="/" class="text-secondary small">网站首页</a>
    </div>
</div>

</body>
</html>