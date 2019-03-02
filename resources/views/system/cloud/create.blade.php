@extends('layouts.system')
@section('content')
    <form action="{{route('system.cloud.store')}}" method="post">
        @csrf
        <div class="alert alert-primary" role="alert">
            请填写 <a href="http://www.hdcms.com">应用商店</a> 的帐号与密码
        </div>
        <div class="card">
            <div class="card-header">
                绑定云帐号
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="username" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="text" name="username" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-2">开始绑定</button>
    </form>
@stop