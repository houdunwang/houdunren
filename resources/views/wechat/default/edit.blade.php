@extends('layouts.admin')
@section('content')
@include('wechat.nav')
<form action="{{ route('wechat.wechat.default.update',[$site,$wechat]) }}" method="post">
    @csrf
    @method("PUT")
    <div class="card mt-3">
        <div class="card-header">
            默认消息
        </div>
        <div class="card-body">
            <x-form theme="textarea" title="关注欢迎消息" name="welcome">{{ $wechat->welcome }}</x-form>
            <x-form theme="textarea" title="默认回复消息" name="default_message">{{ $wechat->default_message }}</x-form>
        </div>
    </div>

    <button class="btn btn-primary mt-3">保存</button>

</form>
@endsection
