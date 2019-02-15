<div class="card">
    <div class="card-header">
        上传方式
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-1 pt-0">上传设置</label>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label mr-3">
                        <input class="form-check-input" type="radio" value="local"
                               name="way" {{active_class(($config['way']??'local')=='local','checked')}}> 本地上传
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="oss"
                               name="way" {{active_class(($config['way']??'')=='oss','checked')}}> 阿里云上传
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label">图片大小</label>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="image_size"
                           value="{{$config['image_size']??200000000}}">
                    <div class="input-group-append">
                        <span class="input-group-text">字节</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label">文件大小</label>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="file_size"
                           value="{{$config['local']['file_size']??200000000}}">
                    <div class="input-group-append">
                        <span class="input-group-text">字节</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">上传类型</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="type"
                       value="{{$config['type']??'jpg,jpeg,gif,png,zip,rar,doc,txt,pem,json'}}">
                <span class="help-block small text-secondary">请用英文半角逗号分隔文件类型</span>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        本地上传配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">上传目录</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="local[path]"
                       value="{{$config['local']['path']??'attachment'}}">
                <span class="help-block small text-secondary">上传到本地服务器的目录名称</span>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        阿里云上传配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">regionId</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="oss[regionId]"
                       value="{{$config['oss']['regionId']??''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">accessKeySecret</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="oss[accessKeySecret]"
                       value="{{$config['oss']['accessKeySecret']??''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">bucket</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="oss[bucket]"
                       value="{{$config['oss']['bucket']??''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">endpoint</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="oss[endpoint]"
                       value="{{$config['oss']['endpoint']??''}}">
            </div>
        </div>
    </div>
</div>