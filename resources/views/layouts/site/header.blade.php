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
                            <a class="dropdown-item" href="{{route('member')}}">修改资料</a>
                            <a class="dropdown-item" href="{{route('system.logout')}}">退出登录</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>