{{--后台菜单--}}
<div class="collapse navbar-collapse" id="sidebarCollapse">
    <!-- Form -->
    <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fe fe-search"></span>
                </div>
            </div>
        </div>
    </form>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item top">
            <a class="nav-link active" href="/" target="_blank">
                <i class="fe fe-home"></i> 网站首页
            </a>
        </li>
        <li class="nav-item top">
            <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-controls="sidebarPages">
                <i class="fe fe-grid"></i> 系统管理
            </a>
            <div class="collapse {{hd_menu_class('admin')}}" id="admin">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item ">
                        <a href="{{route('admin.config.edit',['name'=>'base'])}}" class="nav-link">
                            基本配置
                        </a>
                        <a href="{{route('admin.config.edit',['name'=>'site'])}}" class="nav-link">
                            网站信息
                        </a>
                        <a href="{{route('admin.config.edit',['name'=>'email'])}}" class="nav-link ">
                            邮箱设置
                        </a>
                        <a href="{{route('admin.config.edit',['name'=>'upload'])}}" class="nav-link ">
                            上传设置
                        </a>
                        <a href="{{route('admin.config.edit',['name'=>'aliyun'])}}" class="nav-link ">
                            阿里云
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item top">
            <a class="nav-link" href="#article" data-toggle="collapse" role="button" aria-controls="sidebarPages">
                <i class="fe fe-file"></i> 文章系统
            </a>
            <div class="collapse {{hd_menu_class('article')}}" id="article">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            栏目管理
                        </a>
                        <a href="feed.html" class="nav-link">
                            文章列表
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item top">
            <a class="nav-link" href="#edu" data-toggle="collapse" role="button" aria-controls="sidebarPages">
                <i class="fe fe-book-open"></i> 在线教育
            </a>
            <div class="collapse {{hd_menu_class('edu')}}" id="edu">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('edu.category.index')}}" class="nav-link">
                            帖子分类
                        </a>
                        <a href="feed.html" class="nav-link ">
                            帖子列表
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item top">
            <a class="nav-link" href="#users" data-toggle="collapse" role="button" aria-controls="sidebarPages">
                <i class="fe fe fe-user"></i> 会员粉丝
            </a>
            <div class="collapse {{hd_menu_class('users')}}" id="users">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="feed.html" class="nav-link ">
                            会员列表
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item top">
            <a class="nav-link" href="#module" data-toggle="collapse" role="button" aria-controls="sidebarPages">
                <i class="fe fe-box"></i> 模块管理
            </a>
            <div class="collapse {{hd_menu_class('module')}}" id="module">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="feed.html" class="nav-link ">
                            会员列表
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <!-- Divider -->
    <hr class="my-3">

    <!-- Heading -->
    <h6 class="navbar-heading text-muted">
        扩展模块
    </h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                <i class="fe fe-book-open"></i> Components
            </a>
            <div class="collapse " id="sidebarComponents">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html#utilities" class="nav-link">
                            Utilities
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="http://www.hdcms.com" target="_blank">
                <i class="fe fe-git-branch"></i> 技术支持 <span class="badge  ml-auto">hdcms v5.0</span>
            </a>
        </li>
    </ul>

    <div class="navbar-user mt-auto d-none d-md-flex">
        <a href="#sidebarModalActivity" class="text-muted" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-bell"></i>
              </span>
        </a>
        <div class="dropup">
            <a href="#!" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                    <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle" alt="...">
                </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                <a href="{{route('member.index')}}" class="dropdown-item">会员中心</a>
                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}" class="dropdown-item">密码修改</a>
                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}" class="dropdown-item">修改头像</a>
                <hr class="dropdown-divider">
                <a href="{{route('logout')}}" class="dropdown-item">退出登录</a>
            </div>
        </div>
        <a href="#sidebarModalSearch" class="text-muted" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-search"></i>
              </span>
        </a>
    </div>
</div>
@push('js')
    <script src="{{asset('js/admin_menu.js')}}"></script>
@endpush
