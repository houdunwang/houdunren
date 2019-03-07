<div class="alert alert-secondary " role="alert">
    使用 config_get('变量名','默认值','site') 形式获取配置项，如获取站点名称 config_get('info.webname','默认值','site')
</div>
<div class="card">
    <div class="card-header">网站基本配置</div>
    <div class="card-body">
        <div class="form-group col-sm-6">
            <label>网站名称<small class="text-secondary">(info.webname)</small></label>
            <input type="text" name="webname" class="form-control" value="{{old('webname',$config['webname']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站LOGO<small class="text-secondary">(info.logo)</small></label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="logo" value="{{$config['logo']??''}}" readonly="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadImage('logo')" type="button">
                        选择图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block" src="{{$config['logo']??asset('images/system/nopic.jpg')}}" style="width: 150px;">
        </div>
        <div class="form-group col-sm-6">
            <label>网站关键字<small class="text-secondary">(info.keyword)</small></label>
            <input type="text" name="keyword" class="form-control" value="{{old('keyword',$config['keyword']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站关键字<small class="text-secondary">(info.description)</small></label>
            <textarea name="description" rows="3"
                      class="form-control">{{old('description',$config['description']??'')}}</textarea>
        </div>
        <div class="form-group col-sm-6">
            <label>ICP备案号<small class="text-secondary">(info.icp)</small></label>
            <input type="text" name="icp" class="form-control" value="{{old('icp',$config['icp']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>联系电话<small class="text-secondary">(info.tel)</small></label>
            <input type="text" name="tel" class="form-control" value="{{old('tel',$config['tel']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>联系邮箱<small class="text-secondary">(info.email)</small></label>
            <input type="text" name="email" class="form-control" value="{{old('email',$config['email']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站统计代码<small class="text-secondary">(info.counter)</small></label>
            <textarea name="counter" rows="3"
                      class="form-control">{{old('counter',$config['counter']??'')}}</textarea>
        </div>
    </div>
</div>