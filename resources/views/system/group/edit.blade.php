@extends('layouts.admin.master')

@section('content')

@include('system.group._nav')

<div class="table-responsive mt-3">

  <form action="{{ route("system.group.update",$group) }}" method="post">
    @csrf
    @method('PUT')
    @include('system.group._form')
  </form>

</div>

@endsection
