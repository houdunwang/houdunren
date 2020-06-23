@extends('layouts.account')
@section('content')
<form method="post" action="{{ route('login.store') }}">
    @csrf
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header">
                        会员登录
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="account">帐号</label>
                            <input type="text" class="form-control" name="account" id="name" placeholder="请输入邮箱或手机号"
                                value="{{ old('account') }}">
                            @error('account')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control" name="name" id="password" placeholder="请输入登录密码"
                                value="{{ old('name') }}">
                            @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">验证码</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="请输入验证码" name="code" id="code">
                                <div class="input-group-append">
                                    <span class="input-group-text">发送验证码</span>
                                </div>
                            </div>
                            @error('code')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="captcha">图形验证码</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="请输入验证码" id="captcha"
                                    name="captcha">
                                <div class="input-group-append">
                                    <img src="/captcha" class="border" style="cursor: pointer;"
                                        onclick="this.src='/captcha?_'+Math.random()" />
                                </div>
                            </div>
                            @error('captcha')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success btn-sm">登录帐号</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
