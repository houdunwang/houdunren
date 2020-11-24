@extends('system.layouts.master'))
@section('content')
@include('wechat.layouts._nav')
<form action="{{ route('wechat.wechat.update',[$site,$wechat]) }}" method="post">
  @csrf
  @method("PUT")
  @include('wechat.wechat._form')
</form>
@endsection
