@extends('layouts.web')
@section('content')
    <main id="content" role="main">
        <div class="bg-primary">
            <div class="container pt-3 pb-3">
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <div class="mb-3 mb-sm-0">
                        <!-- Breadcrumb -->
                        <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">首页</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="#">个人中心</a></li>
                        </ol>
                        <!-- End Breadcrumb -->
                    </div>
                    <!-- Edit Profile -->
                    <a class="btn btn-sm btn-soft-white transition-3d-hover"
                       href="{{route('member.user.edit',[auth()->id(),'type'=>'info'])}}">
                        <span class="fas fa-user-cog small mr-2"></span>
                        修改资料
                    </a>
                    <!-- End Edit Profile -->
                </div>

            </div>
        </div>
        <!-- End Breadcrumb Section -->
        <!-- Content Section -->
        <div class="bg-light pb-5">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-3 mb-7 mb-lg-0">
                        <!-- Profile Card -->
                        <div class="card p-1 mb-4 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <a href="{{route('member.user.edit',[auth()->id(),'type'=>'icon'])}}">
                                        <img class="u-lg-avatar rounded-circle" src="{{auth()->user()->avatar}}"
                                             alt="Image Description">
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <h1 class="h6 font-weight-medium mb-0">{{auth()->user()->name}} </h1>
                                    <small class="d-block text-muted">UID: {{auth()->id()}}</small>
                                </div>
                                <a class="text-secondary small" href="{{route('member.user.show',auth()->id())}}">
                                    <i class="far fa-flag mr-1"></i> 个人主页
                                </a>
                                <hr>
                                <ul class="list-group list-group-flush list-group-borderless mb-0">
                                    <li class="list-group-item">
                                        <a class="d-block
                                        {{active_class(if_query('type','info'),'btn btn-sm btn-soft-secondary','text-muted')}}"
                                           href="{{route('member.user.edit',[auth()->id(),'type'=>'info'])}}">
                                            个人信息
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block
                                        {{active_class(if_query('type','password'),'btn btn-sm btn-soft-secondary','text-muted')}}"
                                           href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}">
                                            修改密码
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block
                                        {{active_class(if_route('member.fans'),'btn btn-sm btn btn-soft-secondary','text-muted')}}"
                                           href="{{route('member.fans',auth()->user())}}">
                                            粉丝列表
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block
                                        {{active_class(if_route('member.follower'),'btn btn-sm btn btn-soft-secondary','text-muted')}}"
                                           href="{{route('member.follower',auth()->user())}}">
                                            关注列表
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block
                                       {{active_class(if_route('member.notification.index'),'btn btn-sm btn btn-soft-secondary','text-muted')}}"
                                           href="{{route('member.notification.index')}}">
                                            消息中心
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                                @foreach(menus('center_menu') as $menus)
                                    <ul class="list-group list-group-flush list-group-borderless mb-0">
                                        @foreach($menus as $menu)
                                            @if(!isset($menu['permission']) || auth()->user()->hasAnyPermission($menu['permission']))
                                                <li class="list-group-item">
                                                    <a class="d-block
                                        {{active_class(strpos($menu['route'],\Route::getCurrentRoute()->uri),'btn btn-sm btn-soft-secondary','text-muted')}}"
                                                       href="{{$menu['route']}}">
                                                        {{$menu['name']}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @yield('member_content')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection