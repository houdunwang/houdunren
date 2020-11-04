<div class="card">
  <div class="card-header">
    微信支付
  </div>
  <div class="card-body">
    <x-form title="微信支付商户号" name="wepay[mch_id]" value="{{ config('site.wepay.mch_id') }}"
            placeholder="公众号支付请求中用于加密的密钥Key">
    </x-form>
    <x-form title="商户支付API密钥" name="wepay[key]" value="{{ config('site.wepay.key') }}"
            placeholder="请在 微信支付-安全中心-API安全 中设置或查看">
    </x-form>

    <x-form title="运行模式" name="wepay[mode]" placeholder="沙箱模式需要设置值为dev" value="{{ config('site.wepay.mode') }}">
    </x-form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">
    应用APPID
  </div>
  <div class="card-body">
    <x-form title="公众号APPID" name="wepay[app_id]" value="{{ config('site.wepay.app_id') }}" placeholder="公众号 APPID">
    </x-form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">
    支付证书
  </div>
  <div class="card-body">

    <x-form title="cert_client证书" name="wepay[cert_client]" value="{{ config('site.wepay.cert_client') }}"
            placeholder="退款等情况时用到">
    </x-form>

    <x-form title="cert_key证书" name="wepay[cert_key]" value="{{ config('site.wepay.cert_key') }}"
            placeholder="退款等情况时用到"></x-form>
  </div>
</div>
