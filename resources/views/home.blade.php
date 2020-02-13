<!DOCTYPE html>
<html id="root" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HDCMS</title>
    {{-- <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/5.12.1/css/all.css"> --}}
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" />
</head>

<body>
    <div id="app">
        <app />
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>


</html>
