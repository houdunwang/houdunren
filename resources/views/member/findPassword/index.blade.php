<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>找回密码</title>
    @include('layouts.hdjs')
</head>
<body class="">
@include('layouts.message')
<div class="border-top border-danger" style="border-width: 5px !important;"></div>
<div class="container">
    <div class="d-none d-sm-block" style="margin-top: 200px;"></div>
    <div class="row">
        <div class="col-md-8 col-12 m-auto">
            <form action="{{route('findPassword.store')}}" method="post">
                @csrf
                <input type="hidden" name="site_id" value="{{\site()['id']}}">
                <div class="mt-5">
                    <div class="card shadow-lg">
                        <div class="card-header bg-red text-light">
                            <h5 class="p-0 m-0"><i class="fa fa-user"></i> 找回密码</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>帐号</label>
                                <input type="text" name="username" class="form-control" required
                                       placeholder="请输入{{trim(implode('或',$usersPlaceholder),'或')}}"
                                       value="{{old('username')}}">
                            </div>
                            <div class="form-group">
                                <label>新密码</label>
                                <input type="password" name="password" class="form-control" required
                                       placeholder="请输入不小于5位的登录密码" value="{{old('password')}}">
                            </div>
                            <div class="form-group">
                                <label>确认密码</label>
                                <input type="password" name="password_confirmation" class="form-control" required
                                       placeholder="请输入不小于5位的登录密码" value="{{old('password_confirmation')}}">
                            </div>
                            @if (config_get('user.verification','','site'))
                                <div class="form-group">
                                    <label>验证码</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="code" placeholder="请输入验证码"
                                               value="{{old('code')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="sendCode">
                                                发送验证码
                                            </button>
                                        </div>
                                    </div>
                                    <script>
                                        send_code("#sendCode", '[name="username"]');
                                    </script>
                                </div>
                            @endif
                            <button class="btn btn-secondary btn-sm">更新密码</button>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="/" class="mr-2"><i class="fa fa-home"></i> 网站首页 </a>
                            <a href="{{route('login')}}" class="mr-2"><i class="fa fa-user-plus"></i> 登录帐号</a>
                            <a href="{{route('register.index')}}" class="mr-2"><i class="fa fa-archive"></i> 用户注册</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>