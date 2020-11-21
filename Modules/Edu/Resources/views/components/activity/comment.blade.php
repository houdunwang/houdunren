<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
  <a href="{{ route('Edu.space.fans',$activity->subject->user) }}" class="mr-3">
    <span>
      <img src="{{ $activity->subject->user->icon }}" class="avatar45 rounded">
    </span>
  </a>
  <div class="d-flex flex-column justify-content-between">
    <div class="h5 text-muted">
      @if ($activity->subject->reply_user_id)
      回复了
      <a href="{{ route("Edu.space.fans",$activity->subject->reply_user) }}" class="text-blue">
        {{ $activity->subject->reply_user->name }}
      </a>
      在
      <a href="{{$activity->subject->link()}}" class="text-muted ">
        《{{ $activity->subject->commentable->title }}》
      </a>发表的评论
      @else
      评论了
      <a href="{{ $activity->subject->link() }}" class="text-muted">
        《{{ $activity->subject->commentable->title }}》
      </a>
      @endif
    </div>
    <div class="small text-black-50">
      <span class="badge badge-info">评论</span>

      <a href="{{ route('Edu.space.fans',$activity->subject->user) }}">
        {{ $activity->subject->user->name }}
      </a>
      . 发表于 {{ $activity->updated_at->diffForHumans() }}
      {{-- <span>. 评论 {{ $activity->subject['comment_count'] }}</span> --}}
      {{-- <span>. 点赞 {{ $activity->subject['favour_count'] }}</span>
      <span>. 收藏 {{ $activity->subject['favorite_count'] }}</span> --}}
    </div>

  </div>
</div>
