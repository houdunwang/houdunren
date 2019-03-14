<div class="card rounded mb-2 shadow-sm">
    <div class="card-header bg-white text-center border-0">
        <a href="{{route('user.home',$user)}}">
            <img src="{{asset($user['avatar'])}}" class="img-thumbnail rounded-circle" style="width: 100px;height:100px;">
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
</div>