<div class="alert alert-secondary" role="alert">
    站点需要使用邮件发送功能时（如用户邮箱验证）必须正确设置邮箱配置
</div>
<div class="card">
    <div class="card-header">
        邮箱配置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="mb-1">发送方式
                <small class="text-secondary">(driver)</small>
            </label>
            <input type="text" class="form-control" name="driver" value="{{old('driver',$config['driver']??'smtp')}}">
            <span class="help-block text-muted small">
                支持:smtp、sendmail、mailgun、mandrill、ses、sparkpost、log、array
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">SMTP服务器地址
                <small class="text-secondary">(host)</small>
            </label>
            <input type="text" class="form-control" name="host" value="{{old('host',$config['host']??'')}}">
            <span class="help-block text-muted small">指定SMTP服务器的地址
                            <a href="https://help.aliyun.com/knowledge_detail/36687.html?spm=5176.7836659.2.15.QsbtO4"
                               target="_blank">阿里邮箱</a>
                            <a href="http://service.exmail.qq.com/cgi-bin/help?subtype=1&amp;id=28&amp;no=1000585"
                               target="_blank">腾讯邮箱</a>
                        </span>
        </div>
        <div class="form-group">
            <label class="mb-1">端口
                <small class="text-secondary">(port)</small>
            </label>
            <input type="text" class="form-control" name="port" value="{{old('port',$config['port']??25)}}">
            <span class="help-block text-muted small">
                指定SMTP服务器的地址, 如: 126邮箱为25
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">邮箱帐号
                <small class="text-secondary">(username)</small>
            </label>
            <input type="text" class="form-control" name="username" value="{{old('username',$config['username']??'')}}">
            <span class="header small text-secondary">发送邮箱登录帐号,一般情况下设置与发送邮箱一样</span>
        </div>
        <div class="form-group">
            <label class="mb-1">邮箱密码
                <small class="text-secondary">(password)</small>
            </label>
            <input type="{{config_get('base.field','password','system')}}" class="form-control" name="password" value="{{old('password',$config['password']??'')}}">
        </div>
        <div class="form-group">
            <label class="mb-1">发件人名称
                <small class="text-secondary">(from.name)</small>
            </label>
            <input type="text" class="form-control" name="from[name]"
                   value="{{old('from.name',array_get($config,'from.name')??'')}}">
            <span class="help-block text-secondary small">发件人的中文名称</span>
        </div>
        <div class="form-group">
            <label class="mb-1">发送邮箱
                <small class="text-secondary">(from.address)</small>
            </label>
            <input type="text" class="form-control" name="from[address]"
                   value="{{old('from.address',array_get($config,'from.address')??'')}}">
            <span class="help-block text-secondary small">收件方回复使用的邮箱，一般设置成和邮箱帐号一至</span>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        测试
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="mb-1">测试邮箱
                <small class="text-secondary">(test_mail)</small>
            </label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="test_mail"
                       value="{{old('test_mail',$config['test_mail']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="mailTest()">发送测试邮件</button>
                </div>
            </div>
            <span class="help-block text-secondary small">
                检测邮箱配置的测试邮箱，需要先保存配置后再测试
            </span>
        </div>
    </div>
</div>
@push('js')
    <script>
        function mailTest() {
            require(['axios', 'hdjs'], function (axios, hdjs) {
                axios.post("{{route('site.send.test.mail',$site)}}", {email: $("[name=test_mail]").val()})
                    .then(function (response) {
                        hdjs.info(response.data.message);
                    }).catch(function (error) {
                        hdjs.info(error.response.data.message);
                })
            })

        }
    </script>
@endpush