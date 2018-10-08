<ul class="navbar-nav">
    @foreach($menus as $index=>$menu)
        <li class="nav-item" menu="{{$menu['name']}}">
            <a class="nav-link" href="#{{$menu['name']}}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                <i class="fe fe-settings"></i> {{$menu['title']}}
            </a>
            <div class="collapse {{active_class(Cookie::get('admin_menu_id')==$menu['name'],'show','')}}" id="{{$menu['name']}}">
                <ul class="nav nav-sm flex-column">
                    @can('Admin-config')
                        @foreach($menu['menu'] as $m)
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'base'])}}" class="nav-link ">
                                    {{$m['title']}}
                                </a>
                            </li>
                        @endforeach
                    @endcan
                </ul>
            </div>
        </li>
    @endforeach
</ul>
