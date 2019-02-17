<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='base','active')}}" href="{{route('setting.edit','base')}}">
            基本配置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='upload','active')}}" href="{{route('setting.edit','upload')}}">
            上传配置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='register','active')}}" href="{{route('setting.edit','register')}}">
            注册设置
        </a>
    </li>
</ul>