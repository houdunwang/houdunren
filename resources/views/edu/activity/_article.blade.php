<li class="list-group-item px-0">
    <div class="row">
        <div class="col-auto">
            <a class="avatar">
                <img src="{{$activity->causer->icon}}" alt="..." class="avatar-img rounded-circle">
            </a>
        </div>
        <div class="col ml--2">
            <h4 class="card-title mb-2 name">
                <a href="{{route('member.user.show',$activity->causer)}}">
                    {{$activity->causer->name}}
                </a>
                发表了
                <a href="{{route('edu.article.show',$activity->subject)}}">
                    {{$activity->subject->title}}
                </a>
            </h4>
            <p class="card-text small text-muted">
                <i class="fe fe-clock"></i> {{$activity->created_at->diffForHumans()}}
            </p>
        </div>
    </div>
</li>
