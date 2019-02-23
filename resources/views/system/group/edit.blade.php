@extends('layouts.admin')
@section('content')
    <form action="{{route('system.group.update',$group)}}" method="post">
        @csrf @method('PUT')
        @include('system.group._form')
    </form>
@endsection