<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class($type=='image') }}"
     href="{{ route('WeChat.admin.material.index',['type'=>'image']) }}">
    图片素材
  </a>
  <a class="nav-link {{ active_class($type=='voice')}} "
     href="{{ route('WeChat.admin.material.index',['type'=>'voice']) }}">
    音频素材
  </a>
  <a class="nav-link {{ active_class($type=='news')}}"
     href="{{ route('WeChat.admin.material.index',['type'=>'news']) }}">
    图文素材
  </a>
</nav>
