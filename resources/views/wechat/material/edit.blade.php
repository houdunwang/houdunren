@extends('layouts.wechat')

@section('content')
@include('wechat.material.nav')

@csrf
@switch($type)
@case('image')
<chat-material-image :id="{{ $material['id'] }}"></chat-material-image>
@break
@case('article')
@break
@default
@endswitch

@endsection
