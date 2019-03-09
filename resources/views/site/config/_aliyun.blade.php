<div class="alert alert-secondary">
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
            <input type="{{config_get('base.field','password','system')}}" class="form-control" name="accessKeyId" value="{{$config['accessKeyId']??''}}">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
        <div class="form-group">
            <label class="mb-1">accessKeySecret<small class="text-secondary">(accessKeySecret)</small></label>
            <input type="{{config_get('base.field','password','system')}}" class="form-control" name="accessKeySecret" value="{{$config['accessKeySecret']??''}}" placeholder="">
            <span class="help-block text-muted small">
                如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
    | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            </span>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        上传配置 <small class="text-secondary">如果使用本地上传则不需要配置</small>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">
                endpoint
                <small class="text-secondary">(endpoint)</small>
            </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="endpoint"
                       value="{{$config['endpoint']??''}}">
                <small class="text-secondary">
                    在阿里云后台中oss数据块中查看外网访问的EndPoint
                </small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">
                bucket
                <small class="text-secondary">(bucket)</small>
            </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="bucket"
                       value="{{$config['bucket']??''}}">
            </div>
        </div>
    </div>
</div>