@extends('layouts.admin')
@section('content')
    <form action="{{route('system.user.update',$user)}}" method="post">
        @csrf @method('PUT')
        @include('system.user._form')
    </form>
@endsection