@extends('layouts.auth')
@section('content')

<form method="post" @submit.prevent="submit">
    <div class="card shadow">
        <div class="card-header">
            会员注册
        </div>
        <div class="card-body">
            <send-code name="mobile" title="手机号" :mobile.sync="mobile" :code.sync="code"
                action="{{ route('register.code') }}"></send-code>
            <hr>
            <x-form name="password" title="密码" placeholder="请输入密码" required></x-form>
            <x-form name="password_confirmation" title="确认密码" placeholder="请输入确认密码" required></x-form>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <button class="btn btn-success btn-sm">登录帐号</button>
            <div>
                <a href="{{ route('login') }}">登录</a> | <a href="">找回密码</a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    window.vue={
        data:{
            code:'',
            mobile:'',
            password:"",
            password_confirmation:''
        },
        methods:{
            submit(){
                axios.post("{{ route('register') }}",this.$data).then(function(){
                    window.location.reload(true);
                })
            }
        }
    }
</script>
@endpush
