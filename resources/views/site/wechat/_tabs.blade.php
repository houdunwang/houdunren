<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.wechat.index'))}}"
           href="{{route('site.wechat.index',[$site])}}">
            微信公众号管理
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route(['site.wechat.create']))}}"
           href="{{route('site.wechat.create',[$site])}}">
            添加公众号
        </a>
    </li>
    @if (if_route('site.wechat.edit'))
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route(['site.wechat.edit']))}}"
           href="{{route('site.wechat.create',[$site])}}">
            编辑公众号资料
        </a>
    </li>
    @endif
    @if (if_route('site.wechat.show'))
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.wechat.show'))}}"
           href="{{route('site.wechat.create',[$site])}}">
            查看公众号绑定设置
        </a>
    </li>
    @endif
</ul>