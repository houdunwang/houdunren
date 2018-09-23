<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mr-auto" href="/">
            <img src="/images/logo.png" alt="..." class="navbar-brand-img">
        </a>
        <form id="searchForm" class="form-inline mr-5 d-none d-lg-flex" method="get" action="{{route('edu.search')}}">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="w">
                <input type="text" name="t" hidden>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">搜索</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="searched('article');">文章</a>
                        <a class="dropdown-item" href="#" onclick="searched('article');">话题</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="searched('article');">视频</a>
                    </div>
                </div>
            </div>
        </form>
        <script>
            function searched(t) {
                require(['jquery'], function ($) {
                    let w = $("[name='w']").val();
                    $("[name='t']").val(t);
                    if ($.trim(w) == '') {
                        return;
                    }
                    $("#searchForm").submit();
                    return false;
                })
            }
        </script>
        {{--<form class="form-inline mr-4 d-none d-lg-flex">--}}
        {{--<div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>--}}
        {{--<input type="search" class="form-control form-control-prepended  dropdown-toggle search"--}}
        {{--data-toggle="dropdown" placeholder="搜索" aria-label="Search">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<div class="input-group-text">--}}
        {{--<i class="fe fe-search"></i>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="dropdown-menu dropdown-menu-card">--}}
        {{--<div class="card-body">--}}
        {{--<div class="list-group list-group-flush list my--3">--}}
        {{--<a href="profile-posts.html" class="list-group-item px-0">--}}
        {{--<div class="row align-items-center">--}}
        {{--<div class="col ml--2">--}}
        {{--<h4 class="text-body mb-1 name">--}}
        {{--Laravel--}}
        {{--</h4>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        <div class="navbar-user">
            {{--发表内容--}}
            @include('edu.layouts._write')
            @include('layouts._notification')
            @auth
                <div class="dropdown">
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',[auth()->user()])}}" class="dropdown-item">个人空间</a>
                        <a href="{{route('member.user.edit',[auth()->user(),'type'=>'info'])}}" class="dropdown-item">修改资料</a>
                        <a href="{{route('edu.lesson.index')}}" class="dropdown-item">课程管理</a>
                        <a href="settings.html" class="dropdown-item">学习记录</a>
                        @if(Auth::user()->is_admin)
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endif
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">退出</a>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{route('login')}}" class="btn btn-white btn-sm mr-3">
                    <span class="fe fe-log-in mr-1"></span> 登录
                </a>
                <a href="{{route('register')}}" class="btn btn-white btn-sm">
                    <span class="fe fe-user-plus mr-1"></span> 注册
                </a>
            @endguest
        </div>
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        话题
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavPages">
                        @foreach(\App\Models\Category::get() as $category)
                            <li>
                                <a href="{{route('edu.topic.index',['id'=>$category['id']])}}" class="dropdown-item">
                                    <i class="{{$category['icon']}} mr-2 w-15" aria-hidden="true"></i> {{$category['title']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="{{route('edu.lesson.lists')}}">
                        视频
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{route('edu.article.index')}}">
                        文章
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
