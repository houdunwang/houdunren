<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('system.module.index'),'active')}}" href="{{route('system.module.index')}}">
            已安装模块
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('system.module.create'),'active')}}" href="{{route('system.module.create')}}">
            设计模块
        </a>
    </li>
    @if (if_route('system.module.edit'))
        <li class="nav-item">
            <a class="nav-link active" href="#">
                编辑模块
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('system.module.local'),'active')}}" href="{{route('system.module.local')}}">
            安装本地模块
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('system.app.index'),'active')}}" href="{{route('system.app.index')}}">
            已购模块
        </a>
    </li>
</ul>