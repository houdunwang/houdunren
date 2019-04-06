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
        @include('components.user_icon',$user)
    </div>
    @auth
        <div class="text-center pb-3">
            @if ($user->hasFans(auth()->user()))
                <a href="{{route('member.follow.make',$user)}}" class="btn btn-success btn-sm"
                   data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover"
                   data-content="共有 {{$user->fans->count()}} 个粉丝">
                    <i class="fa fa-plus"></i> 已关注
                </a>
            @else
                <a href="{{route('member.follow.make',$user)}}" class="btn btn-outline-success btn-sm"
                   data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover"
                   data-content="共有 {{$user->fans->count()}} 个粉丝">
                    <i class="fa fa-plus"></i> 关注 TA
                </a>
            @endif
            @if ($user->isFavour())
                <a href="{{route('member.favour.make',['model'=>'App-User','id'=>$user['id']])}}"
                   class="btn btn-info btn-sm"
                   data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover"
                   data-content="收到 {{$user->favour_count}} 个赞">
                    <i class="fa fa-heart"></i> 感谢点赞
                </a>
            @else
                <a href="{{route('member.favour.make',['model'=>'App-User','id'=>$user['id']])}}"
                   class="btn btn-outline-info btn-sm"
                   data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover"
                   data-content="收到 {{$user->favour_count}} 个赞">
                    <i class="fa fa-heart-o"></i> 点个赞呗
                </a>
            @endif
        </div>
    @endauth
</div>
