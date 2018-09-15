<div class="card">
    <div class="card-header">
        <div><span class="fe fe-user mr-1"></span> 资料设置</div>
    </div>
    <div class="card-body">
        <div class="nav flex-column nav-pills small">
            <a href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}"
               class="nav-link {{active_class(if_query('type','icon'),'active','text-muted')}}">
                头像设置
            </a>
            <a href="{{route('member.user.edit',[auth()->user(),'type'=>'info'])}}"
               class="nav-link {{active_class(if_query('type','info'),'active','text-muted')}}">
                个人信息
            </a>
            <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}"
               class="nav-link {{active_class(if_query('type','password'),'active','text-muted')}}">
                修改密码
            </a>
        </div>
    </div>
    <div class="card-header">
        <div><span class="fe fe-user mr-1"></span> 课程管理</div>
    </div>
    <div class="card-body">
        <div class="nav flex-column nav-pills small">
            <a href="{{route('edu.lesson.index')}}"
               class="nav-link {{active_class(if_route('edu.lesson.index'),'active','text-muted')}}">
                课程列表
            </a>
            <a href="{{route('edu.lesson.create')}}"
               class="nav-link {{active_class(if_route('edu.lesson.create'),'active','text-muted')}}">
                发布课程
            </a>
        </div>
    </div>
</div>
