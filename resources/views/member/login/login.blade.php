<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会员登录</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    @include('layouts.hdjs')
</head>

<body>
    @include('layouts.message')
    <div class="border-top border-info" style="border-width: 5px !important;"></div>
    <div class="container mt-sm-5">
        <div class="d-none d-sm-block mt-5">
        </div>
        <div class="mt-5">
            <div class="row">
                <div class="col-sm-8 m-auto col-12">
                    <div class="card shadow-lg bg-light">
                        <div class="card-header bg-info text-light">
                            <h5 class="m-0"><i class="fa fa-user"></i> 用户登录</h5>
                        </div>
                        <div class="card-body">
                            @include('member.login._form')
                        </div>
                        <div class="card-footer text-muted">
                            <a href="/" class="mr-2"><i class="fa fa-home"></i> 网站首页 </a>
                            <a href="{{route('register.index')}}" class="mr-2"><i class="fa fa-user-plus"></i> 注册帐号</a>
                            <a href="{{route('findPassword.index')}}" class="mr-2"><i class="fa fa-archive"></i>
                                找回密码</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
