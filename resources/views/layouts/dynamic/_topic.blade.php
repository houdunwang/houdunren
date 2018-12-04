<li class="mt-0 edu-dynamic-list">
    <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
        <div class="row justify-content-sm-between align-items-sm-center">
            <div class="col-sm-10 mb-2 mb-sm-0 item">
                <a href="{{route('member.user.show',$cond->causer)}}" class="float-left">
                    <img class="u-sm-avatar rounded-circle mr-3" src="{{$cond->causer->avatar}}">
                </a>
                <a href="{{route('member.user.show',$cond->causer)}}"
                   class="text-secondary pt-1" style="display: inline-block;">
                    {{$cond->causer->name}}
                </a>
                <span class="badge badge-light text-secondary small">
                    {{$cond->description=='updated'?'更新了':'发表了'}}
                </span>
                <a href="{{$cond->subject->link()}}" class="text-secondary">
                    {{$cond->subject->title()}}
                </a>
            </div>
            <span class="col-sm-2 text-text text-sm-right small text-secondary">
                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$cond->created_at->diffForHumans()}}
            </span>
        </div>
    </div>
</li>