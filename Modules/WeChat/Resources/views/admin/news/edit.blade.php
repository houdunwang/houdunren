@extends('layouts.module.admin')
@section('content')
@include('wechat::admin.news.nav')
<form action="{{ route('WeChat.admin.news.update',$news) }}" method="post">
  @csrf
  @method('PUT')
  <div class="alert alert-info mt-3 mb-3" role="alert">
    <i class="fas fa-info-circle"></i>
    微信公众号规则调整，图文消息只允许一条
  </div>
  <chat-rule :rid="{{ $news['rule_id'] }}"></chat-rule>
  <chat-news :id="{{ $news['id'] }}"></chat-news>
  <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
