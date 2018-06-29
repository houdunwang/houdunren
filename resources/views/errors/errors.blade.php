
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>Beagle</title>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('org/beagle/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('org/beagle/css/app.css')}}" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-error be-error-404">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="error-container">
                <div class="error-number">error</div>
                <div class="error-description">{{$message}}</div>
                <div class="error-goback-button"><a href="/" class="btn btn-xl btn-primary">返回首页</a></div>
                <div class="footer">
                    &copy; 2019 <a href="/">后盾人</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('org/beagle/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('org/beagle/js/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        App.init();
    });

</script>
</body>
</html>
