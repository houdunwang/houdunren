<ul class="list-group list-group-lg list-group-flush list my--4">
    @foreach($data as $article)
        <li class="list-group-item px-0">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('member.user.show',$article->user)}}" class="avatar ">
                        <img src="{{$article->user->icon}}" class="avatar-img rounded">
                    </a>
                </div>
                <div class="col ml--2">
                    <h4 class="card-title mb-3 name">
                        <a href="{{route('edu.article.show',$article)}}">
                            {{$article->title}}
                        </a>
                    </h4>
                    <p class="card-text small text-muted">
                        <span class="fe fe-user"></span> {{$article->user->name}} .
                        <i class="fe fe-clock"></i> {{$article->created_at}}
                    </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
