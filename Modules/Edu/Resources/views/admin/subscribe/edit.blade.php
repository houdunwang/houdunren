@extends('layouts.module.master')
@section('content')
@include('edu::admin.subscribe._nav')
<form action="{{ route('Edu.admin.subscribe.update',$subscribe) }}" method="post">
  @csrf
  @method('PUT')
  @include('edu::admin.subscribe._form')
</form>
@endsection
