<div class="card col-12 border-0 rounded-0">
    <input type="hidden" name="category_id" value="{{$category['id']}}">
    <div class="card-body">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control" value="{{old('title',$article['title'])}}">
        </div>
        <div class="form-group">
            <label>父级栏目</label>
            <select name="parent_id" class="form-control" required>
                @foreach($category->tree() as $cat)
                    <option value="{{$cat['id']}}"
                            {{$category['model_id'] != $cat['model_id'] || $cat['is_homepage']?'disabled':''}}
                            {{$category['id']==$cat['id']?'selected':''}}>
                        {!! $cat['_title'] !!}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>来源</label>
            <input type="text" name="source" class="form-control" value="{{old('source',$article['source'])}}">
        </div>
        <div class="form-group">
            <label>作者</label>
            <input type="text" name="author" class="form-control" value="{{old('author',$article['author'])}}">
        </div>
        <div class="form-group">
            <label>内容页</label>
            <textarea id="container" style="height:300px;width:100%;" name="content">{{$article['content']}}</textarea>
            @push('js')
                <script>
                    require(['hdjs'], function (hdjs) {
                        hdjs.ueditor('container');
                    })
                </script>
            @endpush
        </div>
        <div class="form-group">
            <label>缩略图</label>
            <div class="input-group mb-1">
                <input class="form-control" name="thumb" readonly=""
                       value="{{old('thumb',$article['thumb'])}}">
                <div class="input-group-append">
                    <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                </div>
            </div>
            <div style="display: inline-block;position: relative;">
                <img src="{{old('thumb',$article['thumb']??asset('images/nopic.jpg'))}}"
                     class="img-responsive img-thumbnail" width="150">
                <em class="close text-secondary" style="position: absolute;top: 8px;right: 10px;" title="删除这张图片"
                    onclick="removeImg(this)">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </em>
            </div>
            @push('js')
                <script>
                    function upImagePc() {
                        require(['hdjs'], function (hdjs) {
                            var options = {
                                multiple: false,//是否允许多图上传
                                //data是向后台服务器提交的POST数据
                                data: {name: '后盾人', year: 2099},
                            };
                            hdjs.image(function (images) {
                                //上传成功的图片，数组类型
                                $("[name='thumb']").val(images[0]);
                                $(".img-thumbnail").attr('src', images[0]);
                            }, options)
                        });
                    }

                    function removeImg(obj) {
                        $(obj).prev('img').attr('src', "{{asset('images/nopic.jpg')}}");
                        $(obj).parent().prev().find('input').val('');
                    }
                </script>
            @endpush
        </div>
        <div class="form-group">
            <label>文章简介</label>
            <textarea name="description" class="form-control"
                      rows="3">{{old('description',$article['description'])}}</textarea>
        </div>
        <div class="form-group">
            <label>跳转链接</label>
            <input type="text" name="redirect_url" class="form-control"
                   value="{{old('redirect_url',$article['redirect_url'])}}">
            <small id="helpId" class="text-muted">存在跳转链接时不显示内容直接跳转到网址</small>
        </div>
        <div class="form-group">
            <label>点击数</label>
            <input type="text" name="click" class="form-control" value="{{old('click',$article['click']??0)}}" required>
        </div>
        <div class="form-group">
            <label>自定义模板</label>
            <input type="text" name="template" class="form-control" value="{{old('template',$article['template'])}}">
            <small id="helpId" class="text-muted">不设置文章自定义模板将使用栏目定义的内容页模板</small>
        </div>
    </div>
</div>
<div class="card col-12">
    <div class="card-header">
        扩展字段
    </div>
    <div class="card-body">
        {!! $extendField !!}
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</div>