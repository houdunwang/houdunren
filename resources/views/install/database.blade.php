<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>系统安装</title>
    @include('install.layouts.hdjs')
</head>
<body class="admin-site">
@include('layouts.message')
<div class="container mt-3">
    <form action="{{route('install.connect')}}" method="post">
@csrf
        <div class="row">
            <div class="col-sm-10 m-auto font-weight-light">
                <div class="card bg-light shadow-lg rounded">
                    <div class="card-header text-center bg-white">
                        <h3 class="font-weight-lighter p-3">HDCMS</h3>
                    </div>
                    <div class="card-header bg-light p-0 border-info  shadow-lg">
                        <div class="row">
                            <div class="col-3 border-right text-center p-2 bg-info text-light">欢迎使用</div>
                            <div class="col-3 border-right text-center p-2 bg-dark text-light"
                                 style="">配置数据库
                            </div>
                            <div class="col-3 border-right text-center p-2 bg-info text-light">创建数据表</div>
                            <div class="col-3 text-center p-2 bg-info text-light">完成安装</div>
                        </div>
                    </div>

                    <div class="card-body p-0" style="height: 500px;">
                        <h4 class="text-center m-3 pt-2 text-secondary">配置数据库</h4>
                        <div class="row">
                            <div class="col-8 m-auto">
                                <div class="form-group">
                                    <label class="font-weight-bold">主机</label>
                                    <input type="text" name="host" value="localhost" required
                                           class="form-control form-control-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-8 m-auto">
                                <div class="form-group">
                                    <label class="font-weight-bold">数据库</label>
                                    <input type="text" name="database" value="live_hdcms_com" required
                                           class="form-control form-control-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-8 m-auto">
                                <div class="form-group">
                                    <label class="font-weight-bold">帐号</label>
                                    <input type="text" name="username" value="live_hdcms_com" required
                                           class="form-control form-control-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-8 m-auto">
                                <div class="form-group">
                                    <label class="font-weight-bold">密码</label>
                                    <input type="password" name="password" value="admin888"
                                           class="form-control form-control-lg shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center shadow">
                        <a class="btn btn-outline-primary" href="{{route('install.home')}}">上一步</a>
                        <button type="submit" class="btn btn-primary" href="{{route('install.home')}}">保存继续</button>
                    </div>
                    <div class="card-footer text-muted text-center shadow p-3">
                        我们的使命：帮助中小企业快速实现互联网价值,增长企业效益!
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>