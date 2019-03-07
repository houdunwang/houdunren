@inject('siteRepository',App\Repositories\SiteRepository')
@inject('moduleRepository',App\Repositories\ModuleRepository')
@inject('UserRepository',App\Repositories\UserRepository')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>站点管理 - 免费开源多站点管理系统</title>
    @include('layouts.hdjs')
</head>
<body class="admin-site">
@include('layouts.message')
<div class="container-fluid top-menu mb-0 shadow">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item pr-3">
                    <a href="{{route('system.site.index')}}" class="nav-link">
                        <i class="fa fa-reply-all"></i> 返回系统管理
                    </a>
                </li>
                <li class="nav-item pr-3">
                    <a href="{{route('site.site.show',site())}}" class="nav-link">
                        <i class="fa fa-w fa-file-code-o"></i> 应用列表
                    </a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav">
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
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-3 col-md-2 mb-5">
            <div class="card">
                @foreach($moduleRepository->getSiteModulesByUser(site(),auth()->user()) as $module)
                    @if (count($module['business']))
                        <div class="card-header">
                            {{$module['title']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($module['business'] as $business)
                                @foreach ($business as $menu)
                                    <a href="{{$menu['url']}}" class="list-group-item">
                                        {{$menu['title']}}
                                    </a>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-sm-9 col-md-10 mt-2 mt-sm-0">
            <div class="card">
                <div class="card-header">
                    模块列表
                </div>
                <div class="card-body {{route_class()}}">
                    <div class="row">
                        @foreach ($modules as $module)
                            <div class="col-sm-2 col-6">
                                <div class="card bg-light">
                                    <a href="{{module_link('module.module.show',$module,site(),$module)}}">
                                        <img class="card-img-top" src="{{$module['package']['thumb']}}">
                                    </a>
                                    <div class="card-body p-2 text-center">
                                        <h6 class="p-0 m-0">
                                            <a href="{{module_link('module.module.show',$module,site(),$module)}}" class="text-dark">{{$module['title']}}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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