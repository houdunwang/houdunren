@extends('admin::layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首页</a></li>
            <li class="breadcrumb-item"><a href="/admin/role">角色管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">权限设置</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header"><strong>{{$role->title}}</strong> 角色权限</div>
        <div class="card-body">
            <form action="/admin/role/permission/{{$role->id}}" method="post">
                @csrf
                @foreach(\HDModule::getPermissionByGuard('admin') as $group)
                    <div class="card card-contrast card-border-color card-border-color-primary mb-1">
                        <div class="card-header card-header-contrast">
                            {{$group['config']['name']}}
                        </div>
                        <div class="card-body">
                            @foreach($group['rules'] as $rule)
                                <div class="card-header p-sm-0 pb-sm-3">
                                    <div class="tools"><span class="icon s7-upload"></span><span class="icon s7-edit"></span><span class="icon s7-close"></span></div>
                                    <span class="title">{{$rule['group']}}</span>
                                </div>
                                <div class="card-body p-0">
                                    @csrf
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
                <button class="btn btn-primary">保存权限</button>
            </form>
        </div>
    </div>
@endsection
