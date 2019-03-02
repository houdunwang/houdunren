<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link" href="{{route('system.setting.index')}}">
            系统设置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('cloud.update.check'),'active')}}" href="{{route('cloud.update.check')}}">
            一键更新
        </a>
    </li>
</ul>