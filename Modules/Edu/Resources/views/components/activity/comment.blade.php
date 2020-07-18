<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ route('Edu.space.topic',$comment->user) }}" class="">
        <span class="mr-3 ant-avatar ant-avatar-square ant-avatar-image">
            <img src="{{ $comment->user->avatar }}" class="w45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{$comment->link()}}" class="text-secondary h5">
            {{ strip_tags($comment->content) }}
        </a>
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
