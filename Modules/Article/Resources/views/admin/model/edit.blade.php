@extends('layouts.module.master')

@section('content')
@include('article::admin.model._nav')

<form action="{{ route('article.admin.model.update',$model) }}" method="post">
  @csrf
  @method('PUT')
  @include('article::admin.model._form')

  <button class="btn btn-primary btn-sm mt-3">保存提交</button>
</form>

@endsection
