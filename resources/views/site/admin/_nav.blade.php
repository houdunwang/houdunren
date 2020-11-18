<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('admin') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link {{ active_class(if_route('site.admin.index'))}}" href="{{ route('site.admin.index',$site) }}">
        管理员列表
    </a>
    <a class="nav-link" href="{{ route('site.role.index',$site) }}">
        角色列表
    </a>
    @if(if_route('site.admin.role'))
    <a class="nav-link active" href="#">
        设置管理员角色
    </a>
    @endif
</nav>
