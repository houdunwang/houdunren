<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>系统安装</title>
    @include('install.layouts.hdjs')
</head>
<body class="admin-site">
<div class="container mt-3">
    <form action="" method="post">
        <div class="row">
            <div class="col-sm-10 m-auto font-weight-light">
                <div class="card bg-light shadow-lg rounded">
                    <div class="card-header text-center bg-white">
                        <h3 class="font-weight-lighter p-3">HDCMS</h3>
                    </div>
                    <div class="card-header bg-light p-0 border-info  shadow-lg">
                        <div class="row">
                            <div class="col-3 border-right text-center p-2 bg-info text-light">欢迎使用</div>
                            <div class="col-3 border-right text-center p-2 bg-info text-light"
                                 style="">配置数据库
                            </div>
                            <div class="col-3 border-right text-center p-2 bg-dark text-light">创建数据表</div>
                            <div class="col-3 text-center p-2 bg-info text-light">完成安装</div>
                        </div>
                    </div>

                    <div class="card-body p-0" style="height: 350px;">
                        <h4 class="text-center m-5 pt-5 text-secondary">创建数据表</h4>
                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                         role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 100%"></div>
                                </div>
                                <div class="text-center mt-3">
                                    如果长时间没有响应，请先删除已经安装的数据表后再执行安装
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="card-footer text-muted text-center shadow">--}}
                    {{--<a class="btn btn-outline-primary" href="{{route('install.home')}}">上一步</a>--}}
                    {{--</div>--}}
                    <div class="card-footer text-muted text-center shadow p-3">
                        我们的使命：帮助中小企业快速实现互联网价值,增长企业效益!
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    require(['hdjs', 'axios'], function (hdjs, axios) {
        axios.get('{{route("install.create")}}').then(function (response) {
            location.href="{{route('install.complete')}}"
        }).catch(function (error) {
            hdjs.info(error.response.data.message);
        });
    })
</script>
</body>
</html>