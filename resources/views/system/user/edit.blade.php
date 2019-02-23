@extends('layouts.admin')
@section('content')
    <form action="{{route('user.update',$user)}}" method="post">
        @csrf @method('PUT')
        @include('user._form')
    </form>
@endsection