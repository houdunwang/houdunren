<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/tabler/dist/css/tabler.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-flags.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-payments.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-vendors.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/demo.min.css?1611412966" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="/modules/Edu/css/app.css?v={{ module()['config']['version'] }}" />
    <script src="/modules/Edu/js/app.js?v={{ module()['config']['version'] }}" defer></script>
</head>

<body>
    <div id="app"></div>
    <script src="/tabler/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js?1611412966"></script>
    <script src="/tabler/dist/js/tabler.min.js?1611412966"></script>
    <script>
        window.site = @json(site(),JSON_FORCE_OBJECT);
        window.module = @json(module(),JSON_FORCE_OBJECT);
        window.user = @json(Auth::user()??[],JSON_FORCE_OBJECT);
    </script>
</body>

</html>
