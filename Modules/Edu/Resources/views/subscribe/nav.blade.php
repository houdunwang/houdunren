<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('Edu.admin.subscribe.index'))}}"
        href="{{ route('Edu.admin.subscribe.index') }}">
        套餐列表
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.admin.subscribe.create'))}}"
        href="{{ route('Edu.admin.subscribe.create') }}">
        添加套餐
    </a>

    @if (if_route('Edu.admin.subscribe.edit'))
    <a class="nav-link {{ active_class(if_route('Edu.admin.subscribe.edit'))}}" href="#">
        修改套餐
    </a>
    @endif
</nav>
