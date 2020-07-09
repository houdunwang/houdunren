<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('admin.setting') }}">
        <i class="fas fa-home    "></i>
    </a>

    <a class="nav-link {{ active_class(if_route('admin.package.index'))}}" href="{{ route('admin.package.index') }}">
        套餐列表
    </a>

    <a class="nav-link {{ active_class(if_route('admin.package.create'))}}" href="{{ route('admin.package.create') }}">
        添加套餐
    </a>
    @if(if_route('admin.package.edit'))
    <a class="nav-link active" href="#">
        编辑套餐
    </a>
    @endif
</nav>
