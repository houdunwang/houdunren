{{--顶部导航条--}}
<div class="header bg-light shadow-sm border-top border-info">
    <div class="container px-0 border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-se border-0">
            <a class="text-secondary" href="/"> <i class="fa fa-home"></i> 网站首页</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"></li>
                </ul>
                <div class="my-2 my-lg-0">
                    @auth()
                        <ul class="navbar-nav ">
                            @if($notifyCount = auth()->user()->unreadNotifications->count())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('member.notify.index')}}">
                                        消息
                                        <span class="badge badge-success rounded-pill align-top small"> {{$notifyCount}}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right rounded-0"
                                     aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('member')}}">修改资料</a>
                                    <a class="dropdown-item"
                                       href="{{route('user.home',auth()->user())}}">个人中心</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                    @guest()
                        <div class="form-inline my-2 my-lg-0">
                            <a href="{{route('register')}}" class="btn btn-outline-info btn-sm my-2 my-sm-0 mr-1">注册</a>
                            <a href="{{route('login')}}" class="btn btn-info btn-sm my-2 my-sm-0">登录</a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>