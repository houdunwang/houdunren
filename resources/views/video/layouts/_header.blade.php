<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="/">
            <img src="/images/logo.png" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="搜索" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-card">
                    <div class="card-body">
                        <!-- List group -->
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
                </div> <!-- / .dropdown-menu -->

            </div>
        </form>
        <!-- User -->
        <div class="navbar-user">
            <!-- Dropdown -->
            <div class="dropdown mr-4 d-none d-lg-flex">
                <!-- Toggle -->
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
                                <!-- Link -->
                                <a href="#!" class="small">
                                    查看全部
                                </a>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .card-header -->
                    <div class="card-body">
                        <!-- List group -->
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
                        <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="profile-posts.html" class="dropdown-item">个人资料</a>
                        <a href="settings.html" class="dropdown-item">学习记录</a>
                        <a href="settings.html" class="dropdown-item">课程收藏</a>
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
                <a href="{{route('user.create')}}" class="btn btn-white btn-sm">
                    <span class="fe fe-user-plus mr-1"></span> 注册
                </a>
            @endguest
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown  mr-3">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        社区
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

                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavLayouts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        教程
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavLayouts">
                        <li>
                            <a class="dropdown-item" href="/">
                                系统学习
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="dashboard-side-topnav.html">
                                实战课程
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.houdunwang.com">
                        培训
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
