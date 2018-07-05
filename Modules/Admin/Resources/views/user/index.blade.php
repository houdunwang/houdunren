@extends('admin::layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首页</a></li>
            <li class="breadcrumb-item active" aria-current="page">后台管理员</li>
        </ol>
    </nav>
    <div class="card card-contrast">
        <div class="card-header card-header-contrast">
            <a href="#" class="btn btn-space btn-primary">管理员列表</a>
            <button data-toggle="modal" data-target="#add-role" type="button" class="btn btn-space btn-secondary">添加管理员</button>
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
                    <th>管理员</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th class="actions" style="width:20%;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin['id']}}</td>
                    <td>{{$admin['name']}}</td>
                    <td>{{$admin['created_at']}}</td>
                    <td>{{$admin['updated_at']}}</td>
                    <td class="number">
                        <div class="btn-group btn-space">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-admin-{{$admin['id']}}" >编辑</button>
                            <button type="button" class="btn btn-secondary">删除</button>
                        </div>
                        @component('components.modal',['title'=>"编辑管理员",'method'=>'PUT','url'=>"/admin/user/{$admin['id']}",'id'=>"edit-admin-{$admin['id']}"])
                            <div class="form-group row p-0">
                                <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">管理员</label>
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <input id="inputText3" type="text" class="form-control form-control-sm" required name="title" value="{{$admin['name']}}">
                                    <p class="form-text text-muted">
                                        管理员名称
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row p-0">
                                <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色标识</label>
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <select name="role[]" class="form-control form-control-sm" multiple size="5" required>
                                        @foreach($roles as $role)
                                            <option value="{{$role['id']}}">{{$role['title']}}</option>
                                        @endforeach
                                    </select>
                                    <p class="form-text text-muted">
                                        选择管理员所属角色
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

@endsection
