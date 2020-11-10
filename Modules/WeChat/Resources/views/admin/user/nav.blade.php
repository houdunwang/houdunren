<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('WeChat.admin.user.index'))}}"
     href="{{ route('WeChat.admin.news.index') }}">
    公众号粉丝列表
  </a>
  @if(if_route('WeChat.admin.news.edit'))
  <a class="nav-link active" href="#">
    编辑图文消息
  </a>
  @endif
</nav>
