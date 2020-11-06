@extends('layouts.module.admin')
@section('content')
@include('edu::system.nav')
<form action="{{ route('Edu.admin.system.store') }}" method="post">
  @csrf
  @include('edu::system.form')
</form>
@endsection
