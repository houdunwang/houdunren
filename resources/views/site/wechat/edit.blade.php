@extends('layouts.admin')
@section('content')
    @include('site.wechat._tabs')
    <form action="{{route('site.wechat.update',[$site,$wechat])}}" method="post">
        @csrf @method('PUT')
        @include('site.wechat._form')
    </form>
@endsection