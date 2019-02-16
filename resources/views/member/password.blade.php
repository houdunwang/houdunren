@extends('layouts.member')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">修改密码</h3>
        </div>
        <form role="form" method="post" action="{{route('user.update',[$user,'action'=>'password'])}}">
            {{csrf_field()}} @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="original_password">原密码</label>
                    <input type="password" class="form-control" required name="original_password" id="original_passwordoriginal_password" placeholder="请输入原密码">
                </div>
                <div class="form-group">
                    <label for="password">新密码</label>
                    <input type="password" class="form-control" required name="password" id="password" placeholder="请输入新密码">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码</label>
                    <input type="password" class="form-control" required name="password_confirmation" id="password_confirmation" placeholder="请输入新密码">
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">保存提交</button>
            </div>
        </form>
    </div>
@endsection