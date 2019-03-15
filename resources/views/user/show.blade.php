@extends('user.layouts.master')
@section('content')
    <h5><i class="fa fa-archive"></i> 他的动态</h5>
    <hr>
    <div class="border-gray mb-3">
        @foreach($activities as $activity)
            @if ($activity->subject)
                <div class="border-bottom border-gray mb-3">
                    <div class="media text-muted pt-1">
                        <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                            <h6 class="float-left">
                                <a href="{{$activity->subject->getLink()}}">
                                    {{$activity->subject->getTitle()}}
                                </a>
                            </h6>
                            <div class="small font-weight-light float-right">
                                <i class="fa fa-clock-o"></i> 2小时前
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        {{$activities->links()}}
    </div>
@endsection