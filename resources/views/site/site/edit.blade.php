@extends('system.layouts.master')

@section('content')
@include('site.site._nav')
<form action="{{ route('site.site.update',$site) }}" method="post">
  @csrf
  @method('PUT')
  @include('site.site.form')
</form>

@endsection
