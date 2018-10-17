@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'wechat'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card small">
                <div class="card-body">
                    @include('admin.layouts._config_menu')
                    <div class="card">
                        <div class="card-header">
                            <strong>基本配置</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>token</label>
                                <input type="text" name="wechat_token" value="{{$config['data']['wechat_token']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    微信绑定验证时使用的token, 需要与微信公众号后台保持一致
                                    | http://mp.weixin.qq.com/wiki/8/f9a0b8382e0b77d87b3bcc1ce6fbc104.html
                                </small>
                            </div>
                            <div class="form-group">
                                <label>encodingaeskey</label>
                                <input type="text" name="wechat_encodingaeskey" value="{{$config['data']['wechat_encodingaeskey']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    需要与微信公众号后台保持一致
                                    | http://mp.weixin.qq.com/wiki/8/f9a0b8382e0b77d87b3bcc1ce6fbc104.html
                                </small>
                            </div>
                            <div class="form-group">
                                <label>appid</label>
                                <input type="text" name="wechat_appid" value="{{$config['data']['wechat_appid']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    填写公众号认证后腾讯官网发来的邮件中的appid
                                </small>
                            </div>
                            <div class="form-group">
                                <label>appsecret</label>
                                <input type="text" name="wechat_appsecret" value="{{$config['data']['wechat_appsecret']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    公众平台API的权限获取所需密钥Key
                                    | 需要与微信公众号后台保持一致
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>公众号微信支付参数</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>mch_id</label>
                                <input type="text" name="wechat_mch_id" value="{{$config['data']['wechat_mch_id']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    支付商户号
                                    | 微信发来的邮件中的微信支付商户号
                                </small>
                            </div>
                            <div class="form-group">
                                <label>key</label>
                                <input type="text" name="wechat_key" value="{{$config['data']['wechat_key']??''}}" class="form-control">
                                <small id="helpId" class="text-muted">
                                    商户支付密钥
                                    | 用于生成支付签名等使用
                                    | 登录微信支付-商户平台 API安全中获取
                                    | https://pay.weixin.qq.com/index.php/core/cert/api_cert
                                </small>
                            </div>
                            <div class="form-group">
                                <label>apiclient_cert</label>
                                <div class="input-group mb-1">
                                    <input class="form-control" name="wechat_apiclient_cert" value="{{$config['data']['wechat_apiclient_cert']??''}}" readonly="">
                                    <div class="input-group-append">
                                        <button onclick="upFile('apiclient_cert')" class="btn btn-secondary" type="button">选择</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>apiclient_key</label>
                                <div class="input-group mb-1">
                                    <input class="form-control" name="wechat_apiclient_key" value="{{$config['data']['wechat_apiclient_key']??''}}" readonly="">
                                    <div class="input-group-append">
                                        <button onclick="upFile('apiclient_key')" class="btn btn-secondary" type="button">选择</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>rootca</label>
                                <div class="input-group mb-1">
                                    <input class="form-control" name="wechat_rootca" value="{{$config['data']['wechat_rootca']??''}}" readonly="">
                                    <div class="input-group-append">
                                        <button onclick="upFile('rootca')" class="btn btn-secondary" type="button">选择</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        function upFile(name) {
            require(['hdjs'], function (hdjs) {
                let options = {
                    extensions: 'txt,php,pem,jpg,jpeg',
                    //单个文件允许为5MB
                    fileSingleSizeLimit: 5 * 1024 * 1024
                };
                hdjs.file(function (files) {
                    $("[name='" + name + "']").val(files[0]);
                }, options)
            });
        }
    </script>
@endpush
