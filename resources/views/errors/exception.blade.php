<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>系统错误</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="card">
        <div class="card-header">
            温馨提示
        </div>
        <div class="card-body text-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            {{ $message }}
        </div>
        <div class="card-footer text-muted">
            <a href="/" class="btn btn-info">返回首页</a>
        </div>
    </div>
</body>

</html>
