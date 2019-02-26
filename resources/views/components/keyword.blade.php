@inject('ChatRepository','App\Repositories\ChatRepository')
<div class="card mb-3">
    <div class="card-header">关键词设置</div>
    <div class="card-body">
        <div class="form-group">
            <label>规则描述</label>
            <input type="text" name="keyword[title]" class="form-control" required
                   value="{{old('keyword.title',$model->keyword['title']??'')}}">
        </div>
        <div class="form-group">
            <label>微信公众号</label>
            <select class="form-control" name="keyword[chat_id]" required>
                @foreach($ChatRepository->getBySite(site()) as $wx)
                    <option value="{{$wx['id']}}"
                            {{active_class($wx['id']==($model?$model->keyword['chat_id']:''),'selected')}}>
                        {{$wx['name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>回复关键词</label>
            <input type="text" name="keyword[key]" class="form-control" required
                   value="{{old('keyword.key',$model->keyword['key']??'')}}">
        </div>
    </div>
</div>
<input type="hidden" name="keyword[tag]" value="{{$tag??''}}">
<input type="hidden" name="keyword[system]" value="{{$system??1}}">
<input type="hidden" name="keyword[site_id]" value="{{\site()['id']}}">
<input type="hidden" name="keyword[module_id]" value="{{module()['id']}}">