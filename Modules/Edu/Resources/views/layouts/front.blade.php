<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',site()['title'])</title>
    <link href="/modules/edu/app.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    @stack('styles')
    @stack('links')
    <script>
        const user = @json(['id'=>user('id'),'avatar'=>user('avatar'),'name'=>user('name')]);
    </script>
</head>

<body>
    <div class="front">
        @include('edu::layouts.header')
        <div class="content {{ route_class() }}">
            <div class="container">
                @include('layouts.message')
            </div>
            @yield('content')
        </div>
        @include('edu::layouts.footer')
    </div>

    @stack('vue')
    <script src="/modules/Edu/app.js"></script>
    @stack('scripts')
    @stack('comment')
</body>

</html>
