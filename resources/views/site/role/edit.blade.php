@extends('system.layouts.master')

@section('content')
@include('site.role._nav')

<form action="{{ route("site.role.update",[$site,$role]) }}" method="post">
  @csrf
  @method('PUT')
  @include('role.form')

  <button class="btn btn-primary mt-3">保存</button>
</form>
@endsection
