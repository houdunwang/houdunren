@inject('permissionService', 'App\Services\PermissionService')
@inject('menuService', 'App\Services\MenuService')

@foreach (module()['menus'] as $index=>$menu)
@if ($permissionService->checkModuleMenuPermission($menu))
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo{{ $index }}"
        aria-expanded="true" aria-controls="collapseTwo{{ $index }}">
        @if (isset($menu['icon']))
        <i class="{{ $menu['icon'] }}"></i>
        @else
        <i class="fas fa-fw fa-folder"></i>
        @endif
        <span>{{ $menu['title'] }}</span>
    </a>
    <div id="collapseTwo{{ $index }}" class="collapse {{ $menuService->isMenuGroup($menu)?'show':'' }}"
        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @foreach ($menu['items'] as $item)
            @can($item['permission'])
            <a class="collapse-item" href="{{ isset($item['route'])?route($item['route']):'' }}">
                {{ $item['title'] }}
            </a>
            @endcan
            @endforeach
        </div>
    </div>
</li>
@endif
@endforeach

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    站点配置
</div>
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>站点列表</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>微信公众号</span></a>
</li>
