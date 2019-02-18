<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>HDCMS - 免费开源多站点管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="{{asset('org/hdjs/package/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body>
@include('layouts.message')
<form action="{{route('common.user.search')}}" method="post">
    @csrf
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="请输入用户名或邮箱、手机号、用户编号进行搜索"
                   name="w">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">开始搜索</button>
            </div>
        </div>
    </div>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th>编号</th>
        <th>用户名</th>
        <th>邮箱</th>
        <th>手机号</th>
        <th></th>
    </tr>
    </thead>
    <tbody class="">
    @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['mobile']}}</td>
            <th>
                <button class="btn btn-success btn-sm" onclick="select({{$user['id']}})">选择</button>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
{{$users->links()}}
<script>
    function select(id) {
        parent.selectUser(id);
    }
    require(['bootstrap'])
</script>
</body>
</html>
