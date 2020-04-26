<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/modules/edu/dist/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/highlight.js/10.0.0/styles/atom-one-dark.min.css" rel="stylesheet">
    <title></title>
</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="https://cdn.bootcss.com/highlight.js/10.0.0/highlight.min.js"></script>
    <script src="/modules/edu/dist/js/manifest.js"></script>
    <script src="/modules/edu/dist/js/vendor.js"></script>
    <script src="/modules/edu/dist/js/app.js"></script>
</body>

</html>
