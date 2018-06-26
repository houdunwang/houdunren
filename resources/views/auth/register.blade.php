<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="向军大叔">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('org/beagle/css/app.css')}}" type="text/css"/>
</head>
<body class="be-splash-screen" id="app">
<div class="be-wrapper be-login be-signup">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container sign-up">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header"><img src="{{asset('org/beagle/img/logo-xx.png')}}" alt="logo" width="120" height="27" class="logo-img">
                        {{--<span class="splash-description">注册帐号体验更多功能</span>--}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            @include('layouts._error')
                            <span class="splash-title pb-4">注册帐号</span>
                            <div class="form-group">
                                <input type="text" name="name" required="" placeholder="帐号" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" required="" placeholder="邮箱" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group row signup-password">
                                <div class="col-6">
                                    <input id="pass1" type="password" name="password" required="" placeholder="登录密码" class="form-control">
                                </div>
                                <div class="col-6">
                                    <input required="" type="password" name="password_confirmation" placeholder="确认密码" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row social-signup pt-0">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-block btn-primary btn-xl">
                                        {{__('Register')}}
                                    </button>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('login')}}" class="btn btn-block btn-secondary btn-xl">登录</a>
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
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('org/beagle/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('org/beagle/js/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>
</body>
</html>