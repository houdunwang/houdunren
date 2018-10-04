@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <div class="card small">
        <div class="card-body">
            <ul class="nav nav-tabs nav-overflow mb-4">
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link active">
                        会员列表
                    </a>
                </li>
            </ul>
            <div class="card" id="search">
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" v-model="content" class="form-control" aria-label="Text input with dropdown button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">会员搜索</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" @click.prevent="submit('email')">搜索邮箱</a>
                                    <a class="dropdown-item" href="#" @click.prevent="submit('mobile')">搜索手机号</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">邮箱</th>
                        <th scope="col">昵称</th>
                        <th scope="col">手机号</th>
                        <th>注册时间</th>
                        <th scope="col">角色</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['mobile']}}</td>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['created_at']}}</td>
                            <td>
                                @if($user->roles->count())
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-secondary">{{$role['title']}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-secondary">会员</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.user.edit',$user)}}" class="btn btn-white">设置会员角色</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$users->appends(['type'=>Request::query('type'),'content'=>Request::query('content')])->links()}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['vue', 'jquery', 'hdjs'], function (Vue, $, hdjs) {
            new Vue({
                el: "#search",
                data: {
                    content: ''
                },
                methods: {
                    submit: function (type) {
                        if (this.content == '') {
                            hdjs.message('搜索内容不能为空');
                            return;
                        }
                        let msg = '';
                        switch (type) {
                            case 'email':
                                if (!/@/.test(this.content)) {
                                    msg = '邮箱格式错误';
                                    hdjs.info(msg);
                                    return;
                                }
                                location.href = "{{route('admin.user.index')}}?email=" + this.content;
                                break;
                            case 'mobile':
                                if (!/^\d+$/.test(this.content)) {
                                    msg = '手机号错误';
                                    hdjs.info(msg);
                                    return;
                                }
                                location.href = "{{route('admin.user.index')}}?mobile=" + this.content;
                                break;
                        }
                    }
                }
            })
        })
    </script>
@endpush
