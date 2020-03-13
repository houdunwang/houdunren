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

<body
  class="animated fadeInDownBig {{ route_class() }} d-flex flex-column justify-content-center align-items-center login">
  <form action="{{route('member.login')}}" method="post">
    @csrf
    <div class="card bg-white animated fadeInDownBig" id="app">
      <div class="card-header">登录帐号</div>
      <div class="card-body">
        @include('layouts.error')
        <div class="form-group">
          <label for="username">用户名</label>
          <input type="text" class="form-control" required name="username" id="username" placeholder="用户名/手机号/邮箱" />
        </div>
        <div class="form-group">
          <label for="password">密码</label>
          <input type="password" class="form-control" required name="password" id="password" placeholder="请输入登录密码" />
        </div>
        <div class="form-group">
          <label for="password">验证码</label>
          <div class="input-group">
            <input type="text" name="code" class="form-control" placeholder="请输入验证码" aria-label="Recipient's username"
              aria-describedby="basic-addon2" />
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
            <a href="">注册</a>
            <a href="">忘记密码</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" class="btn btn-primary">登录</button>
      </div>
    </div>
  </form>
  {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js'></script>
  <!-- 引入样式 -->
  <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
  <!-- 引入组件库 -->
  <script src="https://unpkg.com/element-ui/lib/index.js"></script>
  <script>
    new Vue({
      el:"#app",
      data:{
        form:{name:'',password:'',captcha:''}
      },
      methods:{
        async submit(){
          let response = await axios.post(`{{route('user.member.login')}}`)
  console.log(response);
  }
  }
  })
  </script> --}}
</body>

</html>
