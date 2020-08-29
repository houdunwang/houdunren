<nav class="nav nav-tabs mb-3">
    <a class="nav-link {{ active_class(if_route('wechat.wechat.index'))}}"
        href="{{ route('wechat.wechat.index',$site) }}">
        公众号列表
    </a>

    <a class="nav-link {{ active_class(if_route('wechat.wechat.create'))}}"
        href="{{ route('wechat.wechat.create',$site) }}">
        添加公众号
    </a>

    @if(if_route('wechat.wechat.edit',$site))
    <a class="nav-link active" href="#">
        编辑公众号
    </a>
    @endif

    @if(if_route('wechat.wechat.default.edit',$site))
    <a class="nav-link active" href="#">
        默认消息
    </a>
    @endif

    @if(if_route('wechat.wechat.menu.edit',$site))
    <a class="nav-link active" href="#">
        微信菜单
    </a>
    @endif
</nav>
