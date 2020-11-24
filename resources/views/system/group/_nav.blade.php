<nav class="nav nav-tabs">
  <a class="nav-link" href="{{ route('system.index') }}">
    <i class="fa fa-home" aria-hidden="true"></i>
  </a>
  <a class="nav-link {{ active_class(if_route('system.group.index'))}}" href="{{ route('system.group.index') }}">
    用户组列表
  </a>

  <a class="nav-link {{ active_class(if_route('system.group.create'))}}" href="{{ route('system.group.create') }}">
    添加用户组
  </a>
  @if(if_route('system.group.edit'))
  <a class="nav-link active" href="#">
    编辑用户组
  </a>
  @endif
</nav>
