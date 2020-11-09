@extends('layouts.module.system')

@section('content')
@include('wechat.text.nav')

<div class="table-responsive">
  <table class="table table-bordered mt-3 ">
    <thead>
      <tr>
        <th width="80">ID</th>
        <th width="80">规则编号</th>
        <th>规则名称</th>
        <th>关键词</th>
        <th width="120"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($texts as $text)
      <tr>
        <td>{{ $text['id'] }}</td>
        <td>{{ $text->rule->id }}</td>
        <td>{{ $text->rule->title }}</td>
        <td>
          @foreach ($text->rule->keywords as $keyword)
          <span class="badge badge-info mr-2">{{ $keyword['word'] }}</span>
          @endforeach
        </td>
        <td class="text-right">
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <a href="{{ route('wechat.text.edit',$text) }}" class="btn btn-success">编辑</a>
            <btn-del action="{{ route('wechat.text.destroy',$text) }}" class="btn btn-secondary">删除
            </btn-del>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
