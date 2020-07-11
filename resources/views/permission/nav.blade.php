<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('admin.index'))}}" href="{{ route('admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link" href="{{ route('site.role.index',$site) }}">
        角色列表
    </a>

    <a class="nav-link active" href="#">
        权限设置
    </a>
</nav>
<div class="alert alert-info mt-2" role="alert">
    你正在设置「{{ $site->title }}」站点的「{{ $role->title }}」角色的权限
</div>
