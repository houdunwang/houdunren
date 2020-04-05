<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>用户登录</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.4.1/css/bootstrap.min.css
">
  <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body class="login animated fadeInDownBig d-flex flex-column justify-content-center align-items-center ">
  <form action="{{route('register')}}" method="post"
    class="d-flex flex-column justify-content-center align-items-center">
    @csrf
    <div class="card bg-white">
      <div class="card-header">
        用户注册
      </div>
      <div class="card-body">
        @include('layouts/error')
        <div class="form-group">
          <label for="username">用户名</label>
          <input type="text" value="{{old('name')}}" class="form-control" required name="name" id="username"
            placeholder="请输入字母组成的用户名">
        </div>
        <div class="form-group">
          <label for="username">昵称</label>
          <input type="text" value="{{old('nickname')}}" class="form-control" required name="nickname" id="username"
            placeholder="起个有个性的昵称吧">
        </div>
        <div class="form-group">
          <label for="password">密码</label>
          <input type="password" class="form-control" required name="password" id="password" placeholder="再次输入登录密码">
        </div>
        <div class="form-group">
          <label for="password">确认密码</label>
          <input type="password" class="form-control" required name="password_confirmation" id="password"
            placeholder="请输入确认密码">
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
        <div class="text-muted">
          已有账号，<a href=" {{route('login')}}">去登录 </a>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" class="btn btn-primary">登录</button>
      </div>
    </div>
  </form>
  <style>

  </style>
</body>

</html>
