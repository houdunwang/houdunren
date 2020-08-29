@extends('layouts.admin')
@section('content')
@include('wechat.nav')
<form action="{{ route('wechat.wechat.store',$site) }}" method="post">
    @csrf
    @include('wechat.wechat._form')
</form>
@endsection
