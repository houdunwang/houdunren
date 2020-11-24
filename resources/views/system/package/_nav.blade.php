<nav class="nav nav-tabs">
  <a class="nav-link" href="{{ route('system.index') }}">
    <i class="fas fa-home    "></i>
  </a>

  <a class="nav-link {{ active_class(if_route('system.package.index'))}}" href="{{ route('system.package.index') }}">
    套餐列表
  </a>

  <a class="nav-link {{ active_class(if_route('system.package.create'))}}" href="{{ route('system.package.create') }}">
    添加套餐
  </a>
  @if(if_route('system.package.edit'))
  <a class="nav-link active" href="#">
    编辑套餐
  </a>
  @endif
</nav>
