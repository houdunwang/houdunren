@extends('edu.layouts.master')
@section('content')
    <div class="container mt-0">
        <div class="{{route_class()}}">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col video-box">
                                <video id="video" playsinline="" webkit-playsinline=""
                                       class="video-js vjs-big-play-centered VideoSpeed"
                                       controls preload="auto" data-setup="{}"
                                       style="width:100%; height:100%;object-fit:contain">
                                    <source src="http://houdunren.oss-cn-hangzhou.aliyuncs.com/houdunren/5a5sccXbTs.mp4"
                                            type="video/mp4">
                                    <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                                    <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                                    <p class="vjs-no-js">
                                        要查看此视频，请启用JavaScript，并考虑升级到web浏览器
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                            video</a>
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
                                            <ul class="list-group list-group-flush small">
                                                @foreach($video->lesson->video as $v)
                                                    @if($video->id == $v['id'])
                                                        <a href="{{route('edu.video.show',$v)}}"
                                                           class="text-primary list-group-item  px-0">
                                                            {{$v->title}}
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{route('edu.video.show',$v)}}"
                                                           class="text-muted list-group-item d-flex align-items-center justify-content-between px-0">
                                                            &nbsp;{{$v->title}}
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
                                        <img src="{{$video->lesson->user->icon}}"
                                             class="u-avatar avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h5 class="card-title mb-1 text-secondary">
                                        {{$video->title}}
                                    </h5>
                                    <p class="card-text small text-muted">
                                        <a href="{{route('edu.lesson.show',$video->lesson)}}"
                                           class="text-secondary">
                                            <i class="fa fa-folder-o" aria-hidden="true"></i> {{$video->lesson->title}}
                                        </a>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{$video->lesson['updated_at']->format('Y-m-d')}}
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:;" onclick="videoCata()"
                                       class="btn u-btn-primary--air transition-3d-hover mb-1 btn-xs">
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
                <div class="col-12 col-lg-12">
                   @include('common.comment',['model'=>$video])
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
            hdjs.scrollTo('body', '#video', 1000, {queue: true});
        });
    </script>
@endpush
