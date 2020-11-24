@extends('layouts.module.master')
@section('content')
@include('edu::admin.system._nav')
<form action="{{ route('Edu.admin.system.store') }}" method="post">
  @csrf
  @include('edu::admin.system._form')
</form>
@endsection
