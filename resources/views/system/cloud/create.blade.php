@extends('layouts.system')
@section('content')
    <form action="{{route('system.cloud.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                绑定云帐号
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>云主机</label>
                    <input type="text" name="api_host" value="{{$cloud['api_host']??'http://www.hdcms.com'}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="username" class="form-control" value="{{$cloud['username']??''}}">
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