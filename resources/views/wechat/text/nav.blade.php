<nav class="nav nav-tabs mb-3">
    <a class="nav-link {{ active_class(if_route('wechat.text.index'))}}" href="{{ route('wechat.text.index') }}">
        文本回复
    </a>
    <a class="nav-link {{ active_class(if_route('wechat.text.create'))}}" href="{{ route('wechat.text.create') }}">
        添加文本消息
    </a>
    @if(if_route('wechat.text.edit'))
    <a class="nav-link active" href="#">
        编辑文本消息
    </a>
    @endif
</nav>
