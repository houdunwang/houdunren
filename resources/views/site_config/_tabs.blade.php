<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='info','active')}}" href="{{route('config.site.edit',[$site,'name'=>'info'])}}">
            网站信息
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='email','active')}}" href="{{route('config.site.edit',[$site,'name'=>'email'])}}">
            邮箱配置
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='aliyun','active')}}" href="{{route('config.site.edit',[$site,'name'=>'aliyun'])}}">
            阿里云
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class($name=='alipay','active')}}" href="{{route('config.site.edit',[$site,'name'=>'alipay'])}}">
            支付宝
        </a>
    </li>
</ul>