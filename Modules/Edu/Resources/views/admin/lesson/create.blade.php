@extends('layouts.module.master')
@section('content')
@include('edu::admin.lesson._nav')
<form action="{{ route('Edu.admin.lesson.store') }}" method="post">
  @csrf
  @include('edu::admin.lesson._form')
</form>
@endsection
