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
            <label>AppId</label>
            <input type="text" name="app_id" class="form-control" required
                   value="{{old('app_id',$wechat['app_id']??'')}}">
            <small class="text-muted">请填写微信公众平台后台的AppId</small>
        </div>
        <div class="form-group">
            <label>AppSecret</label>
            <input type="text" name="app_secret" class="form-control" required
                   value="{{old('app_secret',$wechat['app_secret']??'')}}">
            <small class="text-muted">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</small>
        </div>
        <div class="form-group">
            <label>二维码</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="qr" readonly="" required
                       value="{{old('qr',$wechat['qr']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadQr()" type="button">
                        选择二维码图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block" id="qr"
                 src="{{old('qr',$wechat['qr']??asset('images/nopic.jpg'))}}" style="width: 150px;">
            @push('js')
                <script>
                    function uploadQr() {
                        require(['hdjs'], function (hdjs) {
                            hdjs.image(function (images) {
                                $("[name=qr]").val(images[0]);
                                $("#qr").attr('src', images[0]);
                            })
                        });
                    }
                </script>
            @endpush
        </div>
        <div class="form-group">
            <label>公众号图标</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="icon" readonly="" required
                       value="{{old('icon',$wechat['icon']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadIcon()" type="button">
                        选择图标
                    </button>

                </div>
            </div>
            <img class="img-thumbnail d-block" id="icon"
                 src="{{old('icon',$wechat['icon']??asset('images/nopic.jpg'))}}" style="width: 150px;">
            @push('js')
                <script>
                    function uploadIcon() {
                        require(['hdjs'], function (hdjs) {
                            hdjs.image(function (images) {
                                $("[name=icon]").val(images[0]);
                                $("#icon").attr('src', images[0]);
                            })
                        });
                    }
                </script>
            @endpush
        </div>
    </div>
</div>
<button class="btn btn-success mt-3">保存提交</button>