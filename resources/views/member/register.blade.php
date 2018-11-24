<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css">
    <title>会员注册</title>
    @include('layouts._hdjs')
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">
@include('layouts._message')
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
            <h1 class="display-4 text-center mb-3">
                注册
            </h1>
            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                注册帐号社区参与交流与学习 @csrf
            </p>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" name="name" class="form-control" placeholder="个性昵称" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="account" class="form-control" placeholder="请输入邮箱或手机号" value="{{old('account')}}" required>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control" placeholder="输入登录密码"  value="{{old('password')}}" required>
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="输入登录密码" value="{{old('password_confirmation')}}" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="输入验证码" name="code" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" value="{{old('code')}}" id="bt">发送验证码</button>
                    </div>
                </div>
                <button class="btn btn-lg btn-block btn-primary mb-3">注册</button>
                <div class="text-center">
                    <small class="text-muted text-center">
                        已有帐号? <a href="{{route('login')}}">登录</a>. <a href="{{route('password.reset')}}">找回密码</a>
                        . <a href="/">返回首页</a>
                    </small>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/Dashkit-1.1.2')}}/img/covers/auth-side-cover.jpg);"></div>
        </div>
    </div>
</div>
<script>
    require(['hdjs', 'bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('register.send.code')}}',
            //验证码等待发送时间
            timeout: '{{config_get('admin.base.code_expire')}}',
            //POST表单数据
            data: {"_token": "{{ csrf_token() }}"},
            //表单，手机号或邮箱的INPUT表单
            input: '[name="account"]'
        };
        hdjs.validCode(option);
    })
</script>
@stack('js')
</body>
</html>
