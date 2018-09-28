@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">名称</th>
                            <th scope="col">更新时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role['id']}}</td>
                                <td>{{$role['name']}}</td>
                                <td>{{$role['updated_at']}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="{{route('admin.role.edit',$role)}}" class="btn btn-white">编辑</a>
                                        <button type="button" class="btn btn-white">删除</button>
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
