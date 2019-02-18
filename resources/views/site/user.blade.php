@extends('layouts.admin')
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
                    <th scope="col">邮箱</th>
                    <th scope="col">手机号</th>
                    <th scope="col">角色</th>
                    <th scope="col">用户组</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($site->user as $user)
                    {{--@unless($user->role['role']=='admin' || isSuperAdmin())--}}
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['real_name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['mobile']}}</td>
                        <td>
                            @if ($user->role['role']=='admin')
                                <span class="badge badge-info">站长</span>
                            @endif
                            @if ($user->role['role']=='operator')
                                <span class="badge badge-info">操作员</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-success">{{$user->group['name']}}</span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                @if ($user->role['role']=='operator')
                                <a class="btn btn-outline-success"
                                   href="{{route('site.permission',[$site,$user])}}">
                                    设置权限
                                </a>
                                @endif
                                @if (isSuperAdmin())
                                    <a class="btn btn-outline-info" href="{{route('user.edit',$user)}}">编辑用户</a>
                                @endif
                                <a class="btn btn-outline-secondary" href="{{route('user.show',$user)}}">
                                    查看操作权限
                                </a>
                                @if ($user->role['role']=='operator')
                                    <a class="btn btn-outline-danger"
                                       href="{{route('site.operator.set',[$site,'id'=>$user])}}">
                                        删除操作员
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    {{--@endunless--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <button class="btn btn-success mt-3" onclick="users()">添加操作员</button>
@endsection
@push('js')
    <script>
        function users() {
            require(['util', 'axios', 'hdjs'], function (util, axios, hdjs) {
                util.user(function (id) {
                    axios.get('{{route('site.operator.set',$site)}}', {params: {id: id}}).then(function (response) {
                        hdjs.message(response.data.message, '', 'success', 2, {
                            events: {
                                'hidden.bs.modal': function () {
                                    location.reload(true);
                                }
                            }
                        });
                    });
                }, "{{ implode(',',$site->user->pluck('id')->toArray()??[]) }}");
            });
        }
    </script>
@endpush