@extends('layouts.account')
@section('content')

<form method="post" action="{{ route('password.code.store') }}">
    @csrf
    <div class="card shadow">
        <div class="card-header">
            找回密码
        </div>
        <div class="card-body">
            <x-input name="account" title="帐号" placeholder="请输入邮箱或手机号码"></x-input>
            <x-input-captcha></x-input-captcha>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <button type="submit" class="btn btn-success btn-sm">修改密码</button>
            <div>
                <a href="{{ route('login.index') }}">登录</a> | <a href="{{ route('register.index') }}">注册</a>
            </div>
        </div>
    </div>
</form>

@endsection
