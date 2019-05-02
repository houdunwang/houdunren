<input type="hidden" name="site_id" value="{{site()['id']}}">
<div class="card">
    <div class="card-header">
        设置资料
    </div>
    <div class="card-body">
        @foreach($fieldServer->forms($model) as $field)
            {!! $field !!}
        @endforeach
    </div>
</div>
<button class="btn btn-success mt-2">保存提交</button>