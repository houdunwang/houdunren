<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员登录</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.4.1/css/bootstrap.min.css
">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body class="login animated fadeInDownBig d-flex flex-column justify-content-center align-items-center">
    <form action="{{route('login')}}?redirect={{ request()->query('redirect') }}" method="post">
        @csrf
        <div class="card bg-white animated fadeInDownBig" id="app">
            <div class="card-header">登录帐号</div>
            <div class="card-body">
                @include('layouts.error')
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" class="form-control" required name="username" id="username"
                        placeholder="用户名/手机号/邮箱" />
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" required name="password" id="password"
                        placeholder="请输入登录密码" />
                </div>
                <div class="form-group">
                    <label for="password">验证码</label>
                    <div class="input-group">
                        <input type="text" name="code" class="form-control" placeholder="请输入验证码"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                            <img class="border" src="/common/captcha" onclick="this.src=this.src+'?_'+Math.random()"
                                style="cursor:pointer;height:35px;" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" />
                    <label class="form-check-label" for="remember">记住我</label>
                    <div class="d-inline">
                        <a href="{{route('register')}}">注册</a>
                        {{-- @if ($site) --}}
                        <a href="">忘记密码</a>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">登录</button>
            </div>
        </div>
    </form>
</body>

</html>

