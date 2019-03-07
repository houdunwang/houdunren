<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理员登录</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
</head>
<body>
@include('layouts.message')
<div class="container">
    <div class="d-flex align-items-center justify-content-center w-100  mx-0" style=" height: 70vh">
        <div class="col-md-6 col-12 px-0">
            <form action="{{route('system.login')}}" method="post">
                @csrf
                <div class="mt-5 border-top border-info">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4 class="text-secondary"><i class="fa fa-user"></i> 后台登录</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>帐号</label>
                                <input type="text" name="username" class="form-control" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label>密码</label>
                                <input type="password" name="password" class="form-control" required placeholder="请输入不小于5位的登录密码">
                            </div>
                            <button class="btn btn-success btn-sm">登录帐号</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>