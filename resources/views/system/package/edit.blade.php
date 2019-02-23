@extends('layouts.admin')
@section('content')
    <form action="{{route('system.package.update',$package)}}" method="post">
        @csrf @method('PUT')
        @include('system.package._form')
    </form>
@endsection