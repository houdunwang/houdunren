<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('shop.module.index'),'active')}}"
           href="{{module_link('shop.module.index')}}">模块列表</a>
    </li>
    @if (if_route('shop.module.create') || if_route('shop.module.index'))
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('shop.module.create'),'active')}}"
               href="{{module_link('shop.module.create')}}">
                添加模块
            </a>
        </li>
    @endif
    @if (if_route('shop.module.edit'))
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('shop.module.edit'),'active')}}"
               href="#">
                编辑模块
            </a>
        </li>
    @endif
</ul>