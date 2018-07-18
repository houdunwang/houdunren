@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'权限管理'])
        @slot('nav')
            <li class="nav-item"><a href="/admin/role" pjax class="nav-link">角色组</a></li>
            <li class="nav-item"><a href="/admin/user" pjax class="nav-link active">管理员管理</a></li>
        @endslot
        @slot('header')
            <button data-toggle="modal" data-target="#add-role" type="button" class="btn btn-space btn-secondary">添加管理员</button>
        @endslot
        @slot('body')
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
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-admin-{{$admin['id']}}">编辑</button>
                                    <button type="button" class="btn btn-secondary"  onclick="delUser({{$admin['id']}},this)">删除</button>
                                    <form action="/admin/user/{{$admin['id']}}" hidden method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                                @component('components.modal',['title'=>"编辑管理员",'method'=>'PUT','url'=>"/admin/user/{$admin['id']}",'id'=>"edit-admin-{$admin['id']}"])
                                    <div class="form-group row">
                                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">管理员</label>
                                        <div class="col-12 col-sm-12 col-lg-8">
                                            <input id="inputText3" type="text" class="form-control form-control-sm" required name="name" value="{{$admin['name']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">登录密码</label>
                                        <div class="col-12 col-sm-12 col-lg-8">
                                            <input id="inputText3" type="text" class="form-control form-control-sm" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色标识</label>
                                        <div class="col-12 col-sm-12 col-lg-8">
                                            <select name="role[]" class="form-control form-control-sm" multiple size="5" required>
                                                @foreach($roles as $role)
                                                    <option value="{{$role['id']}}" {{$admin->hasRole($role['name'])?'selected':''}}>{{$role['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endslot
    @endcomponent
    @component('components.modal',['title'=>'添加管理员','url'=>'/admin/user','id'=>'add-role'])
        <div class="form-group row">
            <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">管理员</label>
            <div class="col-12 col-sm-12 col-lg-8">
                <input id="inputText3" type="text" class="form-control form-control-sm" required name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">登录密码</label>
            <div class="col-12 col-sm-12 col-lg-8">
                <input id="inputText3" type="text" class="form-control form-control-sm" required name="password">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">角色标识</label>
            <div class="col-12 col-sm-12 col-lg-8">
                <select name="role[]" class="form-control form-control-sm" multiple size="5" required>
                    @foreach($roles as $role)
                        <option value="{{$role['id']}}">{{$role['title']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delUser(id, bt) {
            if (confirm('确定删除管理员吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection

