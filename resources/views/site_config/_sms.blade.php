<div class="alert alert-info" role="alert">
  1. 请访问阿里云后台获取 <a class="text-primary"
     href="https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign">https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign</a>
  <br>
  2. 短信模块必须存在以下变量： product:网站名称，code:验证码，系统会在发送验证码时自动设置数据
</div>
<div class="card">
  <div class="card-header">
    阿里云
  </div>
  <div class="card-body col-6">

    <x-form title="短信签名" name="sms[aliyun][sign]" value="{{ config('site.sms.aliyun.sign','身份验证') }}"
            placeholder="请登录阿里云">
    </x-form>

    <x-form title="验证码模板" name="sms[aliyun][template]"
            value="{{ config('site.sms.aliyun.template','SMS_12840367') }}" placeholder="">
    </x-form>

  </div>
</div>
