<ul class="navbar-nav">
    <li class="nav-item" menu="admin">
        <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-settings"></i> 系统设置
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
    <li class="nav-item" menu="role">
        <a class="nav-link" href="#role" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-shield"></i> 角色权限
        </a>
        <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='role','show','')}}" id="role">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('admin.role.index')}}" class="nav-link">
                        角色管理
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index',['admin'=>1])}}" class="nav-link">
                        管理员列表
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item" menu="users">
        <a class="nav-link" href="#users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class="fe fe-user"></i> 会员管理
        </a>
        <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='users','show','')}}" id="users">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link">
                        会员列表
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item" menu="module">
        <a class="nav-link" href="#module" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class="fe fe-grid"></i> 模块管理
        </a>
        <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='module','show','')}}" id="module">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('admin.module.index')}}" class="nav-link">
                        模块列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.module.create')}}" class="nav-link">
                        设计模块
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
