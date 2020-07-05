<div class="card">
    <div class="card-header">
        支付宝配置
    </div>
    <div class="card-body">
        <x-form type="password" title="应用ID" name="alipay[app_id]" value="{{ config('site.alipay.app_id') }}"
            placeholder="根据服务器所在区域进行选择 | https://help.alipay.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo">
        </x-form>

        <x-form title="编码格式" name="alipay[charset]" value="{{ config('site.alipay.charset','UTF-8') }}"
            placeholder="编码格式一般使用UTF-8不需要更改">
        </x-form>

        <x-form title="签名方式" name="alipay[sign_type]" value="{{ config('site.alipay.sign_type','RSA2') }}"
            placeholder="签名方式一般不需要更改">
        </x-form>

        <x-form title="支付宝网关" name="alipay[gatewayUrl]"
            value="{{ config('site.alipay.gatewayUrl','https://openapi.alipay.com/gateway.do') }}"
            placeholder="支付宝网关一般这 https://openapi.alipay.com/gateway.do">
        </x-form>

        <x-form type="password" title="商户私钥" name="alipay[merchant_private_key]" placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
            value="{{ config('site.alipay.merchant_private_key') }}"></x-form>

        <x-form type="password" title="支付宝公钥" name="alipay[alipay_public_key]" placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
            value="{{ config('site.alipay.alipay_public_key') }}">
        </x-form>
    </div>
</div>
