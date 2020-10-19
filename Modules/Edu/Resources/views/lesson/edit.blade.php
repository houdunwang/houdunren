@extends('layouts.module.admin')

@section('content')

@include('edu::lesson.nav')

<form action="{{ route('Edu.admin.lesson.update',$lesson) }}" method="post">
  @csrf
  @method('PUT')
  @include('edu::lesson.form')
</form>

@endsection
