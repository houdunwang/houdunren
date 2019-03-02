@inject('siteRepository',App\Repositories\SiteRepository')
@inject('moduleRepository',App\Repositories\ModuleRepository')
@inject('userRepository',App\Repositories\UserRepository')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>站点管理</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="{{asset('org/hdjs/package/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    <script src="{{asset('js/util.js')}}"></script>
    @stack('css')
</head>
<body class="admin-site">
@include('layouts.message')
@include('layouts.components.header')
<div class="container-fluid mt-3 mb-5">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="card">
                <?php $collect = $moduleRepository->filterModuleMenu(site(),module(),auth()->user());?>
                    @foreach ($collect['business'] as $title=>$business)
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