<div class="left-sidebar-scroll">
    <div class="left-sidebar-content">
        <ul class="sidebar-elements">
            @foreach(\HDModule::getMenus() as $title=> $groups)
                <li class="divider">{{$title}}</li>
                @foreach($groups as $group)
                    @if(\HDModule::hadPermission($group['permission'],'admin'))
                        <li class="parent">
                            <a href="#">
                                <i class="{{$group['icon']}}"></i> <span>{{$group['title']}}</span>
                            </a>
                            <ul class="sub-menu">
                                @foreach($group['menus'] as $menu)
                                    @if(HDModule::hadPermission($menu['permission'],'admin'))
                                        <li>
                                            <a href="{{$menu['url']}}">{{$menu['title']}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endforeach

            <li class="divider">技术支持</li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-view-web"></i><span>支持</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="layouts-primary-header.html">视频教程</a>
                    </li>
                    <li>
                        <a href="layouts-success-header.html">访问官网</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
