@extends('layouts.admin')
@section('content')
    <form action="{{route('module.store')}}" method="post">
        @csrf
        @include('module._form')
    </form>
@stop