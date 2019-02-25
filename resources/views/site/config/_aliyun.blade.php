<div class="alert alert-info small">
    配置阿里云可以使用阿里云发送短信、开启直播等众多功能
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>regionId<small class="text-secondary">(regionId)</small></label>
            <input type="text" class="form-control" name="regionId" value="{{$config['regionId']??''}}">
            <span class="help-block text-muted small">
                根据服务器所在区域进行选择
    | <a href="https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo" class="text-primary">
                    https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo
                </a>
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">accessId<small class="text-secondary">(accessId)</small></label>
            <input type="text" class="form-control" name="accessId" value="{{$config['accessId']??''}}" placeholder="">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">accessKey<small class="text-secondary">(accessKey)</small></label>
            <input type="text" class="form-control" name="accessKey" value="{{$config['accessKey']??''}}" placeholder="">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
    </div>
</div>