<div class="card">
    <div class="card-header">
        基本配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-1 pt-0 text-right">
                调试模式 <small class="text-secondary">(debug)</small>
            </label>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label mr-3">
                        <input class="form-check-input" type="checkbox" value="1" name="debug"
                                {{active_class($config['debug']??false,'checked')}}> 开启
                    </label>
                </div>
                <small class="text-muted d-block">开启调试模式可以看到错误信息，在二次开发或模块开发时使用</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label text-right">
                后台标志 <small class="text-secondary">(logo)</small>
            </label>
            <div class="col-sm-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="logo" value="{{$config['logo']??asset('images/system/logo.png')}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="uploadImage('logo')" type="button">
                            选择图片
                        </button>
                    </div>
                </div>
                <small class="text-muted">后台系统管理界面的标志，尺寸600X100像素</small>
                <div class="input-group">
                    <img src="{{$config['logo']??asset('images/system/logo.png')}}" class="img-thumbnail d-block"
                         id="logo-img" style="background: #dcdcdc;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label text-right">
                后台页脚
                <small class="text-secondary">(footer)</small>
            </label>
            <div class="col-sm-6">
                <textarea name="footer" class="form-control" cols="30" rows="3">{{$config['footer']??''}}</textarea>
                <small class="text-secondary">
                    后台页面底部信息支持HTML
                </small>
            </div>

        </div>
    </div>
</div>