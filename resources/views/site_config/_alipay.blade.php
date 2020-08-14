<div class="card">
    <div class="card-header">
        支付宝配置
    </div>
    <div class="card-body">
        <x-form type="password" title="应用ID" name="alipay[app_id]" value="{{ config('site.alipay.app_id') }}"
            placeholder="请登录支付定应用中心查看  https://open.alipay.com/platform/developerIndex.htm">
        </x-form>

        <x-form title="编码格式" name="alipay[charset]" value="{{ config('site.alipay.charset','UTF-8') }}"
            placeholder="编码格式一般使用UTF-8不需要更改">
        </x-form>

        <x-form title="签名方式" name="alipay[sign_type]" value="{{ config('site.alipay.sign_type','RSA2') }}"
            placeholder="签名方式一般不需要更改">
        </x-form>

        {{-- <x-form title="支付宝网关" name="alipay[gatewayUrl]"
            value="{{ config('site.alipay.gatewayUrl','https://openapi.alipay.com/gateway.do') }}"
        placeholder="支付宝网关一般这 https://openapi.alipay.com/gateway.do">
        </x-form> --}}

        <x-form type="password" title="商户私钥" name="alipay[private_key]" placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
            value="{{ config('site.alipay.private_key') }}"></x-form>

        <x-form type="password" title="支付宝公钥" name="alipay[ali_public_key]" placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
            value="{{ config('site.alipay.ali_public_key') }}">
        </x-form>
        <x-form title="运行模式" name="alipay[mode]" placeholder="沙箱模式需要设置值为dev" value="{{ config('site.alipay.mode') }}">
        </x-form>
    </div>
</div>
