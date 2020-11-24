@extends('layouts.module.master')
@section('content')
@include('edu::admin.system._nav')
<form action="{{ route('Edu.admin.system.update',$system) }}" method="post">
  @csrf
  @method('PUT')
  @include('edu::admin.system._form')
</form>
@endsection
