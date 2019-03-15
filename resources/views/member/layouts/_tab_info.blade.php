<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('member.info.index'),'active')}}"
           href="{{module_link('member.info.index')}}">
            资料修改
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('member.change-password.index'),'active')}}"
           href="{{module_link('member.change-password.index')}}">
            修改密码
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('member.icon.index'),'active')}}"
           href="{{module_link('member.icon.index')}}">
            设置头像
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{active_class(if_route('member.mail.index'),'active')}}"
           href="{{module_link('member.mail.index')}}">
            绑定邮箱
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('member.mobile.index'),'active')}}"
           href="{{module_link('member.mobile.index')}}">
            修改手机
        </a>
    </li>
</ul>