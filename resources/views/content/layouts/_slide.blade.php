<div class="form-group">
    <label>描述</label>
    <input type="text" name="title" value="{{old('title',$slide['title'])}}" class="form-control" required>
</div>
<div class="form-group">
    <label>跳转网址</label>
    <input type="text" name="url" value="{{old('url',$slide['url']??'http://')}}" class="form-control" required>
</div>
<div class="form-group">
    <label>启用</label>
    <div class="custom-control custom-checkbox-toggle">
        <input type="checkbox" class="custom-control-input" name="status" value="1" id="exampleToggle"
        {{active_class($slide['status']==1,'checked')}}>
        <label class="custom-control-label" for="exampleToggle"></label>
    </div>
</div>
<div class="form-group">
    <label>图片文件</label>
    <div class="input-group mb-1">
        <input class="form-control" name="image" readonly="" required
               value="{{old('image',$slide['image']??asset('images/nopic.jpg'))}}">
        <div class="input-group-append">
            <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">选择图片</button>
        </div>
    </div>
    <div style="display: inline-block;position: relative;">
        <img src="{{old('image',$slide['image']??asset('images/nopic.jpg'))}}" class="img-responsive img-thumbnail"
             width="150">
    </div>
    @push('js')
        <script>
            //上传图片
            function upImagePc() {
                require(['hdjs'], function (hdjs) {
                    hdjs.image(function (images) {
                        //上传成功的图片，数组类型
                        $("[name='image']").val(images[0]);
                        $(".img-thumbnail").attr('src', images[0]);
                    })
                });
            }
        </script>
    @endpush
</div>