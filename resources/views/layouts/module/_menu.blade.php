@inject('menuService', 'App\Services\MenuService')
<hr class="sidebar-divider">
<div class="sidebar-heading">
  模块业务
</div>
@foreach (module()['menus'] as $index=>$menu)
@if (($menu['show']??true) && $menuService->checkMenuGroup(site(),module(),$menu))
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
  <div id="collapseTwo{{$index }}" class="collapse {{ $menuService->isCurrentMenuGroup($index)?'show':'' }}"
       aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      @foreach ($menu['items'] as $i=>$item)
      @if(access($item['permission']))
      <a class="collapse-item" href="{{ route('module.menu.show',$index.'-'.$i) }}">
        {{ $item['title'] }}
      </a>
      @endif
      @endforeach
    </div>
  </div>
</li>
@endif
@endforeach
