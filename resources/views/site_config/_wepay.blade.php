<div class="card">
    <div class="card-header">
        微信支付
    </div>
    <div class="card-body">

        <x-form type="password" title="微信支付商户号" name="wepay[mch_id]" value="{{ config('site.wepay.mch_id') }}"
            placeholder="公众号支付请求中用于加密的密钥Key">
        </x-form>

        <x-form type="password" title="商户支付密钥" name="wepay[key]" value="{{ config('site.wepay.key') }}"
            placeholder="此值需要手动在腾讯商户后台API密钥保持一致">
        </x-form>

        <x-form title="证书格式" name="wepay[apiclient_cert]" value="{{ config('site.wepay.apiclient_cert') }}"
            placeholder="此值需要手动在腾讯商户后台API密钥保持一致">
        </x-form>

        <x-form title="证书密钥格式" name="wepay[apiclient_key]" value="{{ config('site.wepay.apiclient_key') }}"
            placeholder="">
        </x-form>

        <x-form title="CA证书" name="wepay[rootca]" value="{{ config('site.wepay.rootca') }}" placeholder=""></x-form>

    </div>
</div>
