<div class="card rounded shadow-sm mb-2">
  <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
    <a href="{{ route("Edu.space.topic",$user) }}" class="mt-3 d-flex flex-column align-items-center">
      <img src="{{ $user->icon }}" class="rounded-circle border" style="width:150px;height:150px;">
      <span class="text-secondary mt-2">{{ $user->name }}</span>
    </a>
  </div>
  <div class="card-body text-center text-secondary ">
    <i aria-hidden="true" class="fa fa-home mr-1 {{ $user['home']?'text-info':'' }}"></i>
    <i aria-hidden="true" class="fa fa-envelope mr-1 {{ $user['email']?'text-info':'' }}"></i>
    <i aria-hidden="true" class="fab fa-weibo mr-1 {{ $user['weibo']?'text-info':'' }}"></i>
    <i aria-hidden="true" class="fab fa-weixin mr-1 {{  $user['wechat']?'text-info':'' }}"></i>
    <i aria-hidden="true" class="fab fa-github mr-1 {{ $user['github']?'text-info':'' }}"></i>
    <i aria-hidden="true" class="fab fa-qq mr-1 {{ $user['qq']?'text-info':'' }}"></i>
  </div>
  @include('edu::layouts._user_btns')
</div>
