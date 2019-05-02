<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('{LOWER_MODULE}.admin.{LOWER_NAME}.index'),'active')}}"
               href="{{module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.index')}}">
                内容列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('{LOWER_MODULE}.admin.{LOWER_NAME}.create'),'active')}}"
               href="{{module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.create')}}">
                新增数据
            </a>
        </li>
        @if (if_route('{LOWER_MODULE}.admin.{LOWER_NAME}.edit'))
            <li class="nav-item">
                <a class="nav-link {{active_class(!if_route('{LOWER_MODULE}.admin.{LOWER_NAME}.update'),'active')}}" href="#">
                    修改资料
                </a>
            </li>
        @endif
    </ul>