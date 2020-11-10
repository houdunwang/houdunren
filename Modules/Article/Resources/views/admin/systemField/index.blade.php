@extends('layouts.module.admin')
@section('content')
@include('article::admin.systemField._nav')
<table class="table table-bordered">
  <thead>
    <tr>
      <th width="150">字段名称</th>
      <th width="150">字段标识</th>
      <th>提示信息</th>
      <th width="80" class="text-center">必填项</th>
      <th width="80" class="text-center">显示字段</th>
      <th width="100"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($model->systemFields as $field)
    <tr>
      <td>{{ $field['title'] }}</td>
      <td>{{ $field['name'] }}</td>
      <td>{{ $field['placeholder'] }}</td>
      <td class="text-center">
        @if ($field['required'])
        <i class="fab fa-check-circle text-success"></i>
        @else
        <i class="fas fa-times-circle"></i>
        @endif
      </td>
      <td class="text-center">
        @if ($field['show'])
        <i class="fas fa-check-circle text-success"></i>
        @else
        <i class="fas fa-times-circle"></i>
        @endif
      </td>
      <td>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('article.admin.system.field.edit',[$model,$field['name']]) }}"
             class="btn btn-info">编辑字段</a>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
