@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <form action="{{route('admin.permission.role',$role)}}" method="post">
        @csrf
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link mr-3">角色列表</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link mr-3 active">权限设置</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body small">
                    @foreach($modules as $module)
                        <div class="card">
                            <div class="card-header">{{$module['title']}}</div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($module['permission'] as $permission)
                                        <div class="col-2">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                                           value="{{$module['name']}}-{{$permission['name']}}"
                                                        {{$role->hasPermissionTo($module['name'].'-'.$permission['name'])?'checked':''}}>
                                                    <span data-toggle="tooltip" data-placement="top" title="{{$module['name']}}-{{$permission['name']}}">
                                                    {{$permission['title']}}
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button class="btn-primary btn btn-sm">保存</button>
                </div>
            </div>
        </div>
    </form>
@endsection
