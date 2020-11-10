@extends('layouts.module.admin')

@section('content')
@include('article::admin.category._nav')

<form action="{{ route('article.admin.category.store') }}" method="post">
  @csrf
  @include('article::admin.category._form')
  <button class="btn btn-primary btn-sm mt-3">保存提交</button>
</form>

@endsection
