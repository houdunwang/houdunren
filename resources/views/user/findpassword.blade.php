<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css">
    <title>找回密码</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
            <div class="text-center">
                <img src="{{asset('org/Dashkit-1.1.2/img/illustrations/coworking.svg')}}" alt="..." class="img-fluid">
            </div>
        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
            <h1 class="display-4 text-center mb-3">找回密码</h1>
            <p class="text-muted text-center mb-5">
                感谢你使用 {{system_config('site.webname')}} 网站服务
            </p>
            <form action="{{route('changePassword')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="account" class="form-control" placeholder="请输入邮箱或手机号" value="2300071698@qq.com"  value="{{old('account')}}">
                </div>
                <div class="form-group">
                    <label>新密码</label>
                    <input type="password" name="password" class="form-control" placeholder="输入登录密码"  value="{{old('password')}}">
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="输入登录密码" value="{{old('password_confirmation')}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="输入验证码" name="code">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" value="{{old('code')}}" id="bt" value="{{old('code')}}">发送验证码</button>
                    </div>
                </div>
                <button class="btn btn-lg btn-block btn-primary mb-3">发送</button>
                <div class="text-center">
                    <small class="text-muted text-center">
                        已有帐号? <a href="{{route('login')}}">登录</a>. <a href="{{route('findPassword')}}">找回密码</a>
                        . <a href="/">返回首页</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts._hdjs')
@include('layouts._message')
<script>
    require(['hdjs', 'bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('common.code.send')}}',
            //验证码等待发送时间
            timeout: '{{system_config('base.code_expire')}}',
            //POST表单数据
            data: {"_token": "{{ csrf_token() }}"},
            //表单，手机号或邮箱的INPUT表单
            input: '[name="account"]'
        };
        hdjs.validCode(option);
    })
</script>
</body>
</html>
