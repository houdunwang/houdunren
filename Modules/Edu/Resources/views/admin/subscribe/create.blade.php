@extends('layouts.module.master')
@section('content')
@include('edu::admin.subscribe._nav')
<form action="{{ route('Edu.admin.subscribe.store') }}" method="post">
  @csrf
  @include('edu::admin.subscribe._form')
</form>
@endsection
