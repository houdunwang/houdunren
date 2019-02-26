@extends('layouts.module')
@section('content')
    <form action="{{module_link('module.text.store')}}" method="post">
        @csrf
        @include('module.text._form')
    </form>
@endsection