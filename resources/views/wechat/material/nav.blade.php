<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class($type=='image') }}" href="{{ route('wechat.material.index',['type'=>'image']) }}">
    图片素材
  </a>
  <a class="nav-link {{ active_class($type=='voice')}} " href="{{ route('wechat.material.index',['type'=>'voice']) }}">
    音频素材
  </a>
  <a class="nav-link {{ active_class($type=='news')}}" href="{{ route('wechat.material.index',['type'=>'news']) }}">
    图文素材
  </a>
</nav>
