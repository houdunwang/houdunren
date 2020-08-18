<div class="comments">
    @foreach ($comments as $comment)
    <div id="comment-{{ $comment['id'] }}" class="card shadow-sm mb-2">
        <div class="card-header bg-white d-flex justify-content-start">
            <img src="{{ $comment->user->icon }}" class="rounded mr-3 w35 h35">
            <div class="flex-fill">
                <div class="text-secondary">
                    <a href="{{ route("Edu.space.topic",$comment->user) }}" class="">{{ $comment->user->name }}</a>
                </div>
                <span class="small text-black-50">
                    <i aria-hidden="true" class="fa fa-clock-o"></i>
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        <div class="card-body text-secondary pb-5 markdown">
            <div class="d-inline-block">
                {!! $comment->html !!}
            </div>
        </div>
        <link href="https://cdn.bootcdn.net/ajax/libs/github-markdown-css/4.0.0/github-markdown.min.css"
            rel="stylesheet">
        <div class="card-footer text-muted bg-white small">
            # {{ $loop->index+1 }}
            <a href="#" class="ml-2 mr-2">0个赞</a>
            <a href="#" class="d-inline-block mr-1">
                <i aria-hidden="true" class="fa fa-reply"></i> 回复
            </a>
            @can('delete', $comment)
            <form action="{{ route('common.comment.destroy',$comment) }}" method="post" class="d-inline-block">
                @csrf
                @method('delete')
                <button class="btn btn-sm small text-secondary" onclick="return confirm('确定删除吗？')">删除</button>
            </form>
            @endcan
        </div>
    </div>
    @endforeach

    <div class="card">
        <div class="card-header">
            发表评论
        </div>
        <editor name="content" action="">
        </editor>
        <div class="card-footer text-muted">
            <button class="btn btn-info">提交</button>
        </div>
    </div>
</div>

@push('styles')
<style>
    .comments img {
        max-width: 100%;
    }
</style>
@endpush
