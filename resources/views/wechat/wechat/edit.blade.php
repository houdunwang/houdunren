@extends('layouts.admin')

@section('content')
@include('wechat.nav')
<form action="{{ route("wechat.wechat.update",[$site,$wechat]) }}" method="post">
    @csrf
    @method('PUT')
    @include('wechat.wechat._form')
</form>
@endsection
