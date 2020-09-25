@extends('layouts.wechat')

@section('content')
@include('wechat.material.nav')
<wang-editor></wang-editor>
@csrf
@switch($type)

@case('image')
<chat-material-image></chat-material-image>
@break
@case('voice')
<chat-material-voice></chat-material-voice>
@break
@default

@endswitch

@endsection
