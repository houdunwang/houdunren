@extends('layouts.member')
@section('content')
    <form action="{{route('member.change-password.store')}}" method="post">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header">修改密码</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>原密码</label>
                            <input type="password" name="original_password" class="form-control" required
                                   placeholder="请输入原密码">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input type="password" name="password" class="form-control" required
                                   placeholder="请输入不小于五位的新密码">
                        </div>
                        <div class="form-group">
                            <label>确认密码</label>
                            <input type="password" name="password_confirmation" class="form-control" required
                                   placeholder="请输入确认密码">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3 rounded-0 m-2 m-sm-0 mt-sm-2">保存提交</button>
    </form>
@stop