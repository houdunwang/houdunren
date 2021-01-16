<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    {{-- admin 2 --}}
    <link href="/admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/admin2/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/admin2/vendor/jquery/jquery.min.js"></script>
    <script src="/admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/admin2/js/sb-admin-2.min.js"></script>
    {{-- admin 2 END --}}
    <!-- Styles -->
    <link rel="stylesheet" href="/modules/{{ module()['name'] }}/css/app.css">
    @routes
    <script src="/modules/{{ module()['name'] }}/js/app.js" defer></script>
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
