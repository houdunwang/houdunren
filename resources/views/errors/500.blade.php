<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
{{--<link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/styles/vs2015.min.css">--}}
{{--<link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.core.css">--}}
{{--<link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/css/select2.min.css">--}}
{{--<link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.css">--}}
<!-- Theme CSS -->
    <!-- Values are "toggle", "light", and "dark". See "Getting Started" for more information -->
    <!-- Toggle Mode: For demo only, but allows a user to seamlessly toggle between light/dark modes -->
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme-dark.min.css" rel="" data-toggle="theme" data-theme-mode="dark">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css" rel="" data-toggle="theme" data-theme-mode="light">
    <style>
        body {
            display: none;
        }
    </style>

    <script>
        var themeMode = (localStorage.getItem('dashkitThemeMode')) ? localStorage.getItem('dashkitThemeMode') : 'light';
        var themeFile = document.querySelector('[data-toggle="theme"][data-theme-mode="' + themeMode + '"]');

        // Enable stylesheet
        themeFile.rel = 'stylesheet';

        // Enable body content
        themeFile.addEventListener('load', function () {
            document.body.style.display = 'block';
        });
    </script>

    <title>访问异常</title>
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-xl-9 my-5">

            <div class="text-center">
                <h6 class="text-uppercase text-muted mb-4">
                    500 error
                </h6>
                <h1 class="display-4 mb-5">
                    服务器请求异常
                </h1>
                <a href="/" class="btn btn-lg btn-primary">
                    返回首页
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
