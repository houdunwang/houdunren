@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('site.site.index')}}"> <i class="fa fa-home"></i> 站点管理</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('site.user.index',$site)}}">操作员管理</a></li>
    </ol>
    <div class="card">
        <div class="card-header">
            站点的应用列表
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm">
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
                                @can('admin',$site)
                                    <a class="btn btn-outline-success"
                                       href="{{route('site.permission.user.edit',[$site,$user])}}">
                                        设置权限
                                    </a>
                                @endcan
                                @if (isSuperAdmin())
                                    <a class="btn btn-outline-info" href="{{route('system.user.edit',[$site,$user])}}">
                                        编辑用户
                                    </a>
                                @endif
                                <a class="btn btn-outline-secondary" href="{{route('system.user.show',[$site,$user])}}">
                                    查看操作权限
                                </a>
                                @if ($user->role['role']=='operator')
                                    <a href="javascript:void(0);"
                                       class="btn btn-outline-danger" onclick="delUser(this)">
                                        删除操作员
                                    </a>
                                    <form action="{{route('site.user.update',[$site,$user])}}" method="post">
                                        @csrf @method('PUT')
                                    </form>
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
        //删除操作员
        function delUser(obj) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除操作员吗？', function () {
                    $(obj).next('form').submit();
                })
            });
        }

        //选择操作员
        function users() {
            require(['util', 'axios', 'hdjs'], function (util, axios, hdjs) {
                util.user(function (id) {
                    axios.put('/site/{{$site["id"]}}/user/' + id, {}).then(function (response) {
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