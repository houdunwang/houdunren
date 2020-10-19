@extends('layouts.module.admin')

@section('content')
<nav class="nav nav-tabs">
  <a class="nav-link active" href="#">
    模块配置
  </a>
</nav>
<form action="{{ route('module.config.store') }}" method="post">
  @csrf
  @include('edu::hdcms.config.edit')

  <div class="mt-3">
    <button class="btn btn-primary mt-3">保存提交</button>
  </div>
</form>
@endsection
