<div class="text-center pb-3">
    <a href="{{ route('common.follower',$user) }}" data-container="body" data-toggle="popover" data-placement="top"
        data-trigger="hover" data-original-title="" title=""
        class="btn btn-sm {{ $user->isFans?'btn-success':'btn-outline-success' }}">
        <i class="fa fa-plus"></i>
        关注 TA
    </a>
    <a href="{{ route('common.favour',['User',$user]) }}" data-container="body" data-toggle="popover"
        data-placement="top" data-trigger="hover" data-content="收到 0 个赞" data-original-title="" title=""
        class="btn btn-sm {{ $user::find($user['id'])->isFavour?'btn-info':'btn-outline-info' }}">
        <i class="fas fa-heart "></i>
        点个赞呗
    </a>
</div>
