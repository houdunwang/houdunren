@extends('layouts.module.system')

@section('content')
@include('article.systemField._nav')

<form action="{{ route('article.system.field.update',[$model,$field['name']]) }}" method="post">
  @csrf
  @method('PUT')
  <div class="p-3 border">
    <x-form theme="input" title="字段名称" name="title" :value="$field['title']" />
    <x-form theme="radio" title="必须输入" name="required" :value="$field['required']" :options="[0=>'否',1=>'是']" />
    <x-form theme="radio" title="显示字段" name="show" :value="$field['show']" :options="[0=>'否',1=>'是']" />
    <x-form theme="input" title="提示信息" name="placeholder" :value="$field['placeholder']" />
  </div>
  <div class="p-3 border mt-3">
    <div class="alert alert-secondary small" role="alert">
      验证规则兼容Laravel表单验证规则
      <br>
      不设置验证消息时系统将自动生成消息
    </div>
    <x-form theme="textarea" title="验证规则" name="rules" :value="$field['rules']" />
    <x-form theme="textarea" title="错误消息" name="errors" :value="$field['errors']" />
  </div>
  <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
