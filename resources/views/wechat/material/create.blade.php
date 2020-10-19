@extends('layouts.module.system')

@section('content')

@include('wechat.material.nav')
<chat-material-{{ $type }}></chat-material-{{  $type}}>
@endsection
