@extends('layouts.system')
@section('content')
    <form action="{{route('system.module.update',$module)}}" method="post">
        @csrf @method('PUT')
        @include('system.module._form')
    </form>
@stop