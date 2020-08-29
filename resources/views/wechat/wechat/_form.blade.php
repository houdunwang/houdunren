<div class="card mt-3">
    <div class="card-header">
        公众号资料
    </div>
    <div class="card-body">
        <x-form title="公众号名称" name="title" value="{{ $wechat['title']??'' }}"></x-form>
        <x-form theme="textarea" title="公众号介绍" name="introduce">{{ $wechat['introduce']??'' }}</x-form>
        <x-form title="微信号" name="name" value="{{ $wechat['name']??'' }}"></x-form>
        <x-form title="token" name="token" value="{{ $wechat['token']??'' }}"></x-form>
        <x-form theme="image" title="二维码" name="qr" value="{{ $wechat['qr']??'' }}"></x-form>
        <x-form theme="radio" :options="['subscribe'=>'订阅号','service'=>'服务号']" title="类型" name="type"
            value="{{ $wechat['type']??'subscribe' }}"></x-form>
        <x-form title="原始ID" name="wechat_id" value="{{ $wechat['wechat_id']??'' }}"></x-form>
        <x-form title="appID" name="appID" value="{{ $wechat['appID']??'' }}"></x-form>
        <x-form title="appsecret" name="appsecret" value="{{ $wechat['appsecret']??'' }}"></x-form>
    </div>
</div>

<button class="btn mt-3 btn-primary">保存提交</button>
