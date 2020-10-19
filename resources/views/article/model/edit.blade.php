@extends('layouts.module.system')

@section('content')
@include('article.model._nav')

<form action="{{ route('article.model.update',$model) }}" method="post">
  @csrf
  @method('PUT')
  @include('article.model._form')

  <button class="btn btn-primary btn-sm mt-3">保存提交</button>
</form>

@endsection