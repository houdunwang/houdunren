<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>选择站点操作员</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script>
        window.hdjs = {
            base: '/js/hdjs',
            uploader: '{{route('system.upload.make')}}?',
            filesLists: '{{route('system.upload.lists')}}?',
        };
    </script>
    <script src="{{asset('js/hdjs/require.js')}}"></script>
    <script src="{{asset('js/hdjs/config.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script>
        window.sid = {{\site()['id']}}
    </script>
</head>
<body>
@include('layouts.message')
<form action="{{route('site.user.search',\site()['id'])}}" method="post">
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
