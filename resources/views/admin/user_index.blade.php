@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-overflow mb-4">
                <li class="nav-item">
                    <a href="http://dev.hdcms.com/edu/lesson" class="nav-link active">
                        {{Request::query('admin')?'管理员':'会员'}}列表
                    </a>
                </li>
            </ul>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">邮箱</th>
                        <th scope="col">手机号</th>
                        <th>注册时间</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['mobile']}}</td>
                            <td>{{$user['created_at']}}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    @if($user['admin']==1)
                                        <a class="btn btn-white">设置权限</a>
                                    @endif
                                    <a href="{{route('admin.user.edit',$user)}}" class="btn btn-white">编辑会员</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
