<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ route('Edu.space.fans',$activity->subject->user) }}" class="mr-3">
        <span>
            <img src="{{ $activity->subject->user->icon }}" class="avatar45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{ route('Edu.front.topic.show',$activity->subject) }}" class="text-secondary h5">
            {{ $activity->subject->title }}
        </a>
        <div class="small text-black-50">
            <span class="badge badge-info">贴子</span>
            <a href="{{ route('Edu.space.fans',$activity->subject->user) }}" class="">
                {{ $activity->subject->user->name }}
            </a>
            . 更新于 {{ $activity->updated_at->diffForHumans() }}
            <span>. 评论 {{ $topic['comment_count'] }}</span>
            {{-- <span>. 点赞 {{ $topic['favour_count'] }}</span>
            <span>. 收藏 {{ $topic['favorite_count'] }}</span> --}}
        </div>

    </div>
</div>
