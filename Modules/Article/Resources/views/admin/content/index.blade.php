@extends('layouts.module.admin')

@section('content')
@include('article::admin.content._nav')

<table class="table table-bordered">
  <thead>
    <tr>
      <th width="80">编号</th>
      <th>文章名称</th>
      <th width="150">所属栏目</th>
      <th width="150">所属模型</th>
      <th width="100">创建时间</th>
      <th width="100">更新时间</th>
      <th width="120"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($contents as $content)
    <tr>
      <td>{{$content['id']}}</td>
      <td>{{ $content['title'] }}</td>
      <td>{{ $content->category->title }}</td>
      <td>{{ $content->category->model->title }}</td>
      <td>{{ $content['created_at']->diffForHumans()}}</td>
      <td>{{ $content['updated_at']->diffForHumans()}}</td>
      <td>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('article.admin.content.edit',$content) }}" class="btn btn-outline-success">编辑</a>
          <hd-btn-del action="{{ route('article.admin.content.destroy',$content) }}" class="btn btn-outline-danger">
            </btn-del>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div>
  {{ $contents->links() }}
</div>
@endsection
