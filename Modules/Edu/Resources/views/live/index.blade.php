@extends('edu::layouts.front')
@push('scripts')
<script src="https://cdn.bootcdn.net/ajax/libs/hls.js/8.0.0-beta.3/hls.min.js"></script>

<script>
    let video = document.getElementById('video');
  let videoSrc = "{{ config('module.play.hls') }}";

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
@endpush
@section('content')

{{-- @if (config('module.is_live')) --}}
<div id="app">
    <div class="video" style="background: #262b36">
        <div class="container">
            <div class="row">
                <div class="col-12 {{ config('module.live.show_chat')==1?'col-md-8 pr-md-0 ':'' }} ">
                    <video id="video" width="100%" controls></video>
                </div>
                @if (config('module.live.show_chat')==1)
                <div class="d-none d-sm-block flex-fill">
                    <live-chat></live-chat>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success mt-3" role="alert">
                <i class="fas fa-info-circle"></i> {{ config('module.live.notice') }}
            </div>
        </div>
    </div>
</div>

@if (is_master())
<div class="container search mt-2 mb-3">
    <div class="row">
        <div class="col-12">
            <div class=" bg-white border p-3">
                <div class="card ">
                    <div class="card-header">
                        推流数据
                    </div>
                    <div class="card-body">
                        <x-form name="push.url" value="{{ config('module.push.url') }}" title="推流地址"></x-form>
                        <x-form name="push.key" value="{{ config('module.push.key') }}" title="串流密钥"></x-form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        播放数据
                    </div>
                    <div class="card-body">
                        <x-form name="a" value="{{ config('module.play.flv') }}" title="flv地址"></x-form>
                        <x-form name="b" value="{{ config('module.play.hls') }}" title="hls地址"></x-form>
                        <x-form name="c" value="{{ config('module.play.rtmp') }}" title="rtmp地址"></x-form>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('Edu.front.live.push') }}" class="btn btn-info">推流</a>
                </div>
            </div>
        </div>


    </div>
</div>
@endif
@endsection
