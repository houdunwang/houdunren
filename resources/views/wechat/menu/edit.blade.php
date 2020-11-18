@extends('layouts.admin.master')
@section('content')
@include('wechat._nav')

<chat-menu :siteid="{{ $site->id }}" :wechatid="{{ $wechat->id }}" :menus='@json($wechat->menus??[])'>
</chat-menu>
@endsection
