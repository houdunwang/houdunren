@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a href="{{route('admin.role.index')}}" class="nav-link mr-3 active">
                            角色列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.role.create')}}" class="nav-link mr-3">
                            添加角色
                        </a>
                    </li>
                </ul>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">名称</th>
                            <th scope="col">标识</th>
                            <th scope="col">系统角色</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role['id']}}</td>
                                <td>{{$role['title']}}</td>
                                <td>{{$role['name']}}</td>
                                <td>
                                    @if($role['system'])
                                        <i class="fa fa-check-circle text-info" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="{{route('admin.permission.role',$role)}}" class="btn btn-secondary">
                                            设置权限
                                        </a>
                                        <a href="{{route('admin.role.edit',$role)}}" class="btn btn-secondary">编辑</a>
                                        @can('delete',$role)
                                            <button type="button" class="btn secondary" onclick="del(this)">删除</button>
                                        @endcan
                                        <form action="{{route('admin.role.destroy',$role)}}" method="post">
                                            @method('DELETE') @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(elem) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(elem).next('form').submit();
                })
            })
        }
    </script>
@endpush
