<div class="alert alert-secondary" role="alert">
    需要先为站点的某个模块设置域名，然后通过域名访问才有效。
</div>
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
        <hr>
        <div class="form-group">
            <label>
                必须设置头像
                <small class="text-secondary">validate_icon</small>
                <span class="help-block small">如果用户没设置头像将强制要求设置</span>
            </label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="validate_icon" type="radio" id="validate_icon_open" value="1"
                            {{active_class(old('validate_icon',$config['validate_icon']??false),'checked')}}>
                    <label class="form-check-label" for="validate_icon_open">
                        开启
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="validate_icon" type="radio" id="validate_icon_close"
                           value="0"
                            {{active_class(old('validate_icon',($config['validate_icon']??false)==0),'checked')}}>
                    <label class="form-check-label" for="validate_icon_close">
                        关闭
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        界面设置
    </div>
    <div class="card-body">
<div class="form-group">
                <label>登录与注册背景图片</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="loginImage"
                           value="{{old('loginImage',$config['loginImage']??'')}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="upload_image('loginImage')" type="button">
                            选择文件
                        </button>
                    </div>
                </div>
                <img class="img-thumbnail d-block mt-1" id="qr"
                     src="{{old('loginImage',$config['loginImage']??asset('images/system/nopic.jpg'))}}" style="width: 150px;">
            </div>
    </div>
</div>