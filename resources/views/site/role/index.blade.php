@extends('layouts.admin.master')
@section('content')
@include('site.role._nav')

@if($roles->count())
<div class="table-responsive mt-3">
  <table class="table table-bordered shadow-sm">
    <thead>
      <tr>
        <th width="80">编号</th>
        <th width="260">角色名称</th>
        <th>标识</th>
        <th width="180">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)

      <tr>
        <td>{{ $role['id'] }}</td>
        <td>{{ $role['title'] }}</td>
        <td>{{ $role['name'] }}</td>
        <td>
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <a href="{{ route('site.role.edit',[$site->id,$role['id']]) }}"
               class="btn btn-outline-success">编辑</a>
            <hd-btn-del action="{{ route('site.role.destroy',[$site->id,$role['id']]) }}"
                        class="btn btn-outline-danger">删除</btn-del>
              <a href="{{ route('site.permission.edit',[$site->id,$role['id']]) }}"
                 class="btn btn-outline-primary">权限设置</a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@else
<div class="p-3 border text-center mt-3 text-secondary">
  <i class="fa fa-info-circle" aria-hidden="true"></i> 暂无角色
</div>
@endif

@endsection
