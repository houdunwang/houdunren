<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>站点管理</title>
    @include('layouts.hdjs')
</head>
<body class="admin-site">
@include('layouts.message')
@inject('moduleRepository',App\Repositories\ModuleRepository')
@include('layouts.site.header')
<div class="container-fluid mt-3 mb-5">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="card">
                @foreach ($moduleRepository->filterModuleMenu(site(),module(),auth()->user())['business']
                 as $title=>$business)
                    <div class="card-header">
                        {{$title}}
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($business as $menu)
                            <a href="{{$menu['url']}}" class="list-group-item">
                                {{$menu['title']}}
                            </a>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="col-sm-9 col-md-10 mt-2 mt-sm-0">
            <div class="{{route_class()}} mb-5">
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