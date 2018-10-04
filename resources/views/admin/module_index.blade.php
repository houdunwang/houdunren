@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('admin.module.index')}}" class="nav-link mr-3 active">
                            模块列表
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-sm">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">模块名称</th>
                            <th scope="col">模块标识</th>
                            <th scope="col">系统模块</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modules as $module)
                            <tr>
                                <td>{{$module['id']}}</td>
                                <td>{{$module['title']}}</td>
                                <td>{{$module['name']}}</td>
                                <td>{{$module['system']}}</td>
                                <td>{{$module['created_at']->diffForHumans()}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="{{route('admin.role.edit',$module)}}" class="btn btn-white">
                                            设置权限
                                        </a>
                                        @can('delete',$module)
                                            <button type="button" class="btn btn-white" onclick="del(this)">删除</button>
                                        @endcan
                                        <form action="{{route('admin.module.destroy',$module)}}" method="post">
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
