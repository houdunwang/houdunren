<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('admin.index'))}}" href="{{ route('admin.index') }}">
        <i class="fas fa-home    "></i>
    </a>

    <a class="nav-link {{ active_class(if_route('site.role.index'))}}" href="{{ route('site.role.index',$site) }}">
        角色列表
    </a>

    <a class="nav-link {{ active_class(if_route('site.role.create'))}}" href="{{ route('site.role.create',$site) }}">
        添加角色
    </a>

    @if(if_route('site.role.edit'))
    <a class="nav-link active" href="#">
        编辑角色
    </a>
    @endif
</nav>
