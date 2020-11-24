@extends('system.layouts.master'))
@section('content')
@include('wechat.layouts._nav')

<chat-menu :siteid="{{ $site->id }}" :wechatid="{{ $wechat->id }}" :menus='@json($wechat->menus??[])'>
</chat-menu>
@endsection
