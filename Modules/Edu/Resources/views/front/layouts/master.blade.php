<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title',site()['title'])</title>
  <link href="/modules/Edu/app.css?v={{config('app.version') }}" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/styles/zenburn.min.css" rel="stylesheet">
  <livewire:styles />
  @stack('styles')

  <script>
    window.user = @json(['id'=>user('id'),'avatar'=>user('avatar'),'name'=>user('name')]);
  </script>
</head>

<body class="front">
  <div>
    @include('edu::front.layouts._header')
    <div class="content {{ route_class() }}">
      <div class="container">
        @include('layouts._message')
      </div>
      @yield('content')
    </div>
    @include('edu::front.layouts._footer')
  </div>

  @stack('vue')
  <script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
  <script src="/modules/Edu/app.js?v={{config('app.version') }}"></script>
  @stack('scripts')
  <livewire:scripts />
</body>

</html>
