@extends('layouts.auth')
@section('content')
<login>
    @if (config('site.user.wechatweb_login') && Browser::isDesktop())
    <template v-slot:footer>
        <a href="{{ route('auth.login.wechat') }}">
            <i class="fa fa-weixin text-success" aria-hidden="true"></i> |
        </a>
    </template>
    @endif

    @if (config('site.user.wechat_login') &&  is_wechat())
    <template v-slot:footer>
        <a href="{{ route('auth.login.wechat') }}">
            <i class="fa fa-weixin text-success" aria-hidden="true"></i> |
        </a>
    </template>
    @endif
</login>
@endsection
