@extends('layouts.module.admin')

@section('content')
@include('article::admin.category._nav')

<table class="table table-bordered">
  <thead>
    <tr>
      <th width="80">编号</th>
      <th width="150">栏目名称</th>
      <th width="150">所属模型</th>
      <th>栏目描述</th>
      <th>类型</th>
      <th width="150">更新时间</th>
      <th width="120"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{$category['id']}}</td>
      <td class="article-category-tree">{!! $category['_title'] !!}</td>
      <td>{{ $category->model->title }}</td>
      <td>{{ $category['description'] }}</td>
      <td>{{ $category['typeTitle'] }}</td>
      <td>{{ $category['updated_at']->format('Y-m-d') }}</td>
      <td>

        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('article.admin.category.edit',$category) }}" class="btn btn-outline-success">编辑</a>
          <btn-del action="{{ route('article.admin.category.destroy',$category) }}" class="btn btn-outline-danger" />
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
