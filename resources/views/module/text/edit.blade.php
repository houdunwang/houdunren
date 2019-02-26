@extends('layouts.module')
@section('content')
    <form action="{{module_link('module.text.update',$text)}}" method="post">
        @csrf @method("PUT")
        @include('module.text._form')
    </form>
@endsection