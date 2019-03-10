<form action="{{route('login')}}" method="post" id="loginForm">
    @csrf
    @php
        $placeholder = config_get('user.register_email', '', 'site')?'邮箱或':'';
        $placeholder .= config_get('user.register_mobile', '', 'site')?'手机号':'';
    @endphp
    <div class="form-group">
        <label>帐号</label>
        <input type="text" name="username" class="form-control" required placeholder="请输入{{$placeholder}}">
    </div>
    <div class="form-group">
        <label>密码</label>
        <input type="password" name="password" class="form-control" required
               placeholder="请输入不小于5位的登录密码">
    </div>
    <button class="btn btn-success btn-sm">登录帐号</button>
</form>