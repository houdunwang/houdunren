<div class="card shadow-sm  border-0 rounded-0">
    <a href="{{route('member.icon.index')}}" class="d-block">
        <img src="{{$user['avatar']}}" class="card-img-top rounded-0">
    </a>
    <div class="card-body">
        <a class="card-title text-secondary" href="{{route('member.info.index')}}">
            <h5>{{$user['name']}}</h5>
        </a>
        <div class="dropdown-divider"></div>
        <div class="text-left">
            @if ($user['email'])
                <a class="mb-0 mr-2" href="mailto:{{$user['email']}}">
                    <i class="fa fa-envelope text-info"></i>
                </a>
            @endif
            @if ($user['weibo'])
                <a class="mb-0 mr-2" href="{{$user['home']}}">
                    <i class="fa fa-home text-info"></i>
                </a>
            @endif
            @if ($user['weibo'])
                <a class="mb-0 mr-2" href="{{$user['weibo']}}">
                    <i class="fa fa-weibo text-info"></i>
                </a>
            @endif
            @if ($user['github'])
                <a class="mb-0 mr-2" href="{{$user['github']}}">
                    <i class="fa fa-github text-info"></i>
                </a>
            @endif
            @if ($user['qq'])
                <a class="mb-0 mr-2" href="{{$user['qq']}}">
                    <i class="fa fa-qq text-info"></i>
                </a>
            @endif
        </div>
    </div>
</div>