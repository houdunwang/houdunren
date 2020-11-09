<div class="card mt-3">
  <div class="card-header">
    公众号资料
  </div>
  <div class="card-body">
    <x-form title="公众号名称" name="title" value="{{ $wechat['title']??'' }}" />
    <x-form title="TOKEN" name="token" value="{{ $wechat['token']??'' }}" />
    <x-form theme="textarea" title="公众号介绍" name="introduce" :value="$wechat['title']" />
    <x-form title="微信号" name="name" value="{{ $wechat['name']??'' }}"></x-form>
    <x-form theme="image" title="二维码" name="qr" value="{{ $wechat['qr']??'' }}" />
    <x-form theme="radio" title="公众号类型" name="type" :options="['subscribe'=>'订阅号','service'=>'服务号']"
            value="{{ $wechat['type']??'subscribe' }}" />
    <x-form title="原始ID" name="wechat_id" value="{{ $wechat['wechat_id']??'' }}" />
    <x-form name="appID" title="appID" :value="$wechat['appID']" :readonly="$wechat['appID']" />
    <x-form name="appsecret" title="appsecret" :value="$wechat['appsecret']" :readonly="$wechat['appsecret']" />
  </div>
</div>

<button class="btn btn-primary mt-3">保存</button>
