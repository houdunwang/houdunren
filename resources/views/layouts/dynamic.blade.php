<ul class="list-unstyled mb-0" style="border-bottom: 1px solid #e7eaf3;">
    @inject('activityTransform','\App\Transformers\ActivityTransformer')
    @foreach($activityTransform->transform($activities->items()) as $activity)
        <li class="mt-0 edu-dynamic-list">
            <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                <div class="row justify-content-sm-between align-items-sm-center">
                    <div class="col-sm-10 mb-2 mb-sm-0 item">
                        <a href="{{route('member.user.show',$activity->causer)}}" class="float-left">
                            <img class="u-sm-avatar rounded-circle mr-3" src="{{$activity->causer->avatar}}">
                        </a>
                        <a href="{{route('member.user.show',$activity->causer)}}"
                           class="text-secondary pt-1" style="display: inline-block;">
                            {{$activity->causer->name}}
                        </a>
                        <span class="badge badge-light text-secondary small">
                            {{$activity->action}}
                        </span>
                        <a href="{{$activity->subject->link()}}" class="text-secondary">
                            {{$activity->subject->title()}}
                        </a>
                    </div>
                    <span class="col-sm-2 text-text text-sm-right small text-secondary">
                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$activity->created_at->diffForHumans()}}
            </span>
                </div>
            </div>
        </li>
    @endforeach
    @if($activities->total()>1)
        <li class="mt-0">
            <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                <div class="row justify-content-sm-between align-items-sm-center">
                    <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                        {!! $activities->links() !!}
                    </div>
                </div>
            </div>
        </li>
    @endif
</ul>