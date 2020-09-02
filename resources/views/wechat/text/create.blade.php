@extends('layouts.wechat')

@section('content')
@include('wechat.text.nav')

<form action="{{ route('wechat.text.store') }}" method="post">
    @csrf
    <chat-rule></chat-rule>
    <chat-text class="mt-3"></chat-text>
    <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
