@extends('layouts.module.admin')

@section('content')

@include('edu::lesson.nav')

<form action="{{ route('Edu.admin.lesson.store') }}" method="post">
  @csrf
  @include('edu::lesson.form')
</form>

@endsection
