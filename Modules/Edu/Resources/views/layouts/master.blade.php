<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Edu</title>

    <link rel="stylesheet" href="{{ asset('modules/edu/app.css') }}">

</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('modules/edu/app.js') }}"></script>
</body>

</html>
