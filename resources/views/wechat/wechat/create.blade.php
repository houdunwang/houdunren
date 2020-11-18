@extends('layouts.admin.master')
@section('content')
@include('wechat._nav')
<form action="{{ route('wechat.wechat.store',$site) }}" method="post">
  @csrf
  @include('wechat.wechat._form')
</form>
@endsection
