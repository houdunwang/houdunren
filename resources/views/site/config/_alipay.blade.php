<div class="alert alert-secondary small">
    <div class="alert-text">
        <i class="fa fa-info-circle"></i>
        具体配置项的含义可查看 <a target="_blank" href="https://github.com/houdunwang/alipay">https://github.com/houdunwang/alipay</a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>应用ID<small class="text-secondary">(app_id)</small></label>
            <input type="text" class="form-control" name="app_id" value="{{$config['app_id']??''}}">
            <span class="help-block text-muted small">您的应用的APPID</span>
        </div>
        <div class="form-group">
            <label>编码格式<small class="text-secondary">(charset)</small></label>
            <input type="text" class="form-control" name="charset" value="{{$config['charset']??'UTF-8'}}">
            <span class="help-block text-muted small">编码格式一般使用UTF-8不需要更改</span>
        </div>
        <div class="form-group">
            <label>签名方式<small class="text-secondary">(sign_type)</small></label>
            <input type="text" class="form-control" name="sign_type" value="{{$config['sign_type']??'RSA2'}}">
            <span class="help-block text-muted small">签名方式一般不需要更改</span>
        </div>
        <div class="form-group">
            <label>支付宝网关<small class="text-secondary">(gatewayUrl)</small></label>
            <input type="text" class="form-control" name="gatewayUrl" value="{{$config['gatewayUrl']??'https://openapi.alipay.com/gateway.do'}}">
            <span class="help-block text-muted small">支付宝网关一般不需要更改</span>
        </div>
        <div class="form-group">
            <label>商户私钥<small class="text-secondary">(merchant_private_key)</small></label>
            <textarea rows="3" class="form-control"
                      name="merchant_private_key">{{$config['merchant_private_key']??''}}</textarea>
            <span class="help-block text-muted small">使用支付宝提供的签名生成工具创建，注意不要有换行</span>
        </div>
        <div class="form-group">
            <label>支付宝公钥<small class="text-secondary">(alipay_public_key)</small></label>
            <textarea rows="3" class="form-control"
                      name="alipay_public_key">{{$config['alipay_public_key']??''}}</textarea>
            <span class="help-block text-muted small">
                支付宝公钥,查看地址：
                <a href="https://openhome.alipay.com/platform/keyManage.htm" class="text-primary">
                    https://openhome.alipay.com/platform/keyManage.htm
                </a>
                对应APPID下的支付宝公钥。使用支付宝提供的签名生成工具创建,，注意不要有换行
            </span>
        </div>
    </div>
</div>