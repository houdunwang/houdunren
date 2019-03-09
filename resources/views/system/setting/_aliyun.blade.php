<div class="card mt-3">
    <div class="card-header">
        阿里云配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">
                accessKeyId
                <small class="text-secondary">(accessKeyId)</small>
            </label>
            <div class="col-sm-6">
                <input type="{{config_get('base.field','password','system')}}" class="form-control" name="accessKeyId"
                       value="{{$config['accessKeyId']??''}}">
                <small class="text-secondary">
                    如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
                    <br> 如果使用子账号访问，请登录阿里云访问控制控制台查看
                </small>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">
                accessKeySecret
                <small class="text-secondary">(accessKeySecret)</small>
            </label>
            <div class="col-sm-6">
                <input type="{{config_get('base.field','password','system')}}" class="form-control" name="accessKeySecret"
                       value="{{$config['accessKeySecret']??''}}">
                <small class="text-secondary">
                    如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
                    <br> 如果使用子账号访问，请登录阿里云访问控制控制台查看
                </small>
            </div>
        </div>
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