<ul class="navbar-nav">
    @if(auth()->user()->hasAnyPermission(['admin-config','admin-role','admin-permission']))
        <li class="nav-item" menu="admin">
            <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-twitter"></i> 公众号管理
            </a>
            <div class="collapse show" id="admin">
                <ul class="nav nav-sm flex-column">
                    @can('admin-config')
                        <li class="nav-item">
                            <a href="{{route('chat.base.index')}}" class="nav-link ">
                                普通文本消息
                            </a>
                        </li>
                    @endcan
                    @can('admin-permission')
                        <li class="nav-item">
                            <a href="{{route('admin.permission')}}" class="nav-link">
                                图文消息
                            </a>
                        </li>
                    @endcan
                    @can('admin-permission')
                        <li class="nav-item">
                            <a href="{{route('admin.permission')}}" class="nav-link">
                                微信菜单
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endif

</ul>
