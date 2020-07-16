@extends('layouts.member')

@section('content')
<form action="{{ route('member.password.store') }}" method="post">
    @csrf
    <div class="card">
        <div class="card-header bg-white">
            修改密码
        </div>
        <div class="card-body">
            <div class="col-12 col-sm-6 p-0">
                <x-form type="password" name="old_password" title="原密码" required></x-form>
                <x-form type="password" name="password" title="新密码" required></x-form>
                <x-form type="password" name="password_confirmation" title="确认密码" required></x-form>
            </div>
        </div>

        <div class="card-footer bg-white">
            <button class="btn btn-primary">保存</button>
        </div>
    </div>
</form>

@endsection
