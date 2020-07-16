<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
        <a href="/edu/center/topic/18907" class="mt-3 d-flex flex-column align-items-center">
            <img src="{{ $topic->user->avatar }}" class="rounded-circle border" style="width:80px;">
            <span class="text-secondary mt-2">{{ $topic->user->name }}</span>
        </a>
    </div>
    <div class="card-body text-center">
        <i class="fa fa-envelope mr-2  text-secondary"></i>
        <i class="fab fa-weibo  mr-2 text-secondary "></i>
        <i class="fab fa-weixin   mr-2  text-secondary "></i>
        <i class="fab fa-github   mr-2   text-secondary"></i>
        <i class="fab fa-qq    mr-2  text-secondary"></i>
    </div>
    <div class="text-center pb-3">
        <a href="{{ route('common.follower',$user) }}" data-container="body" data-toggle="popover" data-placement="top"
            data-trigger="hover" data-original-title="" title=""
            class="btn btn-sm {{ user()->isFollower?'btn-success':'btn-outline-success' }}">
            <i class="fa fa-plus"></i>
            关注 TA
        </a>
        <a href="{{ route('common.favour',['User',user()]) }}" data-container="body" data-toggle="popover"
            data-placement="top" data-trigger="hover" data-content="收到 0 个赞" data-original-title="" title=""
            class="btn btn-sm {{ user()->isFavour?'btn-info':'btn-outline-info' }}">
            <i class="fas fa-heart "></i>
            点个赞呗
        </a>
    </div>
</div>
