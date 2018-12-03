@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@inject('activityTransformer','App\Transformers\ActivityTransformer')
@section('content')
    @include('edu.layouts._live')
    @if(config_get('edu.notice'))
        <div class="container">
            <div class="card mt-5">
                <div class="card-body text-center text-secondary">
                    {!! config_get('edu.notice') !!}
                </div>
            </div>
        </div>
    @endif
    <div class="container {{route_class()}}">
        <div class="row pt-5">
            <div class="col-12">
                @include('edu.layouts._search')
            </div>
            <div class="col-sm-9">
                <div class="card border-bottom-0 rounded-0 shadow-sm">
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
                @include('layouts.dynamic')
            </div>
            <div class="col-sm-3">
                @include('edu.layouts._learning_dynamic',['row'=>8])
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
        <div class="card-deck d-block d-lg-flex mb-6 ">
            <div class="card mb-3 mb-lg-0 shadow">
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
            <div class="card shadow">
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
