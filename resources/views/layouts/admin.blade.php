<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('admin.title') }}</title>
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  @stack('styles')
</head>

<body>
  <div class="system">
    @include('layouts.admin.header')
    @include('layouts.admin.quickmenu')

    <div class="bg-white mt-4 m-3 p-4 shadow-lg rounded {{ route_class() }}" id="app">
      @include('layouts.message')
      @yield('content')
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center text-dark text-center p-5"
         style="text-shadow: 0px 0px 3px #fff;">
      {!! config('admin.copyright') !!}
    </div>
  </div>
  @stack('vue')
  <script src="{{ mix('/js/manifest.js') }}"></script>
  <script src="{{ mix('/js/vendor.js') }}"></script>
  <script src="{{ mix('/js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>
