@extends('layouts.auth')
@section('content')

<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="card shadow">
        <div class="card-header">
            会员登录
        </div>
        <div class="card-body">
            <x-form name="mobile" title="手机号" placeholder="请输入手机号码" required></x-form>
            <x-form type="password" name="password" title="密码" placeholder="登录密码"></x-form>
            <x-form theme="captcha"></x-form>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember">
                    记住我
                </label>
            </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <button type="submit" class="btn btn-success btn-sm">登录帐号</button>
            <div>
                <a href="{{ route('register') }}">注册</a> | <a href="">找回密码</a>
            </div>
        </div>
    </div>
</form>

@endsection
