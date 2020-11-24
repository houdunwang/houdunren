@extends('layouts.module.master')
@section('content')
@include('wechat::admin.material.nav')
<chat-material-{{ $type }} :id="{{ $material['id'] }}"></chat-material-{{ $type}}>
@endsection
