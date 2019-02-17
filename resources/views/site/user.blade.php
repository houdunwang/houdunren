@extends('layouts.admin')
@inject('SiteRepository','App\Repositories\SiteRepository')
@section('content')
    <div class="card">
        <div class="card-header">
            站点的应用列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light small">
                <tr>
                    <th scope="col">用户编号</th>
                    <th scope="col">用户名</th>
                    <th scope="col">真实姓名</th>
                    <th scope="col">角色</th>
                    <th scope="col">模板</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($site->user as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['real_name']}}</td>
                        <td>
                            @if ($user->role['role']=='admin')
                                <span class="badge badge-info">站长</span>
                            @endif
                            @if ($user->role['role']=='operator')
                                <span class="badge badge-info">站长</span>
                            @endif
                        </td>
                        <td></td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{route('site.permission',[$site,$user])}}">
                                    设置权限
                                </a>
                                @if (isSuperAdmin())
                                    <a class="btn btn-outline-info" href="{{route('user.edit',$user)}}">编辑用户</a>
                                @endif
                                <a class="btn btn-outline-secondary" href="">
                                    查看操作权限
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop