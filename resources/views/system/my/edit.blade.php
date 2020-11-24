@extends('system.layouts.master'))

@section('content')
<nav class="nav nav-tabs nav-stacked">
  <a class="nav-link " href="{{ route('system.index') }}">
    <i class="fa fa-home" aria-hidden="true"></i>
  </a>
  <a class="nav-link active" href="#">我的资料</a>
</nav>
<form action="{{ route('system.my.update') }}" method="post">
  @csrf
  @method('PUT')

  <div class="card mt-3">
    <div class="card-header">
      基本资料
    </div>
    <div class="card-body">
      <x-form name="name" title="昵称" required class="col-md-6" value="{{ user('name') }}"></x-form>
      <x-form name="email" title="邮箱" class="col-md-6" value="{{ user('email') }}"></x-form>
      <x-form name="mobile" title="手机号" class="col-md-6" value="{{ user('mobile') }}"></x-form>
      <x-form name="home" title="主页" class="col-md-6" value="{{ user('home') }}"></x-form>
      <x-form name="weibo" title="微博" class="col-md-6" value="{{ user('weibo') }}"></x-form>
      <x-form name="wechat" title="微信" class="col-md-6" value="{{ user('wechat') }}"></x-form>
      <x-form name="github" title="github" class="col-md-6" value="{{ user('github') }}"></x-form>
      <x-form name="qq" title="qq" class="col-md-6" value="{{ user('qq') }}"></x-form>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-header">
      设置密码
    </div>
    <div class="card-body">
      <x-form type="password" name="password" title="密码" class="col-md-6"></x-form>
      <x-form type="password" name="password_confirmation" title="确认密码" class="col-md-6"></x-form>

    </div>
  </div>
  <button class="btn btn-primary mt-3">保存</button>

</form>
@endsection
