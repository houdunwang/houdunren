@extends('user.layouts.master')
@section('content')
    <div class="row justify-content-center mt-4 __web-inspector-hide-shortcut__">
        <form action="{{route('member.user.update',auth()->user())}}" method="post" class="col-sm-8">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>修改密码</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>新密码</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>确认密码</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-block btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
