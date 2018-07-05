<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="向军大叔">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>重置密码 - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('org/beagle/css/app.css')}}" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container forgot-password">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header"><img src="{{asset('org/beagle/img/logo-xx.png')}}" alt="logo" width="120" height="27" class="logo-img">
                        <span class="splash-description">请设置你的新密码</span>
                    </div>
                    <div class="card-body">
                        @include('layouts._message')
                        @include('layouts._error')
                        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            {{--<p>请设置你的新密码</p>--}}
                            <div class="form-group pt-4">
                                <input id="email" placeholder="登录邮箱" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group pt-4">
                                <input id="password" placeholder="新密码" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                            <div class="form-group pt-4">
                                <input id="password-confirm" placeholder="确认密码" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group pt-1">
                                <button type="submit" class="btn btn-block btn-primary btn-xl">{{ __('Reset Password') }}</button>
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