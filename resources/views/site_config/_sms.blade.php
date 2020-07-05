<div class="card">
    <div class="card-header">
        基本信息
    </div>
    <div class="card-body col-6">
        <x-form title="短信签名" name="sms[sign]" value="{{ config('site.sms.sign') }}" placeholder=""></x-form>

        <x-form title="验证码模板" name="sms[template]" value="{{ config('site.sms.template') }}" placeholder=""></x-form>

    </div>
</div>
