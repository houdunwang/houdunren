<div class="card border-0 rounded-0">
    <div class="card-body">
        <div class="form-group">
            <label>栏目名称</label>
            <input type="text" name="title" value="{{old('title',$category['title']??'')}}" required
                   class="form-control">
        </div>
        <div class="form-group">
            <label>所属模型</label>
            <select name="model_id" class="form-control" required>
                @foreach($models as $model)
                    <option value="{{$model['id']}}" {{active_class($category['model_id']==$model['id'],'selected')}}>{{$model['title']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>父级栏目</label>
            <select name="parent_id" class="form-control" required>
                <option value="0">顶级栏目</option>
                @foreach($categories as $cat)
                    <option value="{{$cat['id']}}" {{$cat['_selected']}} {{$cat['_disabled']}}>
                        {!! $cat['_title'] !!}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>封面栏目</label>
            <div class="custom-control custom-checkbox-toggle">
                <input type="checkbox" class="custom-control-input" name="is_homepage" value="1"
                       id="is_homepage" {{active_class($category['is_homepage']==1,'checked')}}>
                <label class="custom-control-label" for="is_homepage"></label>
            </div>
        </div>
        <div class="form-group">
            <label>栏目描述</label>
            <textarea name="description" class="form-control"
                      rows="3">{{old('description',$model['description']??'')}}</textarea>
        </div>
        <div class="form-group">
            <label>跳转链接</label>
            <input type="text" name="redirect_url"
                   value="{{old('redirect_url',$model['redirect_url']??'')}}" class="form-control">
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        模板设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>封面模板</label>
            <input type="text" name="index_template" required
                   value="{{old('index_template',$model['index_template']??'index.blade.php')}}"
                   class="form-control">
        </div>
        <div class="form-group">
            <label>列表页模板</label>
            <input type="text" name="list_template" required
                   value="{{old('list_template',$model['list_template']??'list.blade.php')}}"
                   class="form-control">
        </div>
        <div class="form-group">
            <label>内容页模板</label>
            <input type="text" name="article_template" required
                   value="{{old('article_template',$model['article_template']??'article.blade.php')}}"
                   class="form-control">
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</div>