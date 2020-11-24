@extends('system.layouts.master')

@section('content')

@include('system.group._nav')

<div class="table-responsive mt-3">

  <form action="{{ route("system.group.store") }}" method="post">
    @csrf

    @include('system.group._form')
  </form>

</div>

@endsection
