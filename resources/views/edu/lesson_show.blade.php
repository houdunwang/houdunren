@extends('edu.layouts.master')
@section('content')
    <div class="{{hd_route_class()}}">
        <div class="row">
            <div class="col-sm-12">
                <video id="my-video" class="video-js vjs-big-play-centered VideoSpeed" controls preload="auto" width="100%" height="550" data-setup="{}">
                    <source src="http://houdunren.oss-cn-hangzhou.aliyuncs.com/houdunren/5a5sccXbTs.mp4" type="video/mp4">
                    <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                    <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                    <p class="vjs-no-js">
                        要查看此视频，请启用JavaScript，并考虑升级到web浏览器
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="profile-posts.html" class="avatar avatar-lg">
                            <img src="{{$lesson->user->icon}}" class="avatar-img rounded-circle">
                        </a>
                    </div>
                    <div class="col ml--2">
                        <h4 class="card-title mb-1">
                            <a href="profile-posts.html">{{$lesson->user->name}}</a>
                        </h4>
                        <p class="card-text small text-muted mb-1">
                            {{$lesson->title}}
                        </p>

                        <p class="card-text small">
                            <span class="fe fe-clock"></span> {{$lesson['updated_at']}}
                        </p>

                    </div>
                    <div class="col-auto">
                        <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                            收藏课程
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--评论--}}
        <div class="row">
            <div class="col-sm-9">
                @include('common.comment',['model'=>$lesson])
            </div>
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header">
                            <span class="card-header-title text-muted">
                                社区公告
                            </span>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">
                                    <a href="" class="text-muted"> 晚八点直播</a>
                                </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">
                                    <a href="" class="text-muted">新手帮助</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.video('my-video', function (obj) {
            });
        })
    </script>
@endpush
