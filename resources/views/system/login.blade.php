<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录后台</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.4.1/css/bootstrap.min.css
">
  <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>

<body class="animated fadeInDownBig system-login">
  <form action="{{route('system.login')}}" method="post"
    class="d-flex flex-column justify-content-center align-items-center">
    @csrf
    <div class="card">
      <div class="card-header">
        登录后台
      </div>
      <div class="card-body">
        @include('layouts/error')
        <div class="form-group">
          <label for="username">帐号</label>
          <input type="text" value="{{old('username')}}" class="form-control" required name="username" id="username"
            placeholder="请输入后台登录帐号">
        </div>
        <div class="form-group">
          <label for="password">密码</label>
          <input type="password" class="form-control" required name="password" id="password" placeholder="后台登录密码">
        </div>
        <div class="form-group">
          <label for="password">验证码</label>
          <div class="input-group">
            <input type="text" name="code" class="form-control" placeholder="请输入验证码" aria-label="Recipient's username"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <img class="border" src="{{route('common.captcha')}}" onclick="this.src=this.src+'?_'+Math.random()"
                style="cursor:pointer">
            </div>
          </div>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember">
          <label class="form-check-label" for="remember">记住我</label>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" class="btn btn-primary">登录后台</but>
      </div>
    </div>
  </form>
</body>

</html>
