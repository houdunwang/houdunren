@extends('admin::layouts.master')
@section('content')


    <div class="card">
        <div class="card-header">权限管理</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/admin/role" data-toggle="tab" role="tab" class="nav-link active">角色组</a></li>
                <li class="nav-item"><a href="/admin/user" data-toggle="tab" role="tab" class="nav-link">管理员管理</a></li>
                <li class="nav-item"><a href="/admin/permission" class="nav-link">权限列表</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-header card-header-contrast card-header-divider">
                    <button data-toggle="modal" data-target="#add-role" type="button" class="btn btn-space btn-primary">添加角色</button>
                    <div class="tools dropdown dropleft">
                        <a href="javascript:location.reload(true);" class="icon mdi mdi-refresh-sync"></a>
                    </div>
                </div>
                @component('components.modal',['title'=>'添加会员角色','url'=>'/admin/role','id'=>'add-role'])
                    <div class="form-group row p-0">
                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色名称</label>
                        <div class="col-12 col-sm-12 col-lg-8">
                            <input id="inputText3" type="text" class="form-control form-control-sm" required name="title" value="{{old('title')}}">
                            <p class="form-text text-muted">
                                请输入角色中文描述
                            </p>
                        </div>
                    </div>
                    <div class="form-group row p-0">
                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色标识</label>
                        <div class="col-12 col-sm-12 col-lg-8">
                            <input id="inputText3" type="text" class="form-control form-control-sm" name="name" required value="{{old('name')}}">
                            <p class="form-text text-muted">
                                验证时使用的角色英文标识
                            </p>
                        </div>
                    </div>
                @endcomponent
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width:10%;">编号</th>
                            <th>角色名称</th>
                            <th style="width:30%;">角色标识</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th class="actions" style="width:20%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role['id']}}</td>
                                <td>{{$role['title']}}</td>
                                <td>{{$role['name']}}</td>
                                <td>{{$role['created_at']}}</td>
                                <td>{{$role['updated_at']}}</td>
                                <td class="number">
                                    <div class="btn-group btn-space">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-role-{{$role['id']}}">编辑</button>
                                        <a href="javascript:void(0);" class="btn btn-secondary" onclick="delRole({{$role['id']}}">删除</a>
                                        <a href="/admin/role/permission/{{$role['id']}}" class="btn btn-secondary">权限</a>
                                    </div>
                                    @section('script')
                                        <script>

                                        </script>
                                    @endsection
                                    @component('components.modal',['title'=>"编辑 [{$role["title"]}] 角色",'method'=>'PUT','url'=>"/admin/role/{$role['id']}",'id'=>"edit-role-{$role['id']}"])
                                        <div class="form-group row p-0">
                                            <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色名称</label>
                                            <div class="col-12 col-sm-12 col-lg-8">
                                                <input id="inputText3" type="text" class="form-control form-control-sm" required name="title" value="{{$role['title']}}">
                                                <p class="form-text text-muted">
                                                    请输入角色中文描述
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group row p-0">
                                            <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色标识</label>
                                            <div class="col-12 col-sm-12 col-lg-8">
                                                <input id="inputText3" type="text" class="form-control form-control-sm" name="name" required value="{{$role['name']}}">
                                                <p class="form-text text-muted">
                                                    验证时使用的角色英文标识
                                                </p>
                                            </div>
                                        </div>
                                    @endcomponent
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
