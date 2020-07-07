@extends('layouts.admin')

@section('content')
@include('admin.nav')


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
                    @foreach($user->roles as $role)
                    <span class="badge badge-success mr-2">{{ $role['title'] }}</span>
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

<button class="btn btn-info" @click.prevent="dialogVisible = true">添加管理员</button>
<el-dialog title="提示" :visible.sync="dialogVisible" width="50%" :before-close="handleClose">
    <user-search action="{{ route('site.admin.search',$site) }}" v-slot="{user}" class="mt-3">
        <user-search-btn>
            <div class="btn-group btn-group-sm">
                <a :href="'/site/{{ $site['id'] }}/admin/store/'+user.id" class="btn btn-info btn-sm">设为管理员</a>
            </div>
        </user-search-btn>
    </user-search>
</el-dialog>

@endsection

@push("vue")
<script>
    window.vue={
        data:{
            dialogVisible: false
        },
        methods: {
            handleClose(done) {
                done();
            }
        }
    }
</script>
@endpush
