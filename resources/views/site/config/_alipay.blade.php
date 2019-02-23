<div class="card">
    <div class="card-body">
        <div class="alert alert-info">
            <div class="alert-text">
                <i class="fa fa-info-circle"></i>
                具体配置项的含义可查看 <a target="_blank" href="https://github.com/houdunwang/alipay">https://github.com/houdunwang/alipay</a>
            </div>
        </div>
        <div class="form-group">
            <label>应用ID</label>
            <input type="text" class="form-control" name="app_id" value="{{$config['app_id']??''}}">
            <span class="help-block text-muted small">您的应用的APPID</span>
        </div>
        <div class="form-group">
            <label>编码格式</label>
            <input type="text" class="form-control" name="charset" value="{{$config['charset']??''}}">
            <span class="help-block text-muted small">charset：编码格式一般使用UTF-8不需要更改</span>
        </div>
        <div class="form-group">
            <label>签名方式</label>
            <input type="text" class="form-control" name="sign_type" value="{{$config['sign_type']??''}}">
            <span class="help-block text-muted small">sign_type：签名方式一般不需要更改</span>
        </div>
        <div class="form-group">
            <label>支付宝网关</label>
            <input type="text" class="form-control" name="gatewayUrl" value="{{$config['gatewayUrl']??''}}">
            <span class="help-block text-muted small">gatewayUrl：支付宝网关一般不需要更改</span>
        </div>
        <div class="form-group">
            <label>商户私钥</label>
            <textarea rows="3" class="form-control"
                      name="merchant_private_key">{{$config['merchant_private_key']??''}}</textarea>
            <span class="help-block text-muted small">merchant_private_key：使用支付宝提供的签名生成工具创建，注意不要有换行</span>
        </div>
        <div class="form-group">
            <label>支付宝公钥</label>
            <textarea rows="3" class="form-control"
                      name="alipay_public_key">{{$config['alipay_public_key']??''}}</textarea>
            <span class="help-block text-muted small">
            alipay_public_key：支付宝公钥,查看地址：
                <a href="https://openhome.alipay.com/platform/keyManage.htm">https://openhome.alipay.com/platform/keyManage.htm</a>
            对应APPID下的支付宝公钥。使用支付宝提供的签名生成工具创建,，注意不要有换行
            </span>
        </div>
    </div>
</div>