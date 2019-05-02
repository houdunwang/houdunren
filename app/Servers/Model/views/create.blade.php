@extends('layouts.module')
@section('content')
    @include('{LOWER_MODULE}::admin.{LOWER_NAME}._tab')
    <form action="{{module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.store')}}" method="post">
        @csrf
        @include('{LOWER_MODULE}::admin.{LOWER_NAME}._form')
    </form>
@stop