<div class="bg-white shadow-sm border">
    <a href="{{ route('member.avatar.index') }}" style="height:200px; overflow: hidden;" class="d-block">
        <img src="{{ $user->icon }}" />
    </a>
    <div class="pt-0 p-3">
        <h6 class="text-muted">{{ $user->name }}</h6>
        <hr>
        <div class="d-flex justify-content-between text-muted">
            <i aria-hidden="true" class="fa fa-envelope {{ $user['email']?'text-info':'' }}"></i>
            <i aria-hidden="true" class="fas fa-phone-square {{ $user['mobile']?'text-info':'' }}"></i>
            <i aria-hidden="true" class="fab fa-weibo {{ $user['weibo']?'text-info':'' }}"></i>
            <i aria-hidden="true" class="fab fa-weixin {{  $user['wechat']?'text-info':'' }}"></i>
            <i aria-hidden="true" class="fab fa-github {{ $user['github']?'text-info':'' }}"></i>
            <i aria-hidden="true" class="fab fa-qq {{ $user['qq']?'text-info':'' }}"></i>
        </div>
    </div>
    @include('edu::components.user_btns')
</div>
