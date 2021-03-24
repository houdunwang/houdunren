<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/tabler/dist/css/tabler.min.css?1611412966" rel="stylesheet" />
    <meta name="keywords" content="{{ site()['setting']['base']['keywords'] }}">
    <meta name="description" content="{{ site()['setting']['base']['description'] }}">
    <link href="/tabler/dist/css/tabler-flags.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-payments.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-vendors.min.css?1611412966" rel="stylesheet" />
    <link href="/tabler/dist/css/demo.min.css?1611412966" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="/modules/Edu/css/app.css?v={{ config('app.version') }}{{ module()['config']['version'] }}" />
    <script src="/modules/Edu/js/app.js?v={{ config('app.version') }}{{ module()['config']['version'] }}" defer></script>
</head>

<body>
    @include('message')
    <div id="app"></div>
    <script src="/tabler/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js?1611412966"></script>
    <script src="/tabler/dist/js/tabler.min.js?1611412966"></script>
    <script>
        window.device=@json(['mobile'=>\Browser::isMobile(),'desktop'=>\Browser::isDesktop(),'wechat'=>\WeChatService::isWechat()]);
        window.uid=@json(Auth::id());window.site = @json(site(),JSON_FORCE_OBJECT);window.module = @json(module(),JSON_FORCE_OBJECT);
    </script>
    <div class="text-center pb-16">
        <div>{!! site()['setting']['base']['copyright'] !!}</div>
        <div>
            <span class="pr-2"> <i class="fas fa-phone-square-alt"></i> {{ site()['setting']['base']['tel'] }} </span>
            <span class="pr-2"><i class="fas fa-envelope"></i> {{ site()['setting']['base']['email'] }}</span>
        </div>
        <a href="https://beian.miit.gov.cn/" target="_blank">
            ICP证: {{ site()['setting']['base']['icp'] }}
        </a>
    </div>
</body>

</html>
