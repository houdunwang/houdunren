@extends('layouts.module.system')

@section('content')
@include('article.model._nav')

<table class="table table-bordered">
  <thead>
    <tr>
      <th width="80">编号</th>
      <th width="150">模型名称</th>
      <th>模型描述</th>
      <th width="150">更新时间</th>
      <th width="180"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($models as $model)
    <tr>
      <td scope="row">{{$model['id']}}</td>
      <td>{{ $model['title'] }}</td>
      <td>{{ $model['description'] }}</td>
      <td>{{ $model['updated_at']->format('Y-m-d') }}</td>
      <td>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('article.model.edit',$model) }}" class="btn btn-outline-success">编辑</a>
          <btn-del action="{{ route('article.model.destroy',$model) }}" class="btn btn-outline-danger">
          </btn-del>
          <a href="{{ route('article.system.field.index',$model) }}" class="btn btn-outline-info">系统字段</a>
          <a href="{{ route('article.model.field.index',$model) }}" class="btn btn-outline-secondary">扩展字段</a>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
