


<div class="card learning_dynamic">
    <div class="card-header text-secondary">学习动态</div>
    <div class="card-body">
        <ul class="list-unstyled">
            @foreach(app(\App\Repositories\EduUserVideoRepository::class)->dynamic($row) as $pivot)
                <li class="media u-indicator-ver-dashed-modern mb-3">
                    <a href="{{route('member.user.show',$pivot->user)}}">
                        <img class="u-icon u-icon--xs rounded-circle mr-3 " src="{{$pivot->user->avatar}}"
                             alt="{{$pivot->user->name}}">
                    </a>
                    <div class="media-body">
                        <h5 class="font-size-14 mb-1">
                            <a href="{{route('member.user.show',$pivot->user)}}">{{$pivot->user->name}}</a>
                        </h5>
                        <p class="small mb-0">
                            <a href="{{route('edu.video.show',$pivot->video)}}" class="text-secondary">
                                {{$pivot->video->title()}}
                            </a>
                        </p>
                        <small class="d-block text-muted">{{$pivot->updated_at->diffForHumans()}}</small>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>