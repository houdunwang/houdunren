@inject('menuService', 'App\Services\MenuService')
<hr class="sidebar-divider">
<div class="sidebar-heading">
  {{ $title }}
</div>

@foreach ($menus as $index=>$menu)
@if (($menu['show']??true) && $menuService->checkMenuGroup(site(),module(),$menu))
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo{{ $tag.$index }}"
     aria-expanded="true" aria-controls="collapseTwo{{ $index }}">
    @if (isset($menu['icon']))
    <i class="{{ $menu['icon'] }}"></i>
    @else
    <i class="fa fa-folder-o"></i>
    @endif
    <span>{{ $menu['title'] }}</span>
  </a>
  <div id="collapseTwo{{$tag.$index }}" class="collapse {{ $menuService->isCurrentMenuGroup($tag,$index)?'show':'' }}"
       aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      @foreach ($menu['items'] as $i=>$item)
      @if(access($item['permission']))
      <a class="collapse-item" href="{{ route('site.menu.show',[site(),$tag,$index.'-'.$i]) }}">
        {{ $item['title'] }}
      </a>
      @endif
      @endforeach
    </div>
  </div>
</li>
@endif
@endforeach
