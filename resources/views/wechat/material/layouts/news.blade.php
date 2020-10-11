@foreach ($materials as $material)
<div class="col-2 col-sm-3">
  <div class="card shadow-sm">
    <div class="wechat-news">
      @foreach ($material['content'] as $article)
      <div>
        <img src="{{ $article['picurl'] }}" />
        <h2>{{ $article['title'] }}</h2>
      </div>
      @endforeach
    </div>
    <div class="card-footer text-center">
      <a href="{{ route('wechat.material.edit',$material) }}" class="btn btn-outline-info btn-sm">编辑</a>
      <wechat-user title="预览" v-slot="{user}" class="d-inline" :id="{{$material['wechat_id']}}">
        <a :href="`/wechat/material/preview/`+user.wechat_user[0].openid+'/'+{{ $material['id'] }}"
          class="btn btn-info btn-sm">发送预览</a>
      </wechat-user>
      <btn-del action="{{ route('wechat.material.destroy',$material) }}" class="btn btn-outline-secondary btn-sm">
        删除
      </btn-del>
    </div>
  </div>
</div>
@endforeach
