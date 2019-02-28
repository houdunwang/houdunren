<div class="card">
    <div class="card-header">
        登录注册相关
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>注册类型</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="register_email" type="checkbox" id="register_email" value="1"
                            {{active_class(old('register_email',$config['register_email']??false),'checked')}}>
                    <label class="form-check-label" for="register_email">
                        邮箱注册
                        <small class="text-secondary">register_email</small>
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="register_mobile" type="checkbox" id="register_mobile"
                           value="1"
                            {{active_class(old('register_mobile',$config['register_mobile']??false),'checked')}}>
                    <label class="form-check-label" for="register_mobile">
                        手机号注册
                        <small class="text-secondary">register_mobile</small>
                    </label>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label>登录与注册验证码
                <small class="text-secondary">verification</small>
            </label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="verification" type="radio" id="verification_open" value="1"
                            {{active_class(old('verification',$config['verification']??false),'checked')}}>
                    <label class="form-check-label" for="verification_open">
                        开启
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="verification" type="radio" id="verification_close"
                           value="0"
                            {{active_class(old('verification',($config['verification']??false)==0),'checked')}}>
                    <label class="form-check-label" for="verification_close">
                        关闭
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>