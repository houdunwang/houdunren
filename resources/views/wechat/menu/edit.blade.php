@extends('layouts.admin')
@section('content')
@include('wechat.nav')

<chat-menu :siteid="{{ $site->id }}" :wechatid="{{ $wechat->id }}" :menus='@json($wechat->menus??[])'>
</chat-menu>
@endsection
