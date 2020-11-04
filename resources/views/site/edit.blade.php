@extends('layouts.admin')

@section('content')
@include('site.nav')
<form action="{{ route('site.site.update',$site) }}" method="post">
  @csrf
  @method('PUT')
  @include('site.form')
</form>

@endsection
