@extends('layouts.module.admin')

@section('content')
@include('edu::subscribe.nav')

<form action="{{ route('Edu.admin.subscribe.store') }}" method="post">
  @csrf
  @include('edu::subscribe.form')
</form>

@endsection
