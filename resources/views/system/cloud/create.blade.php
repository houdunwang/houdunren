@extends('layouts.system')
@section('content')
    {{--@if ($status)--}}
        {{--<div class="alert alert-success" role="alert">--}}
            {{--<strong> <i class="fa fa-info-circle"></i> 当前状态：绑定成功</strong>--}}
        {{--</div>--}}
    {{--@endif--}}
    <form action="{{route('system.cloud.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                绑定云帐号
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>服务器</label>
                    <select class="form-control" name="api_host" required>
                        <option>http://test.hdcms.com</option>
                    </select>
                    <small class="text-secondary">
                        请填写 <a href="http://www.hdcms.com" class="text-primary" target="_blank">应用商店</a> 的帐号与密码
                    </small>
                </div>
                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-2">重新绑定</button>
    </form>
@stop