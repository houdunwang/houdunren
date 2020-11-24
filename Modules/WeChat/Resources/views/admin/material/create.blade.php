@extends('layouts.module.master')
@section('content')
@include('wechat::admin.material.nav')
<chat-material-{{ $type }}></chat-material-{{  $type}}>
@endsection
