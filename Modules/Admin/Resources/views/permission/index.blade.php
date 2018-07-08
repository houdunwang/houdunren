@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'权限管理'])
        @slot('nav')
            <li class="nav-item"><a href="/admin/role" class="nav-link">角色组</a></li>
            <li class="nav-item"><a href="/admin/user" class="nav-link">管理员管理</a></li>
            <li class="nav-item"><a href="/admin/permission" class="nav-link active">权限列表</a></li>
        @endslot
        @slot('header')
            <button data-toggle="modal" data-target="#add-role" type="button" class="btn btn-space btn-primary">添加权限</button>
            <div class="tools dropdown dropleft">
                <a href="javascript:location.reload(true);" class="icon mdi mdi-refresh-sync"></a>
            </div>
        @endslot
        @slot('body')
            @foreach(\HDModule::getPermissionByGuard('admin') as $group)
                <div class="card card-border-color card-border-color-danger mb-0">
                    <div class="card-header card-header-divider">
                        {{$group['config']['name']}}
                    </div>
                    <div class="card-body card-body-contrast">
                        @foreach($group['rules'] as $rule)
                            <div class="card-header p-sm-0 pb-sm-3">
                                <div class="tools"><span class="icon s7-upload"></span><span class="icon s7-edit"></span><span class="icon s7-close"></span></div>
                                <span class="title">{{$rule['group']}}</span>
                            </div>
                            <div class="card-body p-0">
                                @csrf
                                @foreach($rule['permissions'] as $permission)
                                    <label class="custom-control custom-checkbox custom-control-inline  pb-sm-1">
                                        <input type="checkbox" name="name[]" value="{{$permission['name']}}" class="custom-control-input">
                                        <span class="custom-control-label">{{$permission['title']}}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endslot
    @endcomponent
@endsection
