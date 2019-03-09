<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>网站维护通知</title>
    @include('layouts.hdjs')
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header">
            维护说明
        </div>
        <div class="card-body">

            <h5 class="text-secondary">
                <i class="fa fa-info-circle text-success"></i> {{config_get('close.message','网站维护中，请稍后访问','site')}}
            </h5>
        </div>
        <div class="card-footer text-muted">
            <i class="fa fa-xing"></i> 感谢您一如既往的支持
        </div>
    </div>
</div>
</body>
</html>