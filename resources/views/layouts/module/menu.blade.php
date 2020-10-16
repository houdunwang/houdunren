@inject('permissionService', 'App\Services\PermissionService')
@inject('menuService', 'App\Services\MenuService')

@foreach (module()['menus'] as $index=>$menu)
@if (($menu['show']??true) && $menuService->showMenuGroup(site(),module(),$menu))

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo{{ $index }}"
    aria-expanded="true" aria-controls="collapseTwo{{ $index }}">
    @if (isset($menu['icon']))
    <i class="{{ $menu['icon'] }}"></i>
    @else
    <i class="fa fa-folder-o"></i>
    @endif
    <span>{{ $menu['title'] }}</span>
  </a>
  <div id="collapseTwo{{ $index }}" class="collapse {{ $menuService->isCurrentMenuGroup($index)?'show':'' }}"
    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      @foreach ($menu['items'] as $i=>$item)
      @if(access($item['permission']))
      <a class="collapse-item" href="{{ route('site.menu.show',[site(),$menu['type'],$index.'-'.$i]) }}">
        {{ $item['title'] }}
      </a>
      @endif
      @endforeach
    </div>
  </div>
</li>
@endif
@endforeach

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
  系统菜单
</div>
<li class="nav-item">
  <a class="nav-link" href="{{ route('site.module.index',site()['id']) }}">
    <i class="fas fa-fw fa-archive"></i>
    <span>所有模块</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>站点列表</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/" target="_blank">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>网站首页</span>
  </a>
</li>
