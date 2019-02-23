<div class="card">
    <div class="card-header">设置公众号基本信息</div>
    <div class="card-body">
        <div class="form-group">
            <label>公众号名称</label>
            <input type="text" name="name" class="form-control" required
                   value="{{old('name',$wechat['name']??'')}}">
            <small class="text-muted">填写公众号的帐号名称</small>
        </div>
        <div class="form-group">
            <label>微信号</label>
            <input type="text" name="account" class="form-control" required
                   value="{{old('account',$wechat['account']??'')}}">
            <small class="text-muted">填写公众号的帐号，一般为英文帐号</small>
        </div>
        <div class="form-group">
            <label>原始ID</label>
            <input type="text" name="original" class="form-control" required
                   value="{{old('original',$wechat['original']??'')}}">
            <small class="text-muted">在给粉丝发送客服消息时,原始ID不能为空,以gh_开始的</small>
        </div>
        <div class="form-group">
            <label>公众号类型</label>
            <div class="">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genre" value="1"
                                {{active_class(old('genre',$wechat['genre']??'') == 1,'checked')}}>
                        普通订阅号
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genre" value="2"
                                {{active_class(old('genre',$wechat['genre']??'') == 2,'checked')}}>
                        普通服务号
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genre" value="3"
                                {{active_class(old('genre',$wechat['genre']??'') == 3,'checked')}}>
                        认证订阅号
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genre" value="4"
                                {{active_class(old('genre',$wechat['genre']??'') == 4,'checked')}}>
                        认证服务号/认证媒体/政府订阅号
                    </label>
                </div>
            </div>
            <small class="text-muted">注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号.</small>
        </div>
        <div class="form-group">
            <label>身份标识
                (appId)</label>
            <input type="text" name="appid" class="form-control" required
                   value="{{old('appid',$wechat['appid']??'')}}">
            <small class="text-muted">请填写微信公众平台后台的AppId</small>
        </div>
        <div class="form-group">
            <label>身份密钥
                (appSecret)</label>
            <input type="text" name="appsecret" class="form-control" required
                   value="{{old('appsecret',$wechat['appsecret']??'')}}">
            <small class="text-muted">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</small>
        </div>
        <div class="form-group">
            <label>微信支付商户号
                (MchId)</label>
            <input type="text" name="mch_id" class="form-control" required
                   value="{{old('mch_id',$wechat['mch_id']??'')}}">
            <small class="text-muted">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</small>
        </div>
        <div class="form-group">
            <label>商户支付密钥 (API密钥)</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="key" readonly="" required
                       value="{{old('key',$wechat['key']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="md5('key')" type="button">
                        生成新的
                    </button>
                </div>
                @push('js')
                    <script>
                        function md5(name){
                            require(['hdjs'],function(hdjs){
                                hdjs.md5('houdunren.com',function(hash){
                                    $("[name="+name+"]").val(hash)
                                });
                            })
                        }
                    </script>
                    @endpush
            </div>
            <small class="text-muted">此值需要手动在腾讯商户后台API密钥保持一致。查看设置教程</small>
        </div>
        <div class="form-group">
            <label>证书格式 (apiclient_cert.pem)</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="apiclient_cert" readonly=""
                       value="{{old('apiclient_cert',$wechat['apiclient_cert']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadFile('apiclient_cert','pem')" type="button">
                        选择文件
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>证书密钥格式 (apiclient_key.pem)</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="apiclient_key" readonly=""
                       value="{{old('apiclient_key',$wechat['apiclient_key']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadFile('apiclient_key','pem')" type="button">
                        选择文件
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>CA证书 (rootca.pem)</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="rootca" readonly=""
                       value="{{old('rootca',$wechat['rootca']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadFile('rootca','pem')" type="button">
                        选择文件
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>二维码</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="qr" readonly="" required
                       value="{{old('qr',$wechat['qr']??asset('images/nopic.jpg'))}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadImage('qr')" type="button">
                        选择文件
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block" id="qr"
                 src="{{old('qr',$wechat['qr']??asset('images/nopic.jpg'))}}" style="width: 150px;">
        </div>
        <div class="form-group">
            <label>公众号图标</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="icon" readonly="" required
                       value="{{old('icon',$wechat['icon']??asset('images/nopic.jpg'))}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadImage('icon')" type="button">
                        选择图标
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block"
                 src="{{old('icon',$wechat['icon']??asset('images/nopic.jpg'))}}" style="width: 150px;">
        </div>
    </div>
</div>
<button class="btn btn-success mt-3">保存提交</button>