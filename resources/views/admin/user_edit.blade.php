@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <form action="{{route('member.user.update',$user)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                编辑会员资料
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>会员组</label>
                    <select class="form-control" name="role[]" multiple>
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" placeholder="{{$user['name']}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>邮箱</label>
                    <input type="text" placeholder="{{$user['email']}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>手机号</label>
                    <input type="text" placeholder="{{$user['mobile']}}" class="form-control" disabled>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary btn-sm">保存</button>
            </div>
        </div>
    </form>
@endsection
