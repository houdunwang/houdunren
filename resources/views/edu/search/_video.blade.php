<li class="my-2">
    <div class="u-info-v1 p-3">
        <div class="row justify-content-sm-between align-items-sm-center">
            <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;text-overflow:ellipsis;overflow: hidden;">
                <div class="row">
                    {{--<div class="col-12 col-sm-1">--}}
                        {{--<a href="{{route('member.user.show',$field->user)}}">--}}
                            {{--<img class="u-avatar rounded-circle mr-3" src="{{$field->user->icon}}">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    <div class="col-12 col-sm-11">
                        <a href="{{route('edu.video.show',$field)}}" class="text-dark">
                            {{$field->title}}
                        </a>
                        <br>
                        <a href="{{route('edu.lesson.show',$field->lesson)}}" class="text-secondary small">
                            <i class="fa fa-folder-o" aria-hidden="true"></i> {{$field->lesson->title}}
                        </a>
                    </div>
                </div>
            </div>
            <span class="col-sm-2 text-text text-sm-right small text-secondary">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                {{$field->created_at->diffForHumans()}}
            </span>
        </div>
    </div>
</li>
