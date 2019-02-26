@extends('layouts.admin')
@section('content')
    @include('site.chat._tabs')
    <form action="{{route('site.chat.update',[$site,$chat])}}" method="post">
        @csrf @method('PUT')
        @include('site.chat._form')
    </form>
@endsection