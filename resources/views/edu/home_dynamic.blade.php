@extends('edu.layouts.master')
@section('content')
    <div class="container {{route_class()}}">
        <div class="row p-5">
            <div class="col-12">
                <div class="mb-3">
                    <span class="text-muted font-weight-bold">网站动态</span>
                    <div class="position-relative float-right">
                        <a id="dropdownBasicExampleInvoker" class="u-unfold-wrapper" href="javascript:;" role="button" aria-controls="dropdownBasicExample" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#dropdownBasicExample" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            发布贴子
                            <span class="fa fa-angle-down u-unfold__icon-pointer"></span>
                        </a>
                        <div id="dropdownBasicExample" class="u-unfold mt-2 u-unfold--css-animation u-unfold--hidden" aria-labelledby="dropdownBasicExampleInvoker" style="animation-duration: 300ms;">
                            @foreach(\App\Models\EduCategory::get() as $category)
                            <a class="u-list__link" href="{{route('edu.topic.create',['id'=>$category['id']])}}">{{$category['title']}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <ul class="list-unstyled mb-0">
                    @foreach($activitys as $activity)
                        @if($activity->subject && $activity->causer)
                            @switch($activity->log_name)
                                @case('comment')
                                @include('edu.dynamic._comment')
                                @break
                                @case('edu_topic')
                                @include('edu.dynamic._topic')
                                @break
                                @case('edu_lesson')
                                @include('edu.dynamic._lesson')
                                @break
                            @endswitch
                        @endif
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
