<ul class="navbar-nav">
    <li class="nav-item">
        <a href="/admin" class="nav-link {{\HDModule::currentModule()=='Admin'?'text-info':''}} ">系统设置</a>
    </li>
    <li class="nav-item">
        <a href="/article" class="nav-link {{\HDModule::currentModule()=='Article'?'text-info':''}} ">文章系统</a>
    </li>
    <li class="nav-item">
        <a href="/member" class="nav-link">会员粉丝</a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
           class="nav-link dropdown-toggle">
            扩展插件 <span class="mdi mdi-caret-down"></span>
        </a>
        <div role="menu" class="dropdown-menu">
            @foreach(\HDModule::getModulesLists([]) as $module)
            <a href="/{{strtolower($module['name'])}}" class="dropdown-item">{{$module['title']}}</a>
            @endforeach
        </div>
    </li>
</ul>
