<ul class="list-unstyled mb-0">
    @inject('repository','App\Repositories\ActivityRepository')
    @if(isset($user))
        <?php $activities = $repository->userPaginateList($user, 15);?>
    @else
        <?php $activities = $repository->paginate(12);?>
    @endif
    @foreach($activities as $cond)
        @switch($cond['log_name'])
            @case('edu_topic')
            @include('layouts.dynamic._topic')
            @break
            @case('comment')
            @include('layouts.dynamic._comment')
            @break
            @case('zan')
            @include('layouts.dynamic._zan')
            @break
            @default
            @include('layouts.dynamic._default')
        @endswitch
    @endforeach
    <li class="mt-0">
        <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
            <div class="row justify-content-sm-between align-items-sm-center">
                <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                    {!! $activities->links() !!}
                </div>
            </div>
        </div>
    </li>
</ul>