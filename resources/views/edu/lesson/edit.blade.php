@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.lesson.update',$lesson)}}" method="post">
        @csrf @method('PUT')
        @include('edu.lesson._lesson',['field'=>$field])
    </form>
@endsection
