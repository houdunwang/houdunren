@extends('edu.layouts.master')
@section('content')
    <div class="container {{route_class()}}">
        <div class="row p-5">
            <div class="col-12">
                <div class="w-md-80 w-lg-60 mb-3">
                    <span class="text-muted font-weight-bold">网站动态</span>
                </div>
                <hr>
                <ul class="list-unstyled mb-0">
                    @foreach($activitys as $activity)
                        @switch($activity->log_name)
                            @case('comment')
                            {{--@include('edu.dynamic._comment')--}}
                            @break
                            @case('edu_topic')
                            @include('edu.dynamic._topic')
                            @break
                            @case('edu_lesson')
                            {{--@include('edu.dynamic._lesson')--}}
                            @break
                        @endswitch
                    @endforeach
                </ul>
                <div class="mt-5">
                    {!! $activitys->links() !!}
                </div>
            </div>

            <div class="col-3">

            </div>
        </div>
    </div>
@endsection
