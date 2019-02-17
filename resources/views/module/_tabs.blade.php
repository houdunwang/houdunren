<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('module.index'),'active')}}" href="{{route('module.index')}}">
            已安装模块
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('module.create'),'active')}}" href="{{route('module.create')}}">
            设计模块
        </a>
    </li>
    @if (if_route('module.edit'))
        <li class="nav-item">
            <a class="nav-link active" href="#">
                编辑模块
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('module.create'),'active')}}" href="{{route('module.index')}}">
            已购模块
        </a>
    </li>
</ul>