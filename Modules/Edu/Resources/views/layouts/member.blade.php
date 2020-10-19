<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ module()['title'] }}</title>
  <link href="/modules/Edu/app.css" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
  @stack('styles')
  @stack('links')
</head>

<body>
  <div class="front">
    @include('edu::layouts.header')

    <div class="container mt-3 mb-5 p-0 p-sm-1">
      <div class="row">
        <div class="col-12 col-sm-10">
          @include('layouts.message')
          @yield('content')
        </div>

        <div class="col-sm-2 col-12 p-0 pt-2 p-sm-0">
          <div class="icon bg-white shadow-sm border">
            <a href="{{ route('member.avatar.index') }}">
              <img src="{{ user('icon') }}" style="width: 100%">
            </a>
            <div class="pt-0 p-3">
              <h6 class="text-muted">{{ user('name') }}</h6>
              <hr>
              <div class="d-flex justify-content-between text-muted">
                <i aria-hidden="true" class="fa fa-envelope {{ user('email')?'text-info':'' }}"></i>
                <i aria-hidden="true" class="fas fa-phone-square {{ user('mobile')?'text-info':'' }}"></i>
                <i aria-hidden="true" class="fab fa-weibo {{ user('weibo')?'text-info':'' }}"></i>
                <i aria-hidden="true" class="fab fa-weixin {{ user('wechat')?'text-info':'' }}"></i>
                <i aria-hidden="true" class="fab fa-github {{ user('github')?'text-info':'' }}"></i>
                <i aria-hidden="true" class="fab fa-qq {{ user('qq')?'text-info':'' }}"></i>
              </div>
            </div>
          </div>
          <div class="card rounded shadow-sm bg-white mt-2">
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <a href="{{ route('Edu.member.duration') }}"
                  class="list-group-item list-group-item-action text-secondary ">
                  会员周期
                </a>
                <a href="{{ route('Edu.member.order') }}" class="list-group-item list-group-item-action text-secondary">
                  我的订单
                </a>
                <a href="{{ route('Edu.member.topic') }}" class="list-group-item list-group-item-action text-secondary">
                  我的贴子
                </a>
                <a href="{{ route('Edu.member.message') }}"
                  class="list-group-item list-group-item-action text-secondary">
                  站内消息
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('edu::layouts.footer')
  </div>

  @stack('scripts')
  {{-- <script src="{{ mix('/modules/Edu/manifest.js') }}"></script> --}}
  {{-- <script src="{{ mix('/modules/Edu/vendor.js') }}"></script> --}}
  <script src="/modules/Edu/app.js"></script>

</body>

</html>
