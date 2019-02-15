@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('package.index')}}">
                套餐列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('package.create')}}">
                添加套餐
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">
            套餐列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">名称</th>
                    <th scope="col">可用模块</th>
                    <th scope="col">可用模板</th>
                    <th scope="col">默认套餐</th>
                    <th scope="col">系统套餐</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($packages as $package)
                    <tr>
                        <td>{{$package['name']}}</td>
                        <td>
                            <span class="badge badge-info">sdf</span>
                        </td>
                        <td>
                            <span class="badge badge-success">sdf</span>
                        </td>
                        <td>
                            @if ($package['is_default'])
                                <i class="fa fa-check-square-o text-success"></i>
                            @else
                                <i class="fa fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td>
                            @if ($package['system'])
                                <i class="fa fa-check-square-o text-success"></i>
                            @else
                                <i class="fa fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td class=" text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-secondary" href="{{route('package.edit',$package)}}">编辑</a>
                                @can('delete',$package)
                                    <button type="button" class="btn btn-secondary" onclick="destroy(this)">删除</button>
                                    <form action="{{route('package.destroy',$package)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('删除套餐将影响使用套餐的所有用户，确定删除吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush