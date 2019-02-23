<div class="card">
    <div class="card-header">
        邮箱配置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>邮箱类型</label>
            <input type="text" class="form-control" name="driver" value="{{old('driver',$config['driver']??'')}}">
        </div>
        <div class="form-group">
            <label class="mb-1">主机</label>
            <input type="text" class="form-control" name="host" value="{{old('port',$config['host']??25)}}">
        </div>
        <div class="form-group">
            <label class="mb-1">端口</label>
            <input type="text" class="form-control" name="port" value="{{old('port',$config['port']??25)}}">
        </div>
        <div class="form-group">
            <label class="mb-1">发件人名称</label>
            <input type="text" class="form-control" name="from[name]" value="{{old('from.name',array_get($config,'from.name')??'')}}" placeholder="发件人的中文名称">
        </div>
        <div class="form-group">
            <label class="mb-1">发送邮箱</label>
            <input type="text" class="form-control" name="from[address]" value="{{old('from.address',array_get($config,'from.address')??'')}}" placeholder="收件方回复使用的邮箱">
        </div>
        <div class="form-group">
            <label class="mb-1">邮箱帐号</label>
            <input type="text" class="form-control" name="username" value="{{old('username',$config['username']??'')}}" placeholder="发送邮箱登录帐号">
            <span class="header small text-secondary">一般情况下设置与发送邮箱一样</span>
        </div>
        <div class="form-group">
            <label class="mb-1">邮箱密码</label>
            <input type="text" class="form-control" name="password" value="{{old('password',$config['password']??'')}}">
        </div>
        <div class="form-group">
            <label class="mb-1">加密方式</label>
            <input type="text" class="form-control" name="encryption" value="{{old('encryption',$config['encryption']??'')}}">
        </div>
    </div>
</div>