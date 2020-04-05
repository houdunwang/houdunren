@inject('menuService', 'App\Services\MenuService')
<!doctype html>
<html lang="zh">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', '会员中心') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.bootcss.com/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  @stack('css')
</head>

<body class="member">
  @include('layouts.error')

  <div class="member-top shadow-sm">
    <div class="container">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="fa fa-home" aria-hidden="true"></i>
                网站首页
              </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">向军大叔</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId" style="min-width:0px;">
                <a class="dropdown-item mb-2 mt-2" href="/member/info/base">修改资料</a>
                <a class="dropdown-item mb-2" href="/member/info/phone">绑定手机</a>
                <a class="dropdown-item mb-2" href="/member/info/avatar">头像设置</a>
                <a class="dropdown-item mb-2" href="/member/info/base">修改密码</a>
                <a class="dropdown-item mb-2" href="/member/info/email">绑定邮箱</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mb-2" href="{{route('logout')}}">退出登录</a>
              </div>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
  <div class="container d-flex flex-column flex-md-row mt-3 mb-3 justify-content-between">
    <div class="menu">
      <div class="icon bg-white shadow-sm border">
        <a href="/member/info/avatar">
          <img src="{{auth()->user()->avatar}}">
        </a>
        <div class="pt-0 p-3">
          <h6 class="text-muted">{{auth()->user()->nickname}}</h6>
          <hr>
          <div class="d-flex justify-content-between text-muted">
            <i class="fa fa-envelope {{auth()->user()->email?'text-info':''}}" aria-hidden="true"></i>
            <i class="fa fa-phone {{auth()->user()->phone?'text-info':''}}" aria-hidden="true"></i>
            <i class="fa fa-weibo {{auth()->user()->weibo?'text-info':''}}" aria-hidden="true"></i>
            <i class="fa fa-weixin {{auth()->user()->wechat?'text-info':''}}" aria-hidden="true"></i>
            <i class="fa fa-github {{auth()->user()->github?'text-info':''}}" aria-hidden="true"></i>
            <i class="fa fa-qq {{auth()->user()->qq?'text-info':''}}" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="list mt-2 shadow-sm border">
        <div class="list-group list-group-flush menus">
          <a class="list-group-item disabled bg-light">
            资料修改
          </a>
          <a class="list-group-item" href="/member/info/base">
            基本信息
          </a>
          <a class="list-group-item" href="/member/info/password">
            密码修改
          </a>
          <a class="list-group-item" href="/member/info/email">
            邮箱绑定
          </a>
          <a class="list-group-item" href="/member/info/phone">
            手机验证
          </a>
          <a class="list-group-item" href="/member/info/avatar">
            修改头像
          </a>
        </div>
        @foreach ($menuService->member(site()) as $module)
        <div class="list-group list-group-flush menus">
          <a class="list-group-item disabled bg-light">
            {{ $module['config']['title'] }}
          </a>
          @foreach ($module['menu']['member'] as $menu)
          <a class="list-group-item" href="{{$menu['to']}}">
            {{ $menu['title'] }}
          </a>
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
    <div class="flex-fill ml-md-3 mt-2 mt-md-0 " id="app">
      <router-view></router-view>
      @yield('content')
    </div>
  </div>
  @stack('scripts')
</body>

</html>
