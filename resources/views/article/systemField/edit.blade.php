@extends('layouts.module.system')

@section('content')
@include('article.systemField._nav')

<form action="{{ route('article.system.field.update',[$model,$field['name']]) }}" method="post">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <x-form theme="input" title="字段名称" name="title" :value="$field['title']" />
      <x-form theme="radio" title="必须输入" name="required" :value="$field['required']" :options="[0=>'否',1=>'是']" />
      <x-form theme="radio" title="显示字段" name="required" :value="$field['show']" :options="[0=>'否',1=>'是']" />
      <x-form theme="input" title="提示信息" name="placeholder" :value="$field['placeholder']" />
    </div>
  </div>

  <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
