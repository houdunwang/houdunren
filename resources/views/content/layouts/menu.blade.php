<ul class="navbar-nav">
    @if(auth()->user()->hasAnyPermission(['Admin-index']))
        <li class="nav-item" menu="admin">
            <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-file-text"></i> <strong>文章系统</strong>
            </a>
            <div class="collapse show" id="admin">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link">
                            文章管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.category.index')}}" class="nav-link">
                            内容分类管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.model.index')}}" class="nav-link">
                            文章模型
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" menu="admin">
            <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-file-text"></i> <strong>扩展功能</strong>
            </a>
            <div class="collapse show" id="admin">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link">
                            幻灯片管理
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @endif
</ul>
