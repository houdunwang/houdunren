<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('develop.model.index',$module),'active')}}"
           href="{{route('develop.model.index',$module)}}">
            【{{$module['title']}}】模块开发
        </a>
    </li>
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
<div class="alert alert-light border shadow-sm" role="alert">
    <i class="fa fa-info-circle"></i>
    <span class="text-secondary">
            建立查看 <a href="https://www.houdunren.com/document/front/content/198?sid=1" target="_blank" class="text-primary">在线文档</a> 了解具体使用细节。
        </span>
</div>