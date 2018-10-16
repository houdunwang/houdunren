<li class="list-group-item px-0">
    <div class="row">
        <div class="col-auto">
            <a class="avatar" href="{{route('member.user.show',$activity->causer->id)}}">
                <img src="{{$activity->causer->icon}}" alt="..." class="avatar-img rounded">
            </a>
        </div>
        <div class="col ml--2">
            <h4 class="card-title mb-2 name">
                <a href="{{route('member.user.show',$activity->causer)}}" class="text-secondary">
                    {{$activity->causer->name}}
                </a>
                <span class="text-secondary">评论了</span>
                <a href="{{$activity->subject->belongModel->link('#comment-'.$activity->subject->id)}}" class="text-secondary">
                    {{$activity->subject->belongModel->getTitle()}}
                </a>
            </h4>
            <p class="card-text small text-muted">
                <i class="fe fe-clock"></i> {{$activity->created_at->diffForHumans()}}
            </p>
        </div>
    </div>
</li>
