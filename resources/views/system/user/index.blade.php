@extends('layouts.system')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('system.user.index')}}">
                用户列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('system.user.create')}}">
                添加用户
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">用户列表</div>
        <div class="card-body">
            <table class="table table-hover table-responsive-sm">
                <thead class="">
                <tr>
                    <th scope="col">#编号</th>
                    <th scope="col">昵称</th>
                    <th scope="col">真实姓名</th>
                    <th scope="col">会员组</th>
                    <th scope="col">状态</th>
                    <th scope="col">所在站点</th>
                    <th scope="col">注册时间</th>
                    <th scope="col">结束时间</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['real_name']}}</td>
                        <td>
                            <span class="badge badge-info">{{$user['group']['name']}}</span>
                        </td>
                        <td>
                            @if ($user['lock'])
                                <span class="badge badge-danger" data-container="body" data-toggle="popover"
                                      data-placement="top" data-content="被锁定用户将不能进行后台操作">被锁定</span>
                            @else
                                <span class="badge badge-success" data-container="body" data-toggle="popover"
                                      data-placement="top" data-content="被锁定用户将不能进行后台操作">正常访问</span>
                            @endif
                        </td>
                        <td>
                            @foreach($user->sites as $site)
                                <span class="badge badge-light text-secondary">
                                    {{$site['name']}}
                                </span>
                            @endforeach
                        </td>
                        <td>{{$user['created_at']->format('Y-m-d')}}</td>
                        <td>{{$user['admin_end']?$user['admin_end']->format('Y-m-d'):''}}</td>
                        <td class=" text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{route('system.user.edit',$user)}}">编辑</a>
                                <a class="btn btn-outline-info" href="{{route('system.user.show',$user)}}">
                                    查看操作权限
                                </a>
                                @can('lock',$user)
                                    @if ($user['lock'])
                                        <a class="btn btn-outline-danger"
                                           href="{{route('system.user.lock',[$user,'unlock'])}}">
                                            解锁用户
                                        </a>
                                    @else
                                        <a class="btn btn-outline-secondary"
                                           href="{{route('system.user.lock',[$user,'lock'])}}">
                                            锁定用户
                                        </a>
                                    @endif
                                @endcan
                                @can('delete',$user)
                                    <button type="button" class="btn btn-outline-secondary" onclick="destroy(this)">
                                        删除用户
                                    </button>
                                @endcan
                                <form action="{{route('system.user.destroy',$user)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-2">
        {{$users->links()}}
    </div>
@endsection

@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除用户吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }

        require(['bootstrap'], function () {
            $(function () {
                $('[data-toggle="popover"]').popover({
                    trigger: 'hover'
                })
            });
        })
    </script>
@endpush