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
    <label for="">缩略图</label>
        <div class="input-group mb-1">
            <input class="form-control" name="thumb" readonly="" value="{{$lesson['thumb']}}">
            <div class="input-group-append">
                <button onclick="uploadLessonThumb(this)" class="btn btn-secondary" type="button">单图上传</button>
            </div>
        </div>
        <div style="display: inline-block;position: relative;">
            <img src="{{$lesson['thumb']??asset('images/nopic.jpg')}}" class="img-responsive img-thumbnail" width="150">
            <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                onclick="removeImg(this)">×</em>
        </div>
</div>
@push('js')
    <script>
        function uploadLessonThumb() {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='thumb']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                })
            });
        }
    </script>
@endpush