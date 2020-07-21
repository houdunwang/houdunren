<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ route('Edu.space.topic',$comment->user) }}" class="">
        <span class="mr-3 ">
            <img src="{{ $comment->user->icon }}" class="w45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <div class="h5">
            @if ($comment->reply_user_id)
            回复了 <a href="{{ route("Edu.space.topic",$comment->reply_user) }}"
                class="text-primary">{{ $comment->reply_user->name }}</a> 在
            <a href="{{$comment->link()}}" class="text-secondary ">
                《{{ $comment->commentable->title }}》
            </a>发表的评论
            @else
            评论了 《{{ $comment->commentable->title }}》
            @endif
        </div>
        <div class="small text-black-50">
            <span class="badge badge-info">评论</span>

            <a href="{{ route('Edu.space.topic',$comment->user) }}" class="">{{ $comment->user->name }}</a>
            . 发表于 {{ $comment->updated_at->diffForHumans() }}
            {{-- <span>. 评论 {{ $comment['comment_count'] }}</span> --}}
            {{-- <span>. 点赞 {{ $comment['favour_count'] }}</span>
            <span>. 收藏 {{ $comment['favorite_count'] }}</span> --}}
        </div>

    </div>
</div>
