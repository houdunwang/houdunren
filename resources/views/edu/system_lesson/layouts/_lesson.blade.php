<div class="form-group">
    <label>名称</label>
    <input type="text" name="title" class="form-control" required value="{{old('title',$lesson['title']??'')}}"
           placeholder="输入系统课程名称">
</div>
<div class="form-group">
    <label>描述</label>
    <textarea name="description" class="form-control" rows="5" required
              placeholder="输入课程介绍，字数不能小于100字">{{old('description',$lesson['description']??'')}}</textarea>
</div>
<div class="form-group">
    <label>课程编号</label>
    <input type="text" name="lessons" class="form-control" required value="{{old('lessons',$lesson['lessons']??'')}}"
           placeholder="输入课程编号，用逗号连接">
</div>
<div class="form-group">
    <label for="">图标</label>
    <div class="input-group mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text" id="font">
                <i class="fa fa-check" aria-hidden="true"></i>
            </span>
        </div>
        <input class="form-control" name="thumb" readonly="" value="{{$lesson['thumb']??''}}">
        <div class="input-group-append">
            <button onclick="uploadFont(this)" class="btn btn-secondary" type="button">单图上传</button>
        </div>
    </div>

</div>
@push('js')
    <script>
        function uploadFont() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $("[name='thumb']").val(icon);
                    $("#font i").attr('class',icon);
                })
            })
        }
    </script>
@endpush