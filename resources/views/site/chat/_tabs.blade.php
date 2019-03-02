<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.chat.index'))}}"
           href="{{route('site.chat.index',[$site])}}">
            微信公众号管理
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route(['site.chat.create']))}}"
           href="{{route('site.chat.create',[$site])}}">
            添加公众号
        </a>
    </li>
    @if (if_route('site.chat.edit'))
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route(['site.chat.edit']))}}"
           href="{{route('site.chat.create',[$site])}}">
            编辑公众号资料
        </a>
    </li>
    @endif
    @if (if_route('site.chat.show'))
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.chat.show'))}}"
           href="{{route('site.chat.create',[$site])}}">
            查看公众号绑定设置
        </a>
    </li>
    @endif
</ul>