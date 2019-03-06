<div class="card mt-3">
    <div class="card-header">
        消息通知
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>
                短信/邮件发送间隔时间
                <small class="text-secondary">message_timeout</small>
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="message_timeout"
                       value="{{old('message_timeout',$config['message_timeout']??60)}}">
                <div class="input-group-append">
                    <span class="input-group-text">秒</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        阿里云设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>短信签名<small class="text-secondary">(sign)</small></label>
            <input type="text" class="form-control" name="sign" value="{{$config['sign']??''}}">
        </div>
        <div class="form-group">
            <label>短信模板<small class="text-secondary">(template)</small></label>
            <input type="text" class="form-control" name="template" value="{{$config['template']??'SMS_12840367'}}">
        </div>
        <div class="form-group">
            <label>模板变量<small class="text-secondary">(vars)</small></label>
            <textarea name="vars" class="form-control" rows="3">{{$config['vars']??''}}</textarea>
            <small class="text-secondary">
                如: "code:2019,product:商城"，如果使用 `SMS_12840367` 时不需要设置模板变量。
            </small>
        </div>
        <div class="form-group">
            <label class="mb-1">短信发送测试
                <small class="text-secondary">(mobile)</small>
            </label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="mobile" placeholder="请输入手机号"
                       value="{{old('mobile',$config['mobile']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="mobileTest()">发送手机短信</button>
                </div>
            </div>
            <span class="help-block text-secondary small">
                检测配置的测试手机号，需要先保存配置后再测试
            </span>
        </div>
    </div>
</div>
@push('js')
    <script>
        function mobileTest() {
            require(['axios', 'hdjs'], function (axios, hdjs) {
                axios.post("{{route('site.send.test.mobile',$site)}}", {mobile: $("[name=mobile]").val()})
                    .then(function (response) {
                        hdjs.info(response.data.message);
                    }).catch(function (error) {
                    hdjs.info(error.response.data.message);
                })
            })

        }
    </script>
@endpush