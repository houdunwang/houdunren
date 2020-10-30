@extends('layouts.module.system')

@section('content')
@include('article.content._nav')

<form action="{{ route('article.content.update',$content) }}" method="post">
  @csrf
  @method('PUT')
  @include('article.content._form')
</form>

@endsection
