@extends('layouts.admin')
@section('content')
    <div class="card small">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link active">
                        会员列表
                    </a>
                </li>
            </ul>
            <form action="{{route('admin.user.index')}}">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="w" class="form-control" aria-label="Text input with dropdown button">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" aria-expanded="false">会员搜索</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">昵称</th>
                        <th scope="col">邮箱</th>
                        <th scope="col">手机号</th>
                        <th>注册时间</th>
                        <th scope="col">角色</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['mobile']}}</td>
                            <td>{{$user['created_at']}}</td>
                            <td>
                                @if($user->roles->count())
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-secondary">{{$role['title']}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-secondary">会员</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.user.edit',$user)}}" class="btn btn-secondary">设置会员角色</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$users->appends(['type'=>Request::query('type'),'content'=>Request::query('content')])->links()}}
        </div>
    </div>
@endsection
