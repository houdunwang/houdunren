{{--<div class="box-body">--}}
    {{--<div class="form-group">--}}
        {{--<label>站点名称</label>--}}
        {{--<input type="text" class="form-control" required name="name" value="{{old('name',$site['name']??'')}}"--}}
               {{--placeholder="请输入站点中文名称">--}}
    {{--</div>--}}
{{--</div>--}}


<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">设置站点基本信息</h4>
    </div>
    <div class="panel-body">
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