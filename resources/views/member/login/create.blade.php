<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会员登录</title>
    <!--会员中心父级模板-->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
</head>
<body>
@include('layouts.message')
<div class="container {{route_class()}}">
    <h1 class="big-title text-muted">会员登录</h1>
    <form class="form-horizontal" role="form" action="{{route('login')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control input-lg" name="name"
                       placeholder="请输入邮箱或手机号" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group input-group-lg">
                    <input type="password" class="form-control" name="password" placeholder="请输入密码"
                           required="required"/>
                    <span class="input-group-btn">
                            <a class="btn btn-default"
                               href="">忘记密码？</a>
                        </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success btn-lg btn-block">登录</button>
            </div>
        </div>
    </form>
    <p class="remind">还没有帐号？ <a href="">注册新帐号</a></p>
    <p class="remind" style="margin-bottom: 50px;">
        <a href="/">返回首页</a>
    </p>
</div>
@stack('js')
</body>
</html>