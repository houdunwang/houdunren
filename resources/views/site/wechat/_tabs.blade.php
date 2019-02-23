<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.wechat.create'))}}"
           href="{{route('site.wechat.create',[$site])}}">
            设置公众号信息
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('site.wechat.show'))}}" href="{{route('site.wechat.create',[$site])}}">
            查看微信平台设置方式
        </a>
    </li>
</ul>