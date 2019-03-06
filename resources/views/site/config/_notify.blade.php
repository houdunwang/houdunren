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
            <label>短信签名<small class="text-secondary">(app_id)</small></label>
            <input type="text" class="form-control" name="sign" value="{{$config['sign']??''}}">
        </div>
        <div class="form-group">
            <label>短信模板<small class="text-secondary">(app_id)</small></label>
            <input type="text" class="form-control" name="template" value="{{$config['template']??'SMS_12840367'}}">
        </div>
        <div class="form-group">
            <label>模板变量<small class="text-secondary">(vars)</small></label>
            <textarea name="vars" class="form-control" rows="3">{{$config['vars']??''}}</textarea>
            <small class="text-secondary">
                如: "code:2019,product:商城"，如果使用 `SMS_12840367` 时不需要设置模板变量。
            </small>
        </div>
    </div>
</div>