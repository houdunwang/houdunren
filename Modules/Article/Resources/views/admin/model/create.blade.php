@extends('layouts.module.admin')
@section('content')
@include('article::admin.model._nav')
<form action="{{ route('article.admin.model.store') }}" method="post">
  @csrf
  @include('article::admin.model._form')
  <button class="btn btn-primary btn-sm mt-3">保存提交</button>
</form>
@endsection
