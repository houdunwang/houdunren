<ul class="navbar-nav">
    @if(auth()->user()->hasAnyPermission(['Admin-config','Admin-role','Admin-permission']))
        <li class="nav-item" menu="admin">
            <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-twitter"></i> 基础功能
            </a>
            <div class="collapse show" id="admin">
                <ul class="nav nav-sm flex-column">
                    @can('Admin-config')
                        <li class="nav-item">
                            <a href="{{route('chat.base.index')}}" class="nav-link">
                                文本消息
                            </a>
                        </li>
                    @endcan
                    @can('Admin-permission')
                        <li class="nav-item">
                            <a href="{{route('chat.news.index')}}" class="nav-link">
                                图文消息
                            </a>
                        </li>
                    @endcan
                    @can('Admin-permission')
                        <li class="nav-item">
                            <a href="{{route('chat.button.index')}}" class="nav-link">
                                微信菜单
                            </a>
                        </li>
                    @endcan
                    @can('Admin-permission')
                        <li class="nav-item">
                            <a href="{{route('chat.default.create')}}" class="nav-link">
                                默认消息
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endif

</ul>
