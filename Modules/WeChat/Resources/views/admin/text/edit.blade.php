@extends('layouts.module.admin')

@section('content')
@include('wechat::admin.text.nav')

<form action="{{ route('WeChat.admin.text.update',$text) }}" method="post">
  @csrf
  @method('PUT')
  <x-wechat.keyword :rid="$text->rule_id"></x-wechat.keyword>
  <chat-text class="mt-3" :id="{{ $text['id'] }}"></chat-text>
  <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
