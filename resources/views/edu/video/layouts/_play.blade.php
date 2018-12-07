<div class="card">
    <div class="row">
        <div class="col video-box">
            @if($video['path'])
                <video id="video" playsinline="" webkit-playsinline=""
                       class="video-js vjs-big-play-centered VideoSpeed"
                       controls preload="auto" data-setup="{}"
                       poster="{{asset('images/poster.jpg')}}"
                       style="width:100%; height:100%;object-fit:contain">
                    <source src="{{$video['path']}}" type="video/mp4">
                    <p class="vjs-no-js">
                        要查看此视频，请启用JavaScript，并考虑升级到web浏览器
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                            video</a>
                    </p>
                </video>
            @endif
            @if($video['external_address'])
                {!! $video['external_address'] !!}
            @endif
            {{--目录--}}
            <div class="col-12 col-lg-3 pl-0" id="category">
                <div class="video-lists p-0">
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
            {{--目录end--}}
        </div>
    </div>
    <div class="card-footer">
        <div class="row align-items-center">
            {{--<div class="col-auto">--}}
            {{--<a href="{{route('member.user.show',$video->lesson->user)}}" class="avatar avatar-lg">--}}
            {{--<img src="{{$video->lesson->user->icon}}"--}}
            {{--class="u-avatar avatar-img rounded-circle">--}}
            {{--</a>--}}
            {{--</div>--}}
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
                @include('edu.layouts._download_lesson',['lesson'=>$video->lesson])
                @if($nextVideo)
                    <a href="{{route('edu.video.show',$v)}}"
                       class="btn u-btn-primary--air transition-3d-hover mb-1 btn-xs">
                        上一课
                    </a>
                @endif
                @if($prevVideo)
                    <a href="{{route('edu.video.show',$v)}}"
                       class="btn u-btn-primary--air transition-3d-hover mb-1 btn-xs">
                        下一课
                    </a>
                @endif
                <a href="javascript:;" onclick="category()"
                   class="btn u-btn-primary--air transition-3d-hover mb-1 btn-xs">
                    课程目录
                </a>
            </div>
        </div>
    </div>
</div>