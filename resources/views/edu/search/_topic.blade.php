<ul class="list-group list-group-lg list-group-flush list my--4">
    @foreach($data as $topic)
        <li class="list-group-item px-0">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('member.user.show',$topic->user)}}" class="avatar">
                        <img src="{{$topic->user->icon}}" class="avatar-img rounded">
                    </a>
                </div>
                <div class="col ml--2">
                    <h4 class="card-title mb-3 name">
                        <a href="{{route('edu.topic.show',$topic)}}">
                            {{$topic->title}}
                        </a>
                    </h4>
                    <p class="card-text small text-muted">
                        <span class="fe fe-user"></span> {{$topic->user->name}} .
                        <i class="fe fe-clock"></i> {{$topic->created_at}}
                    </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
