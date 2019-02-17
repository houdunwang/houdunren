@extends('layouts.admin')
@section('content')
    <form action="{{route('module.update',$module)}}" method="post">
        @csrf @method('PUT')
        @include('module._form')
    </form>
@stop