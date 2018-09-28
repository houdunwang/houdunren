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
            </ul>
        </div>
    </li>
</ul>
