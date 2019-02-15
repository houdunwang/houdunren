<ul class="nav nav-tabs">
    <li role="presentation" class="{{active_class($name=='base','active')}}">
        <a href="{{route('setting.edit','base')}}">基本配置</a>
    </li>
    <li role="presentation" class="{{active_class($name=='upload','active')}}">
        <a href="{{route('setting.edit','upload')}}">上传配置</a>
    </li>
</ul>