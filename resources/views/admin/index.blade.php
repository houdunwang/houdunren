@extends('layouts.admin')

@section('content')
@include('admin.nav')

<div class="alert alert-info mt-3" role="alert">
    <i class="fa fa-info-circle" aria-hidden="true"></i>
    站长「{{ $site->master->name }}」拥有对<strong>{{ $site->title }}</strong>站点管理的全部权限
</div>
<div class="table table-striped mt-3">
    <table class="table">
        <thead>
            <tr>
                <th width="80">编号</th>
                <th>昵称</th>
                <th>邮箱</th>
                <th>手机号</th>
                <th>角色</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="align-middle">{{$user['id'] }}</td>
                <td class="align-middle">
                    <img src="{{ $user['avatar'] }}" class="rounded mr-3" style="width:30px;" />
                    {{ $user['name'] }}
                </td>
                <td class="align-middle">{{ $user['email'] }}</td>
                <td class="align-middle">{{ $user['mobile'] }}</td>
                <td>
                    @if ($user->id==$site->master->id)
                    <span class="badge badge-danger mr-2">站长</span>
                    @endif

                    @foreach($user->roles as $role)
                    <a href="{{ route('site.role.edit',[$site,$role]) }}"
                        class="badge badge-success mr-2">{{ $role['title'] }}</a>
                    @endforeach
                </td>
                <td class="text-right align-middle">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('site.admin.role',[$site,$user]) }}" class="btn btn-info">设置角色</a>
                        <btn-del action="{{ route('site.admin.destroy',[$site,$user]) }}" class="btn-secondary btn-sm">
                            移除
                        </btn-del>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<user-search action="{{ route('site.admin.search',$site) }}" v-slot="{user}" class="mt-3">
    <div class="btn-group btn-group-sm">
        <a :href="'/site/{{ $site['id'] }}/admin/store/'+user.id" class="btn btn-info btn-sm">设为管理员</a>
    </div>
</user-search>
@endsection
