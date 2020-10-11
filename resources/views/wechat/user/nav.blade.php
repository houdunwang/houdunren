<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('wechat.user.index'))}}" href="{{ route('wechat.news.index') }}">
    公众号粉丝列表
  </a>
  {{-- <a class="nav-link {{ active_class(if_route('wechat.user.sync'))}}"
  href="{{ route('wechat.user.wechat.list') }}">
  从微信服务器同步粉丝
  </a> --}}
  @if(if_route('wechat.news.edit'))
  <a class="nav-link active" href="#">
    编辑图文消息
  </a>
  @endif
</nav>
