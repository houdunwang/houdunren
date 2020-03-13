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

<body class="animated fadeInDownBig member-login">
  <form action="{{route('member.mobile.store')}}" method="post" @submit.prevent="submit" id="app"
    class="d-flex flex-column justify-content-center align-items-center">
    @csrf
    <div class="card bg-white">
      <div class="card-header">
        绑定手机号
      </div>
      <div class="card-body">
        @include('layouts/error')
        <div class="form-group">
          <input type="text" v-model="form.mobile" class="form-control" required name="mobile" id="mobile"
            placeholder="请输入手机号">
        </div>
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="captcha" v-model="form.captcha" class="form-control" placeholder="请输入验证码"
              id="captcha" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <img class="border" src="{{route('common.captcha')}}" onclick="this.src=this.src+'?_'+Math.random()"
                style="cursor:pointer;height:35px;">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control" v-model="form.code" placeholder="请输入收到的手机验证码" name="code" id="code"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <a href="#" class="input-group-text" id="basic-addon2" @click.prevent="send">发送验证码</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" class="btn btn-primary">保存确定</but>
      </div>
    </div>
  </form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js'></script>
  <script>
    new Vue({
      el:"#app",
      data:{
        form:{
          mobile:'18600276067',
          captcha:'',
          code:'',
        }
      },
      methods:{
        submit(){
          axios.post(`{{route('member.mobile.store')}}`,this.form).then(response=>{
            console.log(response);
          })
        }
      }
    })

  </script>
</body>

</html>
