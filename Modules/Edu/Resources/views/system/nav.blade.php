<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('Edu.admin.system.index'))}}"
        href="{{ route('Edu.admin.system.index') }}">
        课程列表
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.admin.system.create'))}}"
        href="{{ route('Edu.admin.system.create') }}">
        添加课程
    </a>
    @if(if_route('Edu.admin.system.edit'))
    <a class="nav-link active" href="#">
        编辑课程
    </a>
    @endif
</nav>
