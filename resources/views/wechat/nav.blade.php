<nav class="nav nav-tabs nav-stacked mb-3">

    <a class="nav-link" href="{{ route('site.site.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link {{ active_class(if_route('wechat.wechat.index')) }}"
        href="{{ route('wechat.wechat.index',$site) }}">站点公众号</a>

    <a class="nav-link {{ active_class(if_route('wechat.wechat.create')) }}"
        href="{{ route('wechat.wechat.create',$site) }}">添加公众号</a>

    @if( active_class(if_route('wechat.wechat.edit') ))
    <a class="nav-link active" href="#">编辑公众号</a>
    @endif

    @if( active_class(if_route('wechat.wechat.default.edit') ))
    <a class="nav-link active" href="#">默认回复消息</a>
    @endif

    @if( active_class(if_route('wechat.wechat.menu.edit') ))
    <a class="nav-link active" href="#">微信菜单</a>
    @endif
</nav>
