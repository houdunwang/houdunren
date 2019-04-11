@extends('layouts.system')
@section('content')
    <form action="{{route('develop.model.store',$module)}}" method="post">
        @csrf
        @include('develop.model._tab')
        @include('develop.model._form')
    </form>
@endsection