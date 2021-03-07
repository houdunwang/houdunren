<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- tabler --}}
    <link href="/tabler/dist/css/tabler.css" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="/tabler/dist/css/demo.min.css" rel="stylesheet" />
    <script src="/modules/Article/js/app.js" defer></script>
    {{-- tabler end --}}
    <link rel="stylesheet" href="/modules/Article/css/app.css">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    {{-- swiper --}}
    <link href="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.14/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.14/swiper-bundle.min.js"></script>
</head>

<body>
    <div id="app"></div>
    {{-- tabler --}}
    <script src="/tabler/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/tabler/dist/js/tabler.min.js"></script>
    {{-- tabler end--}}
    <script>
        window.uid = @json(Auth::id(),JSON_FORCE_OBJECT);
        window.site = @json(site(),JSON_FORCE_OBJECT);
        window.module = @json(module(),JSON_FORCE_OBJECT);
    </script>
</body>

</html>
