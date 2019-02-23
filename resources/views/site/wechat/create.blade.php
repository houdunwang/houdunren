@extends('layouts.admin')
@section('content')
    @include('site.wechat._tabs')
    <form action="{{route('site.wechat.store',[$site])}}" method="post">
        @csrf
        @include('site.wechat._form')
    </form>
@endsection