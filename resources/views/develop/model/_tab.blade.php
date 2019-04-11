<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('develop.migrate.make',$module),'active')}}"
           href="javascript:void(0)"
        onclick="confirm('确定执行操作吗')?location.href='{{module_link('develop.migrate.make',$module)}}':''">
            执行迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('develop.migrate.refresh',$module),'active')}}"
           href="javascript:void(0)"
           onclick="confirm('确定执行refresh操作吗')?location.href='{{module_link('develop.migrate.refresh',$module)}}':''">
            重置迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('develop.migrate.rollback',$module),'active')}}"
           href="javascript:void(0)"
           onclick="confirm('确定执行rollback操作吗')?location.href='{{module_link('develop.migrate.rollback',$module)}}':''">
            回滚迁移
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('develop.model.create'),'active')}}"
           href="{{route('develop.model.create',$module)}}">
            设计模型
        </a>
    </li>
</ul>