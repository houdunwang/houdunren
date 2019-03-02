<div class="alert alert-secondary small">
    <i class="fa fa-info-circle"></i>
    站点需要使用发送短信、开启直播等功能时必须正确配置阿里云。
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
            <label class="mb-1">accessKeyId<small class="text-secondary">(accessKeyId)</small></label>
            <input type="text" class="form-control" name="accessKeyId" value="{{$config['accessKeyId']??''}}">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">accessKeySecret<small class="text-secondary">(accessKeySecret)</small></label>
            <input type="text" class="form-control" name="accessKeySecret" value="{{$config['accessKeySecret']??''}}" placeholder="">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
    </div>
</div>