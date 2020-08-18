@extends('layouts.auth')
@section('content')
<login>
    @if (config('site.user.wechatweb_login'))
    <template v-slot:footer>
        <a href="{{ route('auth.login.wechat') }}">
            <i class="fa fa-weixin text-success" aria-hidden="true"></i> 微信登录 |
        </a>
    </template>
    @endif
</login>
@endsection
