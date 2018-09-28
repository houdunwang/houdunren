<ul class="navbar-nav">
    <li class="nav-item" menu="edu">
        <a class="nav-link" href="#edu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-file"></i> 在线教育
        </a>
        <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='edu','show','')}}" id="edu">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('edu.category.index')}}" class="nav-link">
                        帖子分类
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                        课程管理
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item" menu="edu">
        <a class="nav-link" href="#edu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-file"></i> 在线教育
        </a>
        <div class="collapse {{active_class(Cookie::get('admin_menu_id')=='edu','show','')}}" id="edu">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('edu.category.index')}}" class="nav-link">
                        帖子分类
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                        课程管理
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
