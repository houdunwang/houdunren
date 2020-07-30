@extends('edu::layouts.front')
@section('title',site()['title'])

@section('content')
{{-- <script src="https://cdn.bootcdn.net/ajax/libs/hls.js/8.0.0-beta.3/hls.min.js"></script>
<video id="video" controls></video>
<script>
    let video = document.getElementById('video');
    let videoSrc = 'http://live.houdunren.com/houdunren/xj.m3u8?auth_key=1596005401-0-0-dd01d8caf62de842ed41762305f9fb75';
  if (Hls.isSupported()) {
    let hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      video.play();
    });
  }
  else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = videoSrc;
    video.addEventListener('loadedmetadata', function() {
      video.play();
    });
  }
</script>
<h1>okkk</h1> --}}
<div>
    <div class="container mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12 col-sm-9 mt-2">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        社区动态
                        <a href="{{ route('Edu.front.topic.create') }}" class="btn btn-outline-secondary btn-sm">发表</a>
                    </div>
                    <div class="card-body">
                        @foreach ($topics as $topic)
                        @include('edu::components.topic',$topic)
                        @endforeach

                        @foreach ($activities as $activity)

                        @if ($activity->subject && $activity->subject_type)
                        @php
                        $info = explode('\\',$activity->subject_type)
                        @endphp
                        @include('edu::components.activity.'.strtolower(array_pop($info)))
                        @endif

                        @endforeach
                        <div class="pt-3">
                            @include('edu::layouts.paginate',['data'=>$activities])
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-3 mt-2">
                @include('edu::components.tip')
                @include('edu::components.learn')
            </div>
        </div>
    </div>
</div>

@endsection
