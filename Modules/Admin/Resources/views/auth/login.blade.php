<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="向军大叔">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('theme/beagle/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('theme/beagle/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('theme/beagle/css/app.css')}}" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login" id="app">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header"><img src="{{asset('theme/beagle/img/logo-xx.png')}}" alt="logo" width="120" height="27" class="logo-img">
                        <span class="splash-description">登录系统</span></div>
                    <div class="card-body">
                        <form action="/admin/login" method="post">
                            @csrf
                            @include('layouts._validate')
                            <div class="login-form">
                                <div class="form-group">
                                    <input id="name" type="text" name="name" placeholder="管理员帐号" value="admin" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" value="admin888" placeholder="登录密码" class="form-control">
                                </div>
                                <div class="form-group row login-tools">
                                    <div class="col-6 login-remember">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">
                                                {{__('Remember Me')}}
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-6 login-forgot-password">
                                        <a href="{{route('password.request')}}">
                                            {{__('Forgot Your Password?')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row login-submit">
                                    <div class="col-6">
                                        <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">
                                            {{__('Login')}}
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('register')}}" class="btn btn-secondary btn-xl">
                                            {{__('Register')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="splash-footer">&copy; 2019 {{ config('app.name', 'Laravel') }} <a href="/">返回首页</a></div>
            </div>
        </div>
    </div>
</div>
{{--<script src="{{mix('js/app.js')}}"></script>--}}
<script src="{{asset('theme/beagle/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/beagle/js/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>
</body>
</html>
