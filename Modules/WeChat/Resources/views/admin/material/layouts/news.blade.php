@foreach ($materials as $material)
<div class="col-12 col-sm-2">
  <div class="card shadow-sm">
    <div class="wechat-news">
      @foreach ($material['content'] as $article)
      @if ($loop->first)
      <div>
        <img src="{{ $article['picurl'] }}" />
        <h2>{{ $article['title'] }}</h2>
      </div>
      @endif
      @endforeach
    </div>
    <div class="card-footer text-center">
      <a href="{{ route('WeChat.admin.material.edit',$material) }}" class="btn btn-outline-info btn-sm">编辑</a>

      <chat-user title="预览" v-slot="{user}" class="d-inline" :id="{{$material['wechat_id']}}">
        <a :href="`/WeChat/admin/material/preview/`+user.wechat_user[0].openid+'/'+{{ $material['id'] }}"
           class="btn btn-info btn-sm">发送预览</a>
      </chat-user>

      <btn-del action="{{ route('WeChat.admin.material.destroy',$material) }}" class="btn btn-outline-secondary btn-sm">
        删除
      </btn-del>
    </div>
  </div>
</div>
@endforeach
