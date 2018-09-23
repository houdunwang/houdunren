<ul class="list-group list-group-lg list-group-flush list my--4">
    @foreach($data as $video)
        <li class="list-group-item px-0">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('edu.video.show',$video)}}" class="avatar ">
                        <img src="{{$video->thumb}}" class="avatar-img rounded">
                    </a>
                </div>
                <div class="col ml--2">
                    <h4 class="card-title mb-3 name">
                        <a href="{{route('edu.video.show',$video)}}">
                            {{$video->title}}
                        </a>
                    </h4>
                    <p class="card-text small text-muted">
                        <span class="fe fe-user"></span> {{$article->user->name}} .
                        <i class="fe fe-clock"></i>  {{$article->created_at}}
                    </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
