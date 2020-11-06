@extends('layouts.module.system')
@section('content')
@include('article.content._nav')
<form action="{{ route('article.content.store') }}" method="post">
  @csrf
  @include('article.content._form')
</form>
@endsection
