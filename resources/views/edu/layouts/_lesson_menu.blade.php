<ul class="nav nav-tabs nav-overflow mb-4">
    <li class="nav-item">
        <a href="{{route('edu.lesson.index')}}" class="nav-link {{active_class(if_route('edu.lesson.index'))}}">
            课程列表
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('edu.lesson.create')}}" class="nav-link {{active_class(if_route('edu.lesson.create'))}}">
            发布课程
        </a>
    </li>
</ul>
