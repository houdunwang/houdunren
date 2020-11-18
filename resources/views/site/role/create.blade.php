@extends('layouts.admin.master')

@section('content')
@include('site.role._nav')

<form action="{{ route("site.role.store",$site) }}" method="post">
  @csrf
  <div class="card mt-3 shadow-sm">
    <div class="card-header">
      角色设置
    </div>
    <div class="card-body">
      <x-form title="角色名称" name="title" required class="col-12 col-md-8" placeholder="请输入中文角色名称"></x-form>
      <x-form title="角色标识" name="name" required class="col-12 col-md-8" placeholder="请输入英文字符"></x-form>
    </div>
  </div>

  <button class="btn btn-primary mt-3">保存</button>
</form>
@endsection
