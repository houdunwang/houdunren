@extends('member.layouts.master')

@section('content')
<form action="{{ route('member.base.store') }}" method="post">
  @csrf
  <div class="card">
    <div class="card-header bg-white">
      我的资料
    </div>
    <div class="card-body">
      <div class="col-12 col-sm-6 p-0">
        <x-form name="name" title="昵称" required value="{{ user('name') }}"></x-form>
        <x-form name="home" title="个人网站" value="{{ user('home') }}"></x-form>
        <x-form name="weibo" title="微博帐号" value="{{ user('weibo') }}"></x-form>
        <x-form name="wechat" title="微信号" value="{{ user('wechat') }}"></x-form>
        <x-form name="github" title="GITHUB" value="{{ user('github') }}"></x-form>
        <x-form name="qq" title="QQ" value="{{ user('qq') }}"></x-form>
        <x-form name="wakatime" title="wakatime" value="{{ user('wakatime') }}"></x-form>
      </div>
    </div>

    <div class="card-footer bg-white">
      <button class="btn btn-primary">保存</button>
    </div>
  </div>
</form>

@endsection
