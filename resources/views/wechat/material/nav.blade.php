<nav class="nav nav-tabs mb-3">
    <a class="nav-link {{ active_class(if_route('wechat.material.index') && $type=='image')}}"
        href="{{ route('wechat.material.index',['type'=>'image']) }}">
        图片素材
    </a>
    <a class="nav-link {{ active_class(if_route('wechat.material.index' && $type=='voice'))}}"
        href="{{ route('wechat.material.index',['type'=>'voice']) }}">
        音频素材
    </a>
    <a class="nav-link {{ active_class(if_route('wechat.news.index'))}}"
        href="{{ route('wechat.material.index',['type'=>'news']) }}">
        图文素材
    </a>
    @if(if_route('wechat.material.edit'))
    <a class="nav-link active" href="#">
        编辑素材
    </a>
    @endif
</nav>
