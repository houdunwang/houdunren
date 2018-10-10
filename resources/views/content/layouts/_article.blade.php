<div class="card col-12 border-0 rounded-0">
    <input type="hidden" name="category_id" value="{{$category['id']}}">
    <div class="card-body">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control" value="{{old('title',$article['title'])}}">
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
            <textarea id="container" style="height:300px;width:100%;" name="content"></textarea>
            @push('js')
                <script>
                    require(['hdjs'], function (hdjs) {
                        hdjs.ueditor('container', {hash: 2, data: 'hd'}, function (editor) {
                        });
                    })
                </script>
            @endpush
        </div>
        <div class="form-group">
            <label>缩略图</label>
            <input type="text" name="thumb" class="form-control" value="{{old('thumb',$article['thumb'])}}">
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
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</div>