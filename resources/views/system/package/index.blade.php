@extends('system.layouts.master')
@section('content')
@include('system.package._nav')

<div class="table-responsive mt-3">
  <table class="table table-bordered shadow-sm">
    <thead>
      <tr>
        <th>编号</th>
        <th>套餐名称</th>
        <th>可用模块</th>
        <th>可用模板风格</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($packages as $package)
      <tr>
        <td width="80"> {{ $package->id }}</td>
        <td width="300"> {{ $package->title }}</td>
        <td>
          @foreach ($package->modules as $module)
          <a href="{{ route("system.module.index") }}" class="badge badge-success mr-2">{{ $module->title }}</a>
          @endforeach
        </td>
        <td>
          @foreach ($package->templates as $template)
          <a href="{{ route("system.template.index") }}" class="badge badge-info mr-2">{{ $template->title }}</a>
          @endforeach
        </td>
        <td width="100">
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <a href="{{ route('system.package.edit',$package['id']) }}" class="btn btn-outline-info">编辑</a>
            @if($package->id>1)
            <btn-del action="{{ route('system.package.destroy',$package['id']) }}" class="btn btn-outline-secondary">
              删除
            </btn-del>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

