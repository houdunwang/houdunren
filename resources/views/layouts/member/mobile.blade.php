<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>会员中心</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/util.js')}}"></script>
    <script>
        window.hdjs = {
            base: '/org/hdjs',
            uploader: '{{route('common.upload.make')}}?',
            filesLists: '{{route('common.upload.lists')}}?',
        };
        window.system = {
            upload:{!! json_encode(config_get('upload','','system')) !!},
            message_timeout:{!! config_get('notify.message_timeout', 60, 'site') !!}
        }
    </script>
    <script src="{{asset('org/hdjs/require.js')}}"></script>
    <script src="{{asset('org/hdjs/config.js')}}"></script>
    @stack('css')
</head>
<body class="member">
@include('layouts.message')
@if (!if_route('member'))
    <div class="bg-light shadow-sm mb-2 border-top border-info">
        <div class="container px-0 border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-se border-0">
                <a class="text-secondary" href="javascript:;" onclick="window.history.back()">
                    <i class="fa fa-backward"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                    </ul>
                    <div class="my-2 my-lg-0">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown ">
                                <div class="dropdown-divider"></div>
                                <a class="nav-link" href="{{route('member')}}">
                                    会员中心
                                </a>
                                <a class="nav-link" href="{{route('member.info.index')}}">修改资料</a>
                                <div class="dropdown-divider"></div>
                                <a class="nav-link" href="{{route('logout')}}">退出登录</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endif
<div class="col-sm-10 px-0 mx-0 mobile">
    @yield('content')
</div>
<script>
    require(['bootstrap'])
</script>
</body>
</html>