@extends('layouts.wechat')

@section('content')

@include('wechat.material.nav')
<chat-material-{{ $type }}></chat-material-{{  $type}}>
@endsection
