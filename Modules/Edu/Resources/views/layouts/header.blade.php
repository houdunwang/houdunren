<div class="header shadow bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light pt-3 pb-3 pl-md-0 pr-md-0">
            <a href="/" class="navbar-brand text-muted font-weight-bold router-link-exact-active router-link-active">
                <i aria-hidden="true" class="fa fa-code text-info font-weight-bolder"></i>
                houdunren
            </a>
            <button type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler d-lg-none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="collapsibleNavId" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 font-weight-bold">
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.system.index') }}" class="nav-link">系统学习</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.lesson.index') }}" class="nav-link">实战课程</a></li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.video.index') }}" class="nav-link">最近更新</a></li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.topic.index') }}" class="nav-link">话题讨论</a></li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.sign.index') }}" class="nav-link">签到打卡</a></li>
                    <li class="nav-item pr-2">
                        <a href="http://doc.houdunren.com" class="nav-link">在线文档</a></li>
                    <li class="nav-item pr-2">
                        <a href="https://www.houdunwang.com" target="_blank" class="nav-link">训练营</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('Edu.front.subscribe.index') }}" class="nav-link">订阅会员</a>
                    </li>
                </ul>@auth
                <div class="form-inline my-2 my-lg-0">
                    <div class="nav-item pr-2 dropdown">
                        <a href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link dropdown-toggle d-flex align-items-center text-secondary">
                            <span class="mr-2 " style="width: 25px; height: 25px; line-height: 25px; font-size: 18px;">
                                <img src="{{ user('avatar') }}" class="rounded-circle" style="width:25px;height: 25px;">
                            </span>
                            {{ user('name')??'匿名' }}
                        </a>
                        <div aria-labelledby="dropdownId" class="dropdown-menu">
                            <a href="{{ route('member.base.index') }}" class="dropdown-item mb-2 mt-2">修改资料</a>
                            <a href="{{ route('member.avatar.index') }}" class="dropdown-item mb-2">头像设置</a>
                            <a href="{{ route('member.password.index') }}" class="dropdown-item mb-2">修改密码</a>
                            <div class="dropdown-divider"></div>
                            <a href="/edu/member/order" class="dropdown-item mb-2">我的定单</a>
                            <a href="/edu/member/lesson" class="dropdown-item mb-2">课程收藏</a>
                            <a href="/edu/member/video" class="dropdown-item mb-2">视频收藏</a>
                            <div class="dropdown-divider"></div>
                            <a href="/edu/center/topic/1" class="dropdown-item mb-2">我的主页</a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item mb-2">退出登录</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="form-inline mr-3">
                    <a href="/login" type="button" class="btn btn-info mr-1 btn-sm">登录</a>
                    <a data-v-5c58d3ad="" href="/register" type="button" class="btn btn-outline-info btn-sm">注册</a>
                </div>
                @endauth
            </div>
        </nav>
    </div>
</div>
