@extends('system.layouts.master')
@section('content')
@include('site.site._nav')

<form action="{{ route('site.site.store') }}" method="post">
  @csrf
  @include('site.site.form')
</form>
@endsection
