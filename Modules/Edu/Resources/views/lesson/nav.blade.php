<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('Edu.admin.index') }}">
        <i class="fas fa-home"></i>
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.admin.lesson.index'))}}"
        href="{{ route('Edu.admin.lesson.index') }}">
        课程列表
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.admin.lesson.create'))}}"
        href="{{ route('Edu.admin.lesson.create') }}">
        添加课程
    </a>
    @if(if_route('Edu.admin.lesson.edit'))
    <a class="nav-link active" href="#">
        编辑课程
    </a>
    @endif
</nav>
