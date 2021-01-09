<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/modules/{{ module()['name'] }}/css/app.css">
    @routes
    <script src="/modules/{{ module()['name'] }}/js/app.js" defer></script>
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
