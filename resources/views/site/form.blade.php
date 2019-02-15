<div class="card">
    <div class="card-header">
        设置站点基本信息
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">站点名称</label>
            <div class="col-sm-10">
                <input type="text" required name="name" value="{{old('name',$site['name']??'')}}" class="form-control" placeholder="如: 后盾人">
                <span class="help-block">站点中显示的站点名称,可以使用中文等任意字符</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">站点描述</label>
            <div class="col-sm-10">
                <textarea name="description"  class="form-control" cols="30" rows="5">{{old('description',$site['description']??'')}}</textarea>
            </div>
        </div>
    </div>
</div>