@extends('layouts.module.system')

@section('content')
@include('article.content._nav')

<form action="{{ route('article.content.store') }}" method="post">
  @csrf
  @include('article.content._form')

  <button class="btn btn-primary btn-sm mt-3">保存提交</button>
</form>

@endsection
