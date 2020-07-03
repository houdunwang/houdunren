@extends('layouts.admin')

@section('content')

@include('group.nav')

<div class="table-responsive mt-3">
    <table class="table table-bordered shadow-sm">
        <thead>
            <tr>
                <th width="80">编号</th>
                <th width="300">会员组</th>
                <th>可用套餐</th>
                <th>可创建站目点数量</th>
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
                    <span class="badge badge-success mr-2">{{ $package->title }}</span>
                    @endforeach
                </td>
                <td> {{ $group->site_num }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                        <a href="{{ route('admin.group.edit',$group['id']) }}" class="btn btn-info">编辑</a>

                        @if($group->id>1)
                        <btn-del action="{{ route('admin.group.destroy',$group['id']) }}"></btn-del>
                        @endif

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
