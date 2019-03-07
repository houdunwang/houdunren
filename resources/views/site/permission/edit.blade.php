@extends('layouts.site')
@section('content')
    <ol class="breadcrumb border">
        <li class="breadcrumb-item">
            <a href="{{route('system.site.index')}}"> <i class="fa fa-home"></i> 站点列表</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('site.user.index',['sid'=>$site])}}">操作员管理</a></li>
        <li class="breadcrumb-item active">设置操作员权限</li>
    </ol>
    <div class="card">
        <div class="card-header small text-secondary">
            设置用户 <span class="text-info">{{$user['name']}}</span> 在
            <span class="text-success">{{$site['name']}}</span> 站点上的权限
        </div>
        <div class="card-body">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a class="btn btn-outline-info" href="{{route('site.permission.cache',$site)}}">
                    更新权限缓存
                </a>
            </div>
        </div>
    </div>
    <form action="{{route('site.permission.user.update',[$site,$user])}}" method="post">
        @csrf @method('PUT')
        @foreach ($permissions as $module=>$permission)
            <div class="card mt-3">
                <div class="card-header">
                    {{$module}}
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($permission as $p)
                            <div class="col-sm-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        @if ($user->hasPermissionTo($p['name']))
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                   value="{{$p['id']}}" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                   value="{{$p['id']}}">
                                        @endif

                                        <span data-container="body" data-toggle="popover" data-placement="top"
                                              data-content="{{$p['permission']}}">
                                        {{$p['title']}}
                                    </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach
        <button class="btn btn-success mt-3">保存提交</button>
    </form>
@endsection
@push('js')
    <script>
        require(['bootstrap'], function () {
            $(function () {
                $('[data-toggle="popover"]').popover({
                    trigger: 'hover'
                })
            });
        })
    </script>
@endpush