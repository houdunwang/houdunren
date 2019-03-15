<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>会员中心</title>
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="member">
@include('layouts.message')
@inject('ModuleRepository','App\Repositories\ModuleRepository')
@include('components.header')
<div class="container mt-1 mt-sm-3 mb-5">
    <div class="row">
        <div class="col-sm-2 px-0 mb-5">
            <div class="card shadow-sm d-none d-sm-block">
                <a href="{{route('member.icon.index')}}" class="d-block">
                    <img src="{{auth()->user()['avatar']}}" class="card-img-top">
                </a>
                <div class="card-body">
                    <a class="card-title text-secondary" href="{{route('member.info.index')}}">
                        <h5>{{auth()->user()['name']}}</h5>
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="text-left">
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-envelope {{active_class(auth()->user()['email'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.mobile.index')}}">
                            <i class="fa fa-phone-square {{active_class(auth()->user()['mobile'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-weibo {{active_class(auth()->user()['weibo'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-wechat {{active_class(auth()->user()['wechat'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-github {{active_class(auth()->user()['github'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-qq {{active_class(auth()->user()['qq'],'text-info')}}"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mt-0 mt-sm-2 shadow-sm border-bottom-0">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.info.index')}}">
                            资料修改
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.notify.index')}}">
                            站内消息
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.order.index')}}">
                            我的定单
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.order.index')}}">
                            我的粉丝
                        </a>
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{route('member.order.index')}}">
                            我的关注
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                {{--<div class="card-header">--}}
                {{--{{$moduleTitle}}--}}
                {{--</div>--}}
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($ModuleRepository->getMenus(site(),'member_pc') as $moduleTitle=>$menus)
                            @if (count($menus['menus']))
                                @foreach($menus['menus'] as $menu)
                                    <a class="list-group-item list-group-item-action text-secondary"
                                       href="{{$menu['url']}}?sid={{\site()['id']}}&mid={{$menus['module']['id']}}">
                                        {{$menu['title']}}
                                    </a>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-10 pr-0 mt-1 mt-sm-0 pl-sm-3 d-none pl-0 d-sm-block">
            @yield('content')
        </div>
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
</body>
</html>