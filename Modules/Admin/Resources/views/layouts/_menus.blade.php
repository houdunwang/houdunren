<div class="left-sidebar-scroll">
    <div class="left-sidebar-content">
        <ul class="sidebar-elements">
            @if($groups = \HDModule::getMenuByModule())
                @foreach($groups as $group)
                    <li class="parent open">
                        <a href="#">
                            <i class="{{$group['icon']}}"></i> <span>{{$group['title']}}</span>
                        </a>
                        <ul class="sub-menu">
                            @foreach($group['menus'] as $menu)
                                @if(HDModule::hadPermission($menu['permission'],'admin'))
                                    <li>
                                        <a pjax href="{{$menu['url']}}">{{$menu['title']}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif

            {{--<li class="divider">技术支持</li>--}}
            <li class="parent"><a href="#"><i class="icon mdi mdi-view-web"></i><span>技术支持</span></a>
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
