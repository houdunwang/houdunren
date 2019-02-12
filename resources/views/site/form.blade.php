<div class="box-body">
    <div class="form-group">
        <label>站点名称</label>
        <input type="text" class="form-control" required name="name" value="{{old('name',$site['name']??'')}}"
               placeholder="请输入站点中文名称">
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">保存提交</button>
</div>