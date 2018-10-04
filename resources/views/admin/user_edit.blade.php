@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <form action="{{route('admin.user.update',$user)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                设置会员角色
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>会员组</label>
                    <select class="form-control" name="role[]" multiple>
                        @foreach($roles as $role)
                            <option value="{{$role['name']}}" {{$user->hasRole($role['name'])?'selected':''}}>{{$role['title']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary btn-sm">保存</button>
            </div>
        </div>
    </form>
@endsection
