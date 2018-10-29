<li class="my-2">
    <div class="u-info-v1 p-3">
        <div class="row justify-content-sm-between align-items-sm-center">
            <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                <a href="{{route('member.user.show',$field->user)}}">
                    <img class="u-avatar rounded-circle mr-3" src="{{$field->user->avatar}}">
                </a>
                <a href="{{route('edu.topic.show',$field)}}" class="text-dark">
                    {{$field->title}}
                </a>
            </div>
            <span class="col-sm-2 text-text text-sm-right small text-secondary">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                {{$field->created_at->diffForHumans()}}
                </span>
        </div>
    </div>
</li>
