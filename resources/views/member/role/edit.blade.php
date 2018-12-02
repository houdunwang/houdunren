@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.user.update',$user)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a href="{{route('member.user.index')}}" class="nav-link">
                            会员列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            设置角色
                        </a>
                    </li>
                </ul>
                <div class="form-group">
                    <label>会员组</label>
                    <select class="form-control" name="role[]" multiple>
                        @foreach($roles as $role)
                            <option value="{{$role['name']}}" {{$user->hasRole($role['name'])?'selected':''}}>
                                {{$role['title']}} ({{$role['admin']?"后台":"前台"}})
                            </option>
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
