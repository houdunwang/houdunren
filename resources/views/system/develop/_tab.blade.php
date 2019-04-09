<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.admin.tag.index'),'active')}}"
           href="{{module_link('edu.admin.tag.index')}}">
            执行迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.admin.tag.create'),'active')}}"
           href="{{module_link('edu.admin.tag.create')}}">
            重置迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.admin.tag.create'),'active')}}"
           href="{{module_link('edu.admin.tag.create')}}">
            回滚迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('system.develop.create'),'active')}}"
           href="{{route('system.develop.create',$module)}}">
            设计模型
        </a>
    </li>
</ul>