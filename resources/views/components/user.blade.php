<div class="card rounded mb-2 shadow-sm">
    <div class="card-header bg-white text-center border-0">
        <a href="{{route('user.home',$user)}}">
            <img src="{{asset($user['avatar'])}}" class="img-thumbnail rounded-circle"
                 style="width: 100px;height:100px;">
        </a>
    </div>
    <div class="card-header bg-white text-center">
        {{$user['name']}}
    </div>
    <div class="card-body text-center">
        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
            <i class="fa fa-envelope {{active_class($user['email'],'text-info')}}"></i>
        </a>
        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
            <i class="fa fa-weibo {{active_class($user['weibo'],'text-info')}}"></i>
        </a>
        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
            <i class="fa fa-github {{active_class($user['github'],'text-info')}}"></i>
        </a>
        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
            <i class="fa fa-qq {{active_class($user['qq'],'text-info')}}"></i>
        </a>
    </div>
    <div class="text-center pb-3">
        @if ($user->hasFans(auth()->user()))
            <a href="{{route('member.follow.make',$user)}}" class="btn btn-outline-success btn-sm">
                <i class="fa fa-plus"></i> 关注 TA
            </a>
        @else
            <a href="{{route('member.follow.make',$user)}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> 已关注
            </a>
        @endif
        @if (auth()->user()->isFavour())
            <a href="{{route('member.favour.make',['model'=>'App-User','id'=>$user['id']])}}"
               class="btn btn-info btn-sm">
                <i class="fa fa-heart"></i> 感谢点赞
            </a>
        @else
            <a href="{{route('member.favour.make',['model'=>'App-User','id'=>$user['id']])}}"
               class="btn btn-outline-info btn-sm">
                <i class="fa fa-heart-o"></i> 点个赞呗
            </a>
        @endif

    </div>
</div>