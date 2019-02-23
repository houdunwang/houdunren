<ul class="nav nav-tabs mb-2">
    @if (if_route('site.wechat.create'))
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('site.wechat.create'))}}"
               href="{{route('site.wechat.create',[$site])}}">
                设置公众号信息
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('site.wechat.edit'))}}"
               href="{{route('site.wechat.edit',[$site,$wechat])}}">
                设置公众号信息
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('site.wechat.show'))}}"
               href="{{route('site.wechat.show',[$site,$wechat])}}">
                查看微信平台设置方式
            </a>
        </li>
    @endif
</ul>