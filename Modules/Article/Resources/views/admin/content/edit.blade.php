@extends('layouts.module.master')
@section('content')
@include('article::admin.content._nav')
<form action="{{ route('article.admin.content.update',$content) }}" method="post">
  @csrf
  @method('PUT')
  @include('article::admin.content._form')
</form>
@endsection
