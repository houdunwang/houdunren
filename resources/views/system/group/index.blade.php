@extends('system.layouts.master'))

@section('content')

@include('system.group._nav')

<div class="table-responsive mt-3">
  <table class="table table-bordered shadow-sm">
    <thead>
      <tr>
        <th width="80">编号</th>
        <th width="300">会员组</th>
        <th>可用套餐</th>
        <th>可用模块</th>
        <th>可创建站目点数量</th>
        <th width="120">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($groups as $group)
      <tr>
        <td> {{ $group->id }}</td>
        <td> {{ $group->title }}</td>
        <td>
          @foreach ($group->packages as $package)
          <a href="{{ route('system.package.edit',$package) }}"
             class="badge badge-success mr-2">{{ $package->title }}</a>
          @endforeach
        </td>
        <td>
          @foreach ($group->modules as $module)
          <a href="{{ route('system.module.index') }}" class="badge badge-info mr-2">{{ $module->title }}</a>
          @endforeach
        </td>
        <td> {{ $group->site_num }}</td>
        <td>
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

            <a href="{{ route('system.group.edit',$group['id']) }}" class="btn btn-info">编辑</a>

            @if($group->id>1)
            <btn-del action="{{ route('system.group.destroy',$group['id']) }}" class="btn btn-secondary">
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
