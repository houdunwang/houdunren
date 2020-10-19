@extends('layouts.module.admin')

@section('content')

@include('edu::system.nav')

<div class="table-responsive">
  <table class="table table-bordered mt-3 ">
    <thead>
      <tr>
        <th width="60">编号</th>
        <th>课程名称</th>
        <th>课程介绍</th>
        <th width="120"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($lessons as $lesson)
      <tr>
        <td>{{ $lesson['id'] }}</td>
        <td>
          <a href="{{ route('Edu.front.system.show',$lesson) }}" target="_blank">{{ $lesson['title'] }}</a>
        </td>
        <td>{{ $lesson['description'] }}</td>
        <td class="text-right">
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <a href="{{ route('Edu.admin.system.edit',$lesson['id']) }}" class="btn btn-info">编辑</a>
            <btn-del action="{{ route('Edu.admin.system.destroy',$lesson['id']) }}" class="btn btn-secondary">删除
            </btn-del>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
