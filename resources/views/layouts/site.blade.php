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
@include('layouts.components.header')
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
                    @yield('content')
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