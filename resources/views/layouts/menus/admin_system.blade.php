<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">
        <img src="/images/logo.png" class="navbar-brand-img mx-auto">
    </a>
    <div class="navbar-user d-md-none">
        <div class="dropdown">
            <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                    <img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">个人空间</a>
                <a href="{{route('changePassword',auth()->user())}}" class="dropdown-item">修改密码</a>
                <hr class="dropdown-divider">
                <a href="{{route('logout')}}" class="dropdown-item">退出</a>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item" menu="admin">
                <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-file"></i> 系统设置
                </a>
                <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='admin','show','')}}" id="admin">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('admin.config.edit',['name'=>'base'])}}" class="nav-link ">
                                系统配置
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" menu="article">
                <a class="nav-link" href="#article" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-file"></i> 文章系统
                </a>
                <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='article','show','')}}" id="article">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                栏目管理
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" menu="edu">
                <a class="nav-link" href="#edu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-file"></i> 在线教育
                </a>
                <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='edu','show','')}}" id="edu">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('edu.category.index')}}" class="nav-link">
                                帖子分类
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                                课程管理
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" menu="users">
                <a class="nav-link" href="#users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                    <i class="fe fe-user"></i> 会员角色
                </a>
                <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='users','show','')}}" id="users">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                                角色管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('edu.lesson.index')}}" class="nav-link">
                                课程管理
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                    <span class="fe fe-bell"></span> 通知
                </a>
            </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link " href="http://hdcms.com">
                    <i class="fe fe-git-branch"></i> hdcms <span class="badge badge-primary ml-auto">v5.0</span>
                </a>
            </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <div class="nav-link text-muted">
                    <i class="fe fe-sun"></i> 风格
                    <div class="custom-control custom-checkbox-toggle ml-auto">
                        <input type="checkbox" class="custom-control-input" id="themeModeToggle">
                        <label class="custom-control-label" for="themeModeToggle"></label>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</div>
<script src="{{asset('js/admin_menu.js')}}"></script>
