<div class="card col-12 pt-0 mt-0 border-0">
    <div class="card-body">
        <div class="form-group">
            <label>标签名</label>
            <input type="text" name="name" value="{{old('title',$tag['name']??'')}}" class="form-control" placeholder="请输入标签中文名称" required>
        </div>
    </div>
    <div class="card-footer">
        <textarea name="fields" hidden id="" cols="30" rows="10">@{{ fields }}</textarea>
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</div>