@if(config_get('edu.is_live'))
    @if(Browser::isMobile() || Browser::isTablet())
        <div class="text-center mt-5">
            <a href="https://live.bilibili.com/8176658" target="_blank"
               class="btn btn-primary">进行直播间</a>
        </div>
    @else
        <div class="container mt-3">
            <div class="card">
                {{--<div class="card-header">--}}
                {{--{{config_get('edu.live_title')}}--}}
                {{--</div>--}}
                <embed width="100%" height="660px" allownetworking="all" allowscriptaccess="always"
                       src="{{config_get('edu.live_path')}}"
                       quality="high" bgcolor="#000" wmode="window" allowfullscreen="true"
                       allowFullScreenInteractive="true" type="application/x-shockwave-flash">

                <div class="card-footer text-muted text-center">
                    <a href="https://live.bilibili.com/8176658" target="_blank"
                       class="btn btn-outline-secondary btn-xs">进入直播间聊聊</a>
                    <a href="https://ke.qq.com/course/288236?tuin=89184f12" target="_blank"
                       class="btn btn-outline-secondary btn-xs">腾讯课堂报名</a>
                </div>
            </div>
        </div>
    @endif
@endif