@extends('edu.layouts.master')
@section('content')
    <div class="{{hd_route_class()}}">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col video-box">
                            <video id="video" playsinline="" webkit-playsinline=""
                                   class="video-js vjs-big-play-centered VideoSpeed"
                                   controls preload="auto" data-setup="{}"
                                   style="width:100%; height:100%;object-fit:contain">
                                <source src="http://houdunren.oss-cn-hangzhou.aliyuncs.com/houdunren/5a5sccXbTs.mp4" type="video/mp4">
                                <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                                <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                                <p class="vjs-no-js">
                                    要查看此视频，请启用JavaScript，并考虑升级到web浏览器
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>
                        </div>
                        <div class="col-12 col-lg-3" id="videoCata">
                            <div class="card mb-0" style="border-radius: 0">
                                <div class="card-header pl-3">
                                    课程目录
                                </div>
                                <div class="card-body p-3">
                                    <div class="video-lists">
                                        <ul class="list-group list-group-flush">
                                            @foreach($lesson->video as $v)
                                                @if($video->id == $v['id'])
                                                    <a href="{{route('edu.video.show',$v)}}" class="text-secondary list-group-item d-flex align-items-center justify-content-between px-0">
                                                        <small> {{$v->title}}</small>
                                                        <i class="fe fe-check-circle text-success"></i>
                                                    </a>
                                                @else
                                                    <a href="{{route('edu.video.show',$v)}}" class="text-muted list-group-item d-flex align-items-center justify-content-between px-0">
                                                        <small> {{$v->title}}</small>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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
                                    {{$lesson->user->description}}
                                </p>
                                <p class="card-text small text-muted">
                                    <span class="fe fe-clock"></span> {{$lesson['updated_at']}}
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:;" onclick="videoCata()" class="btn btn-sm btn-white d-none d-md-inline-block">
                                    课程目录
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--评论--}}
        <div class="row">
            <div class="col-12 col-lg-9">
                @include('common.comment',['model'=>$video])
            </div>
            <div class="col-12 col-lg-3">
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
            hdjs.video('video', function (obj) {
            });
        })

        function videoCata() {
            $("#videoCata").toggle();
        }
        require(['hdjs'], function (hdjs) {
            hdjs.scrollTo('body','#video',1000, {queue:true});
        });
    </script>
@endpush
