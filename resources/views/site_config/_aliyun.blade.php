<div class="alert alert-info small">
    配置阿里云可以使用阿里云发送短信、开启直播等众多功能
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>regionId</label>
            <input type="text" class="form-control" name="regionId" value="{{$config['regionId']??''}}">
        </div>
        <div class="form-group">
            <label class="mb-1">accessId</label>
            <input type="text" class="form-control" name="accessId" value="{{$config['accessId']??''}}" placeholder="">
        </div>
        <div class="form-group">
            <label class="mb-1">accessKey</label>
            <input type="text" class="form-control" name="accessKey" value="{{$config['accessKey']??''}}" placeholder="">
        </div>
    </div>
</div>