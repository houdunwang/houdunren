@extends('layouts.module.master')
@section('content')
@include('edu::admin.lesson._nav')
<form action="{{ route('Edu.admin.lesson.update',$lesson) }}" method="post">
  @csrf
  @method('PUT')
  @include('edu::admin.lesson._form')
</form>

@endsection
