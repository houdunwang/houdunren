@inject('siteRepository',App\Repositories\SiteRepository')
@inject('moduleRepository',App\Repositories\ModuleRepository')
@inject('userRepository',App\Repositories\userRepository')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>站点管理 - 免费开源多站点管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="{{asset('org/hdjs/package/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="admin-site">
@include('layouts.message')
<div class="container-fluid top-menu mb-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item pr-3">
                    @if ($site = $siteRepository->getAdminCacheSite())
                        <a href="{{route('site.index')}}" class="nav-link">
                            <i class="fa fa-reply-all"></i> 返回系统管理
                        </a>
                    @endif
                </li>
                <li class="nav-item pr-3">
                    <a href="{{route('site.show',$siteRepository->getAdminCacheSite())}}" class="nav-link">
                        <i class="fa fa-w fa-file-code-o"></i> 应用列表
                    </a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-w fa-user"></i> admin
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('user.edit',auth()->user())}}">修改资料</a>
                            <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="card">
                @foreach($moduleRepository->getSiteModulesByUser(site(),auth()->user()) as $module)
                    @if($module['name'] == module()['name'])
                        @foreach ($module['menus'] as $title=>$menus)
                            <div class="card-header">
                                {{$title}}
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($menus as $menu)
                                    @if (module_access($menu['permission'],$module['name']))
                                        <a href="{{$menu['url']}}?mid={{$module['id']}}"
                                           class="list-group-item">{{$menu['title']}}</a>
                                    @endif
                                @endforeach
                            </ul>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-sm-9 col-md-10 mt-2 mt-sm-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-cogs"></i> <a href="{{route('site.show',site())}}">站点管理</a>
                </li>
                <li class="breadcrumb-item"><a href="#">{{module()['title']}}</a></li>
            </ol>
            <div class="{{route_class()}}">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@stack('js')
<script>
    require(['bootstrap'])
</script>
</body>
</html>