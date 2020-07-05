<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('admin.index'))}}" href="{{ route('admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i> 站点列表
    </a>
    <a class="nav-link {{ active_class(if_route('site.site.create'))}}" href="{{ route('site.site.create') }}">
        添加站点
    </a>
    @if(if_route('site.site.edit'))
    <a class="nav-link active" href="#">
        编辑站点
    </a>
    @endif
</nav>
