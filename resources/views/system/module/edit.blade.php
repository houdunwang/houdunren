@extends('layouts.system')
@section('content')
    <form action="{{route('system.module.update',$module)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('system.module._form')
    </form>
@stop