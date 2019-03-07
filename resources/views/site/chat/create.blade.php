@extends('layouts.site')
@section('content')
    @include('site.chat._tabs')
    <form action="{{route('site.chat.store',[$site])}}" method="post">
        @csrf
        @include('site.chat._form')
    </form>
@endsection