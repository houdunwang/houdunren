<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('Edu.admin.index') }}">
        <i class="fas fa-home"></i>
    </a>

    <a class="nav-link  {{ active_class(if_route('Edu.admin.subscribe.index'))}}"
        href="{{ route('Edu.admin.subscribe.index') }}">
        套餐列表
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.admin.subscribe.create'))}}"
        href="{{ route('Edu.admin.subscribe.create') }}">
        添加课程
    </a>
</nav>
