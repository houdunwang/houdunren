<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='base','active')}}" href="{{route('system.setting.edit','base')}}">
            基本配置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='upload','active')}}" href="{{route('system.setting.edit','upload')}}">
            上传配置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='aliyun','active')}}" href="{{route('system.setting.edit','aliyun')}}">
            阿里云
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='register','active')}}" href="{{route('system.setting.edit','register')}}">
            注册设置
        </a>
    </li>
</ul>