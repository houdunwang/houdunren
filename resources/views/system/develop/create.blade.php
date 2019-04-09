@extends('layouts.system')
@section('content')
    <form action="{{route('system.develop.store',$module)}}" method="post">
        @csrf
        @include('system.develop._tab')
        @include('system.develop._form')
    </form>
@endsection