@extends('layouts.module.admin')

@section('content')
@include('article::admin.field._nav')
<table class="table table-bordered">
  <thead>
    <tr>
      <th width="80">编号</th>
      <th width="150">字段名称</th>
      <th width="150">字段标识</th>
      <th>提示信息</th>
      <th>验证规则</th>
      <th width="80" class="text-center">必填项</th>
      <th width="150">更新时间</th>
      <th width="100"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($model->fields as $field)
    <tr>
      <td>{{$field['id']}}</td>
      <td>{{ $field['title'] }}</td>
      <td>{{ $field['name'] }}</td>
      <td>{{ $field['placeholder'] }}</td>
      <td>{{ $field['rules'] }}</td>
      <td class="text-center">
        @if ($field['required'])
        <i class="fas fa-check-circle text-success "></i>
        @else
        <i class="fas fa-times-circle"></i>
        @endif
      </td>
      <td>{{ $field['updated_at']->format('Y-m-d') }}</td>
      <td>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('article.admin.field.edit',$field) }}" class="btn btn-outline-success">编辑</a>
          <btn-del action="{{ route('article.admin.field.destroy',$field) }}" class="btn btn-outline-danger" />
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
