<ul class="nav nav-tabs nav-tabs-sm mb-4">
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'site'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','site'))}}">
            网站信息
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'email'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','email'))}}">
            邮箱配置
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'upload'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','upload'))}}">
            上传设置
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'wechat'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','wechat'))}}">
            微信公众号
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'aliyun'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','aliyun'))}}">
            阿里云
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'alipay'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','alipay'))}}">
            支付宝
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.config.edit',['name'=>'base'])}}"
           class="nav-link mr-3 {{active_class(if_route_param('name','base'))}}">
            其他配置
        </a>
    </li>
</ul>
