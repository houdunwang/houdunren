@inject('menuServer', 'App\Services\MenuServer')
@inject('moduleServer', 'App\Services\ModuleServer')
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>{{$moduleServer->getByUrl()['title']}}</title>
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  @stack('css')
</head>

<body class="d-flex flex-column small module bg-light">
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
      aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item pr-2">
          <strong class="nav-link pl-1" href="#">
            <i class="fa fa-diamond" aria-hidden="true"></i>
            {{ module()['title'] }}
          </strong>
        </li>
        <li class="nav-item pr-2">
          <a href="/admin/site/index" class="nav-link" href="#">
            <i class="fa fa-sitemap" aria-hidden="true"></i>
            站点列表
          </a>
        </li>
        <li class="nav-item pr-2">
          <a href="/admin/site/{{site()['id']}}/module" class="nav-link" href="#">
            <i class="fa fa-life-ring" aria-hidden="true"></i>
            所有应用
          </a>
        </li>
        <li class="nav-item pr-2">
          <a href="/admin/site/{{site()['id']}}/module" class="nav-link" href="#" target="_blank">
            <i class="fa fa-user" aria-hidden="true"></i>
            会员中心
          </a>
        </li>
        <li class="nav-item pr-2">
          <a href="/admin/site/{{site()['id']}}/module" class="nav-link" href="#" target="_blank">
            <i class="fa fa-home" aria-hidden="true"></i>
            网站首页
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="" class="text-secondary d-flex align-items-center">
            <img src="{{auth()->user()->avatar}}" class="rounded-circle avatar mr-1">
            {{ auth()->user()->name }}
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="d-flex flex-fill flex-column flex-md-row">
    <div class="menus border-right border-top-0 shadow bg-white">
      @foreach ($menuServer
      ->getByUser(site(),module(),auth()->user())['menu']['admin'] as $menu)
      <ul class="list-group list-group-flush text-left">
        <strong class="list-group-item list-group-item-light d-flex align-items-center text-dark justify-content-start">
          <i class="fa fa-bars {{ $menu['group']['icon']??'fa-bars' }} mr-1" aria-hidden="true"></i>
          {{ $menu['group']['title'] }}
        </strong>
        @foreach ($menu['items'] as $item)
        <a href="{{ $item['to'] }}" class="list-group-item list-group-item-action">
          {{$item['title']}}
        </a>
        @endforeach
      </ul>
      @endforeach
    </div>
    <div class="flex-fill ml-md-3 pb-5 pt-3 shadow bg-light p-3 border-left">
      @yield('content')
    </div>
  </div>
  @stack('scripts')
  <style>

  </style>
</body>

</html>
