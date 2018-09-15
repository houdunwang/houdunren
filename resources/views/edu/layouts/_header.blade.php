<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mr-auto" href="/">
            <img src="/images/logo.png" alt="..." class="navbar-brand-img">
        </a>
        <form class="form-inline mr-4 d-none d-lg-flex">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>
                <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="搜索" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-card">
                    <div class="card-body">
                        <div class="list-group list-group-flush list my--3">
                            <a href="profile-posts.html" class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col ml--2">
                                        <h4 class="text-body mb-1 name">
                                            Laravel
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <div class="navbar-user">
            {{--发表内容--}}
            <div class="dropdown mr-4 d-none d-lg-flex">
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fe fe-edit"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('edu.article.create')}}" class="dropdown-item">
                        <i class="fa fa-edit mr-2 w-15" aria-hidden="true"></i> 发表文章
                    </a>
                    @foreach(\App\Models\Category::get() as $category)
                        <a href="{{route('edu.topic.create',['id'=>$category['id']])}}" class="dropdown-item">
                            <i class="{{$category['icon']}} mr-2 w-15" aria-hidden="true"></i> {{$category['title']}}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="dropdown mr-4 d-none d-lg-flex">
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="icon active">
                        <i class="fe fe-bell"></i>
                      </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-header-title">
                                    消息
                                </h5>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-muted">
                                    查看全部
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush my--3">
                            <a class="list-group-item px-0" href="#">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm">
                                            <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="col ml--2">
                                        <div class="small text-muted">
                                            <strong class="text-body">Grace Gross</strong> subscribed to you.
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <small class="text-muted">
                                            2m
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @auth
                <div class="dropdown">
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.index')}}" class="dropdown-item">修改资料</a>
                        <a href="settings.html" class="dropdown-item">学习记录</a>
                        <a href="settings.html" class="dropdown-item">我的收藏</a>
                        @if(Auth::user()->is_admin)
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endif
                        <a href="{{route('edu.lesson.index')}}" class="dropdown-item">发布课程</a>
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
                        <li>
                            <a class="dropdown-item" href="orders.html">
                                技术分享
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="feed.html">
                                问答求助
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="settings.html">
                                码农生活
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="invoice.html">
                                桌面文化
                            </a>
                        </li>
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
