@extends('layouts.module.system')

@section('content')
@include('wechat.material.nav')
<chat-material-{{ $type }} :id="{{ $material['id'] }}"></chat-material-{{ $type}}>
@endsection
