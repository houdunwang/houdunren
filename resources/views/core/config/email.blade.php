@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('admin.config.update',['name'=>'email'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('core.config.layouts._menu')
                    <div class="form-group">
                        <label>邮箱类型</label>
                        <input type="text" class="form-control" name="driver" value="{{config_get('admin.email.driver','smtp')}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">主机</label>
                        <input type="text" class="form-control" name="host" value="{{config_get('admin.email.host','smtp.qq.com')}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">端口</label>
                        <input type="text" class="form-control" name="port" value="{{config_get('admin.email.port','25')}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">发件人名称</label>
                        <input type="text" class="form-control" name="from[name]" value="{{config_get('admin.email.from.name')}}" placeholder="发件人的中文名称">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">发送邮箱</label>
                        <input type="text" class="form-control" name="from[address]" value="{{config_get('admin.email.from.address')}}" placeholder="收件方回复使用的邮箱">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">邮箱帐号</label>
                        <input type="text" class="form-control" name="username" value="{{config_get('admin.email.username')}}" placeholder="发送邮箱登录帐号">
                        <span class="header small text-secondary">一般情况下设置与发送邮箱一样</span>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">邮箱密码</label>
                        <input type="text" class="form-control" name="password" value="{{config_get('admin.email.password')}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">加密方式</label>
                        <input type="text" class="form-control" name="encryption" value="{{config_get('admin.email.encryption','tls')}}">
                    </div>
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
