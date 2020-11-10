@extends('layouts.module.admin')
@section('content')
@include('article::admin.content._nav')
<form action="{{ route('article.admin.content.store') }}" method="post">
  @csrf
  @include('article::admin.content._form')
</form>
@endsection
