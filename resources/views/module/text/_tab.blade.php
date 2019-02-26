<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('module.text.index'),'active')}}" href="{{module_link('module.text.index')}}">
            微信文本回复列表
        </a>
    </li>
    @if (if_route('module.text.index'))
        <li class="nav-item">
            <a class="nav-link" href="{{module_link('module.text.create')}}">
                添加回复内容
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link  {{active_class(!if_route('module.text.index'),'active')}}" href="#">
                设置回复内容
            </a>
        </li>
    @endif
</ul>