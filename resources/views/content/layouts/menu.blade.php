<ul class="navbar-nav">
    @if(auth()->user()->hasAnyPermission(['Admin-index']))
        <li class="nav-item">
            <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-layers"></i> <strong>配置设置</strong>
            </a>
            <div class="collapse show" id="admin">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('content.config.edit')}}" class="nav-link">
                            模块配置
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.template.index')}}" class="nav-link">
                            模板选择
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" menu="admin">
            <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-file-text"></i> <strong>内容管理</strong>
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
                            栏目分类
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.model.index')}}" class="nav-link">
                            文章模型
                        </a>
                    </li>
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
