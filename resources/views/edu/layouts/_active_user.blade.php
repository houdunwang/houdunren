<div class="card">
    <div class="card-header text-secondary">活跃用户</div>
    <div class="card-body">
        <ul class="list-unstyled u-list">
            @foreach(\App\User::limit(5)->latest('updated_at')->get() as $user)
                <li class="mb-3">
                    <a class="media" href="{{route('member.user.show',$user)}}">
                        <img class="u-avatar rounded-circle mr-3" src="{{$user->avatar}}"
                             alt="{{$user->name}}">
                        <div class="media-body">
                            <h6 class="text-secondary mb-0"
                                style="font-size: 14px;">{{$user->name}}</h6>
                            <span class="small text-muted"
                                  style="font-size: 12px;">{{$user->created_at->diffForHumans()}}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>