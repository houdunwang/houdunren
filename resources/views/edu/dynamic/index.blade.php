@extends('edu.layouts.master')
@section('content')
    @include('edu.layouts._live')
    <div class="container {{route_class()}}">
        <div class="row pt-5">
            <div class="col-12">
                @include('edu.layouts._search')
            </div>
            <div class="col-sm-9">
                <div class="card border-bottom-0 rounded-0">
                    <div class="card-header border-bottom-0">
                        <span class="text-muted">动态</span>
                        <div class="position-relative float-right">
                            <a class="btn btn-primary btn-xs p-1 pl-2 pr-2 text-white"
                               href="{{route('edu.topic.create',['id'=>1])}}">
                                发表
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled mb-0">
                    @foreach($condition as $cond)
                        <li class="mt-0">
                            <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                                <div class="row justify-content-sm-between align-items-sm-center">
                                    <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                                        <a href="{{route('member.user.show',$cond['activity']->causer)}}"
                                           class="float-left">
                                            <img class="u-sm-avatar rounded-circle mr-3"
                                                 src="{{$cond['activity']->causer->avatar}}">
                                        </a>
                                        <a href="{{route('member.user.show',$cond['activity']->causer)}}"
                                           class="text-secondary pt-1" style="display: inline-block;">
                                            {{$cond['activity']->causer->name}}
                                        </a>
                                        <span class="badge badge-light text-secondary small">{{$cond['active']}}</span>
                                        <a href="{{$cond['link']}}" class="text-secondary">
                                            {{$cond['title']}}
                                        </a>
                                    </div>
                                    <span class="col-sm-2 text-text text-sm-right small text-secondary">
                                       <i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{$cond['activity']->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{--@foreach($activitys as $activity)--}}
                    {{--@if($activity->subject && $activity->causer)--}}
                    {{--@switch($activity->log_name)--}}
                    {{--@case('comment')--}}
                    {{--@include('edu.dynamic._comment')--}}
                    {{--@break--}}
                    {{--@case('edu_topic')--}}
                    {{--@include('edu.dynamic._topic')--}}
                    {{--@break--}}
                    {{--@case('edu_lesson')--}}
                    {{--@include('edu.dynamic._lesson')--}}
                    {{--@break--}}
                    {{--@case('edu_zan')--}}
                    {{--@include('edu.dynamic._zan')--}}
                    {{--@break--}}
                    {{--@endswitch--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    <li class="mt-0">
                        <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                            <div class="row justify-content-sm-between align-items-sm-center">
                                <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                                    {!! $activitys->links() !!}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header text-secondary">
                        常用文档
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled u-list">
                            <li>
                                <a class="u-list__link" href="/edu/document/5">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Laravel 5.7 中文手册
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header text-secondary">
                        活跃用户
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled u-list">
                            @foreach(\App\User::limit(5)->latest('updated_at')->get() as $user)
                                <li class="mb-3">
                                    <a class="media" href="{{route('member.user.show',$user)}}">
                                        <img class="u-avatar rounded-circle mr-3" src="{{$user->avatar}}"
                                             alt="{{$user->name}}">
                                        <div class="media-body">
                                            <h6 class="text-secondary mb-0"
                                                style="font-size: 14px;">{{$user->name}}</h6>
                                            <span class="small text-muted"
                                                  style="font-size: 12px;">{{$user->created_at->diffForHumans()}}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header text-secondary">
                        学习动态
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach(app(\App\Models\EduUserVideo::class)->limit(5)->latest()->get() as $pivot)
                                <li class="media u-indicator-ver-dashed-modern mb-3">
                                    <a href="{{route('member.user.show',$pivot->user)}}">
                                      <img class="u-icon u-icon--xs rounded-circle mr-3 " src="{{$pivot->user->avatar}}"
                                           alt="{{$user->name}}">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="font-size-14 mb-1">
                                            <a href="{{route('member.user.show',$pivot->user)}}">{{$pivot->user->name}}</a>
                                        </h5>
                                        <p class="small mb-1">
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
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                最新教程
            </div>
            <div class="card-body pt-0">
                <div class="row listAlias mt-5 edu-lesson-lists">
                    @foreach($lessons as $lesson)
                        <div class="col-12 col-md-6 col-xl-3">
                            <article class="bg-white shadow-sm mb-3">
                                <a href="{{route('edu.lesson.show',$lesson)}}">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100 rounded-top"
                                             src="{{$lesson['thumb']}}" alt="Image Description">
                                    </div>
                                    <div class="rounded-bottom p-2">
                                        <h4 class="lesson-title">
                                            <a href="{{route('edu.lesson.show',$lesson)}}" tabindex="0"
                                               class="text-secondary">
                                                {{$lesson['title']}}

                                            </a>
                                        </h4>
                                        <div class="small text-secondary row">
                                            <div class="col-12">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                {{$lesson['updated_at']->diffForHumans()}}
                                                <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                                {{$lesson->video_num}} 节课
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{route('edu.lesson.lists')}}" class="btn btn-secondary btn-xs">查看更多</a>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card-deck d-block d-lg-flex mb-6">
            <div class="card mb-3 mb-lg-0">
                <div class="card-body p-5">
                    <div class="media">
                        <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mr-4">
                          <i class="fa fa-video-camera mt-3" aria-hidden="true"></i>
                        </span>
                        <div class="media-body">
                            <span class="d-block font-size-32">{{\App\Models\EduVideo::count()}} </span>
                            <h2 class="h6 text-secondary font-weight-normal mb-0 pl-2">视频数</h2>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="card mb-3 mb-lg-0">--}}
            {{--<div class="card-body p-5">--}}
            {{--<div class="media">--}}
            {{--<span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mr-4">--}}
            {{--<i class="fa fa-file-code-o mt-3" aria-hidden="true"></i>--}}
            {{--</span>--}}
            {{--<div class="media-body">--}}
            {{--<span class="d-block font-size-32">{{\App\Models\EduTopic::count()}}</span>--}}
            {{--<h2 class="h6 text-secondary font-weight-normal mb-0 pl-1">话题</h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="card">
                <div class="card-body p-5">
                    <div class="media">
                        <span class="u-icon u-icon-warning--air u-icon--xl rounded-circle mr-4">
                          <i class="fa fa-user-circle-o mt-3" aria-hidden="true"></i>
                        </span>
                        <div class="media-body">
                            <span class="d-block font-size-32">{{\App\User::count()}} </span>
                            <h3 class="h6 text-secondary font-weight-normal mb-0 pl-2">会员数</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
