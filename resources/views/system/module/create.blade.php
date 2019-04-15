@extends('layouts.system')
@section('content')
    <form action="{{route('system.module.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('system.module._form')
    </form>
@stop