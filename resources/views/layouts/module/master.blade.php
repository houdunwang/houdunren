@inject('menuService', 'App\Services\MenuService')
@inject('moduleService', 'App\Services\ModuleService')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ module()['title'] }}</title>
  @stack('styles')
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link href="/modules/{{ module()['name'] }}/app.css?v={{ config('app.version') }}" rel="stylesheet">
  <link href="/admin2/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
  <style>
    html {
      font-size: 14px !important;
    }

    .form-control {
      font-size: .9rem;
    }
  </style>
</head>

<body id="page-top" class="module-admin">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/{{ module()['name'] }}/admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="{{ module()['preview'] }}" class="rounded-circle" style="width:30px;">
        </div>
        <div class="sidebar-brand-text mx-3">{{ module()['title'] }}</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="/{{ module()['name'] }}/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>仪表盘</span></a>
      </li>

      @include('layouts.module.menu')

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        系统菜单
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('site.module.index',site()['id']) }}">
          <i class="fas fa-fw fa-archive"></i>
          <span>模块列表</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>站点列表</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/" target="_blank">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>网站首页</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('wechat.wechat.index',site()) }}" target="_blank">
          <i class="fab fa-weixin    "></i>
          <span>公众号配置</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="ml-3">
            @foreach ($moduleService->getSiteModulesByPermission(site()) as $module)
            <a href="{{ route('site.module.admin',[site(),$module['id']]) }}"
               class="mr-4 font-weight-bold {{module()['name'] == $module['name']?'text-primary':'text-secondary' }}">
              <i class="{{ $module['icon']??'fas fa-pen-square' }}"></i> {{ $module['title'] }}
            </a>
            @endforeach
          </div>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ user()->avatar }}">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.my.edit') }}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  修改密码
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('auth.logout')}}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  退出
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="bg-white mt-4 m-3 p-4 shadow-sm rounded {{ route_class() }}" id="app">
          @include('layouts.message')
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  @yield('scripts')
  <script src="/admin2/sb-admin-2.min.js"></script>
</body>

</html>
