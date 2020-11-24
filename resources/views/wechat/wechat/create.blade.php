@extends('system.layouts.master')
@section('content')
@include('wechat.layouts._nav')
<form action="{{ route('wechat.wechat.store',$site) }}" method="post">
  @csrf
  @include('wechat.wechat._form')
</form>
@endsection
