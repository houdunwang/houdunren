@extends('layouts.admin')

@section('content')

@include('package.nav')

<div class="table-responsive mt-3">
    <table class="table table-bordered shadow-sm">
        <thead>
            <tr>
                <th>编号</th>
                <th>套餐名称</th>
                <th>可用模块</th>
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
                    <span class="badge badge-success mr-2">{{ $module->title }}</span>
                    @endforeach
                </td>
                <td class="" width="120">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.package.edit',$package['id']) }}" class="btn btn-info">编辑</a>
                        @if($package->id>1)
                        <btn-del action="{{ route('admin.package.destroy',$package['id']) }}"></btn-del>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
