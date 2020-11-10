<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('WeChat.admin.text.index'))}}"
     href="{{ route('WeChat.admin.text.index') }}">
    文本回复
  </a>
  <a class="nav-link {{ active_class(if_route('WeChat.admin.text.create'))}}"
     href="{{ route('WeChat.admin.text.create') }}">
    添加文本消息
  </a>
  @if(if_route('WeChat.admin.text.edit'))
  <a class="nav-link active" href="#">
    编辑文本消息
  </a>
  @endif
</nav>
