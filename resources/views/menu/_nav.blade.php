<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('site.menu.index'))}}"
     href="{{ route('site.menu.index',$site) }}">
    站点菜单
  </a>
  {{-- <a class="nav-link {{ active_class(if_route('site.site.menu.create'))}}"
  href="{{ route('site.site.menu.create',$site) }}">
  添加菜单
  </a> --}}
</nav>
