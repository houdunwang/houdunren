@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'aliyun'])}}" method="post" class="col-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('admin.config.layouts._menu')
                    <div class="form-group">
                        <label>regionId</label>
                        <input type="text" class="form-control" name="regionId"
                               value="{{config_get('admin.aliyun.regionId','cn-hangzhou')}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">accessId</label>
                        <input type="text" class="form-control" name="accessId"
                               value="{{config_get('admin.aliyun.accessId')}}" placeholder="登录阿里云后台查看">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">accessKey</label>
                        <input type="password" class="form-control" name="accessKey"
                               value="{{config_get('admin.aliyun.accessKey')}}" placeholder="登录阿里云后台查看">
                    </div>
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
