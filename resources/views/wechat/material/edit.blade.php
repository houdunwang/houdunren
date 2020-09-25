@extends('layouts.wechat')

@section('content')
@include('wechat.material.nav')

@csrf
@switch($type)
@case('image')
<chat-material-image :id="{{ $material['id'] }}"></chat-material-image>
@break
@case('voice')
<chat-material-voice :id="{{ $material['id'] }}"></chat-material-voice>
@break
@default
@endswitch

@endsection
