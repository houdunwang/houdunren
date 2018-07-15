@extends('admin::layouts.master')
@section('content')
    @component('components.tabs' ,['title'=>$role['title'].' 权限设置'])
        @slot('nav')
            <li class="nav-item"><a href="/admin/role" class="nav-link ">角色组</a></li>
            <li class="nav-item"><a href="/admin/user" class="nav-link">管理员管理</a></li>
            <li class="nav-item"><a href="/admin/permission" class="nav-link ">权限列表</a></li>
            <li class="nav-item"><a href="/admin/permission" class="nav-link">角色权限</a></li>
        @endslot
        @slot('body')
            <form action="/admin/role/permission/{{$role->id}}" method="post">
                @csrf
                @foreach(\HDModule::getPermissionByGuard('admin') as $group)
                    <div class="card card-border-color card-border-color-danger">
                        <div class="card-header card-header-divider">
                            {{$group['config']['name']}}
                        </div>
                        <div class="card-body pb-0">
                            @foreach($group['rules'] as $rule)
                                <div class="card-header m-0 pb-sm-3 p-0">
                                    <div class="tools"><span class="icon s7-upload"></span>
                                        <span class="icon s7-edit"></span><span class="icon s7-close"></span>
                                    </div>
                                    <span class="title">{{$rule['group']}}</span>
                                </div>
                                <div class="card-body p-0">
                                    @foreach($rule['permissions'] as $permission)
                                        <label class="custom-control custom-checkbox custom-control-inline  pb-sm-1">
                                            <input type="checkbox" name="name[]" {{$role->hasPermissionTo($permission['name'])?"checked=''":''}} value="{{$permission['name']}}" class="custom-control-input">
                                            <span class="custom-control-label">{{$permission['title']}}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-primary ml-3 mb-3">保存权限</button>
            </form>
        @endslot
    @endcomponent
@endsection
