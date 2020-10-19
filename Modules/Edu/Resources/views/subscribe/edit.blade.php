@extends('layouts.module.admin')

@section('content')
@include('edu::subscribe.nav')

<form action="{{ route('Edu.admin.subscribe.update',$subscribe) }}" method="post">
  @csrf
  @method('PUT')
  @include('edu::subscribe.form')
</form>

@endsection
