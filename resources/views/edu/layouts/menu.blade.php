<ul class="navbar-nav">
    <li class="nav-item" menu="edu">
        <a class="nav-link" href="#edu" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-video"></i> <strong>在线教育</strong>
        </a>
        <div class="collapse show" id="edu">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('edu.category.index')}}" class="nav-link">
                        帖子文章列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.category.index')}}" class="nav-link">
                        帖子分类管理
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
        <a class="nav-link" href="#edu" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fe fe-shopping-bag"></i> <strong>会员订单管理</strong>
        </a>
        <div class="collapse show" id="edu">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                        订阅会员
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                        会员订单列表
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
