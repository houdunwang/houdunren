<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    @stack('styles')
</head>

<body>

    <div class="container">
        <div class="d-flex align-items-center justify-content-center mt-5">
            <div class="col-12 col-sm-6 mt-5">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <strong>请检查以下问题</strong>
                    </div>
                    <div class="card-body">
                        1. 该域名没有绑定站点 <br>
                        2. 站点没有设置默认模块
                    </div>
                    <div class="card-footer text-muted">
                        访问 <a href="/admin" class="h6 text-primary">后台管理</a> 进行设置
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
