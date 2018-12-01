<ul class="navbar-nav">
    @foreach(module_admin_menus(explode('/', Route::getCurrentRoute()->uri)[0]) as $menu)
        @if(auth()->user()->hasAnyPermission($menu['permission']))
            <li class="nav-item" menu="role">
                <a class="nav-link" href="#role" role="button" aria-expanded="false"
                   aria-controls="sidebarPages">
                    <i class="{{$menu['icon']}}"></i> <strong>{{$menu['name']}}</strong>
                </a>
                <div class="collapse show" id="role">
                    <ul class="nav nav-sm flex-column">
                        @foreach($menu['menus'] as $m)
                            @can($m['permission'])
                                <li class="nav-item">
                                    <a href="{{$m['route']}}" class="nav-link">
                                        {{$m['name']}}
                                    </a>
                                </li>
                            @endcan
                        @endforeach
                    </ul>
                </div>
            </li>
        @endif
    @endforeach
</ul>