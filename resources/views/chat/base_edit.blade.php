@extends('layouts.admin')
@section('menu')
    @include('chat.layouts.menu')
@endsection
@section('content')
    <form action="{{route('chat.base.update',$base)}}" method="post">
        @csrf @method('PUT')
        @include('chat.layouts._base')
    </form>
@endsection
